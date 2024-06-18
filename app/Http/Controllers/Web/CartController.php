<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\LogTransaction;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function index() {
        $carts['carts'] = Cart::content();
        $carts['total'] = Cart::subtotal();
//        dd($carts);
        return view('web.cart.index')->with(compact('carts'));
    }

    public function update(Request $request) {
//        dd($request->cart);
        foreach ($request->cart as $key=>$cart) {
            Cart::update($key, $cart);
        }
        session()->flash('success','Cập nhật thành công!');
        return redirect()->route('w.cart.index');
    }

    public function destroy($rowId) {
        Cart::remove($rowId);
        session()->flash('success','Xóa thành công!');
        return redirect()->route('w.cart.index');
    }

    public function add_cart_single(Request $request) {
        $product = Product::find($request->pro_id);
        if($product) {
            $price = $product->price;
            if(users()->user() && users()->user()->type == 2) {
                $price = $product->price_sale;
            }
            Cart::add($product->id, $product->name, 1, $price,0, ['image' => $product->image]);

            $json['carts'] = Cart::content();
            $json['total'] = Cart::subtotal();
//            $json['carts_qty'] = Cart::content()->count();
            return response($json, 200)
                ->header('Content-Type', 'text/plain');
        }
    }

    public function add_to_cart(Request $request) {
        $product = Product::find($request->pro_id);
        if($product) {
            $price = $product->price;
            if(users()->user() && users()->user()->type == 2) {
                $price = $product->price_sale;
            }
            Cart::add($product->id, $product->name, $request->quantity, $price,0, ['image' => $product->image]);
            session()->flash('success', 'Thêm sản phẩm thành công');
            return redirect()->back();
        } else {
            session()->flash('error', 'Không tìm thấy sản phẩm');
            return redirect()->back();
        }
    }

    public function payment() {
        $carts['carts'] = Cart::content();
        $carts['total'] = (float)str_replace(',', '', Cart::subtotal());
//        dd($carts);
        return view('web.cart.payment')->with(compact('carts'));
    }

    public function store(Request $request) {
//        dd($request->all());
        $total = (float)str_replace(',', '', Cart::subtotal());
        $user = users()->user();

        $order['name'] = $request->name;
        $order['address'] = $request->billing_address_1.' '.$request->billing_city;
        $order['phone'] = $request->billing_phone;
        if(!users()->user() || users()->user()->type < 2) {
            $order['payment_method'] = 0;
        }
        if(users()->user() && users()->user()->type == 2) {
            $order['payment_method'] = $request->payment_method;
            if($request->payment_method == 1) {
                $order['voucher'] =  $request->voucher;
                if($total >= 1000000) {
                    $total_pay = $total - ($total*5)/100;
                } else {
                    $total_pay = $total;
                }

                $order['total_money'] = $total_pay;
                if($order['voucher'] == 1) {
                    $point_to_money = $user->point_buy*1000;
                    if($point_to_money < $total_pay) {
                        session()->flash('error', 'Điểm Voucher Mua của bạn không đủ!');
                        return redirect()->back();
                    }
                    $order['status'] = 1;
                    // Trừ điểm Voucher Mua
                    $user->point_buy = $user->point_buy - $total_pay/1000;
                    $user->save();
                    // Lưu log
                    $log['user_id'] = $user->id;
                    $log['before'] = $user->point_buy + $total_pay/1000;
                    $log['money'] = $total_pay/1000;
                    $log['after'] = $user->point_buy;
                    $log['status'] = 1;
                    $log['type'] = 4;
                    $log['add'] = 1;
                    $log['wallet'] = 1;
                    $log['reason'] = 'Mua sản phẩm';
                    LogTransaction::create($log);
                } elseif ($order['voucher'] == 2) {
                    $point_to_money = $user->point*1000;
                    if($point_to_money < $total_pay) {
                        session()->flash('error', 'Điểm Voucher Tặng của bạn không đủ!');
                        return redirect()->back();
                    }
                    $order['status'] = 1;
                    // Trừ điểm Voucher Tặng
                    $user->point = $user->point - $total_pay/1000;
                    $user->save();
                    // Lưu log
                    $log['user_id'] = $user->id;
                    $log['before'] = $user->point + $total_pay/1000;
                    $log['money'] = $total_pay/1000;
                    $log['after'] = $user->point;
                    $log['status'] = 1;
                    $log['type'] = 4;
                    $log['add'] = 1;
                    $log['wallet'] = 2;
                    $log['reason'] = 'Mua sản phẩm';
                    LogTransaction::create($log);
                }
            } else {
                $order['total_money'] = $total;
            }
        }

        if(users()->user()) {
            $order['user_id'] = users()->user()->id;
        }

        $status = Order::create($order);
        if($status) {
            $carts = Cart::content();
//            dd($carts);
            $gift_money = 0;
            foreach ($carts as $cart) {
                $order_detail['order_id'] = $status->id;
                $order_detail['product_id'] = $cart->id;
                $order_detail['qty'] = $cart->qty;
                $order_detail['money'] = $cart->price;
                OrderDetail::create($order_detail);
                $product = Product::find($cart->id);
                if($product->type == 0) {
                    $gift_money += $cart->price * $cart->qty;
                }
            }
            $status->gift_money = $gift_money;
            $status->save();

            Cart::destroy();
            if($status->payment_method == 0) {
                session()->put('order_done',$status);
                return redirect()->route('w.cart.payment_success');
            } else {
                session()->put('success','Đặt hành thành công');
                return redirect()->route('w.home');
            }

        }
    }
    public function payment_success() {
        $order = session('order_done');
//        dd($order);
        return view('web.cart.payment_success')->with(compact('order'));
    }
}
