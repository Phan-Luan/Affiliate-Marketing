<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Cart;

class ProductsController extends Controller
{
    public function index()
    {
        $product_refunds = Product::orderBy('id', 'DESC')->where('hot', 1)->where('display', 1)->get();
        $product_origins = Product::orderBy('id', 'DESC')->where('origin', 1)->where('display', 1)->get();
        $product_sale1ks = Product::orderBy('id', 'DESC')->where('sale1k', 1)->where('display', 1)->get();
        $products = Product::orderBy('id', 'DESC')->where('display', 1)->get();
        $categories = ProductCategory::orderBy('position', 'ASC')->get();
        $point_buy = User::where('id', auth()->id())->value('point_buy');
        return view('user.products.order')->with(compact('products', 'point_buy', 'product_refunds', 'product_origins', 'product_sale1ks', 'categories'));
    }
    public function add_to_cart(Request $request)
    {
        if ($request->all()['listProduct'] && $request->all()['listQuantity'][0]) {
            $datas = array();
            foreach ($request->all()['listProduct'] as $key => $listProduct) {
                $datas[$key]['product_id'] = $listProduct;
                $datas[$key]['qty'] = $request->all()['listQuantity'][$key];
            }
            foreach ($datas as $data) {
                $product_id = $data['product_id'];
                $qty = intval($data['qty']);
                $product = Product::find($product_id);
                Cart::add($product_id, $product->name, $qty, $product->price, 0, ['image' => $product->image]);
            }
            $json['code'] = 200;
            return response($json, 200)
                ->header('Content-Type', 'text/plain');
        } else {
            $json['code'] = 0;
            $json['msg'] = 'Có lỗi, vui lòng thử lại!';
            return response($json, 200)
                ->header('Content-Type', 'text/plain');
        }
    }

    public function checkout()
    {
        $cartItems = Cart::content();
        $detailedCartItems = [];
        $totalPointBuy = 0; // Biến để lưu tổng point_buy

        // Duyệt qua các mục trong giỏ hàng
        foreach ($cartItems as $item) {
            // Lấy thông tin chi tiết sản phẩm từ cơ sở dữ liệu
            $product = Product::find($item->id);

            // Tính tổng point_buy
            $totalPointBuy += $product->point_buy * $item->qty;

            // Tạo mảng chứa thông tin chi tiết bao gồm point_buy
            $detailedCartItems[] = [
                'rowId' => $item->rowId,
                'id' => $item->id,
                'name' => $item->name,
                'qty' => $item->qty,
                'price' => $item->price,
                'subtotal' => $item->subtotal,
                'point_buy' => $product->point_buy,
            ];
        }

        $carts = [
            'carts' => $detailedCartItems,
            'total' => Cart::subtotal(),
            'total_point_buy' => $totalPointBuy, // Tổng point_buy
        ];

        return view('user.products.checkout')->with(compact('carts'));
    }
    public function reset()
    {
        Cart::destroy();
        return redirect()->route('us.product.index');
    }
    public function store(Request $request)
    {
        $carts = Cart::content();
        $total = (float) str_replace(',', '', Cart::subtotal());
        $user = users()->user();
        $order['user_id'] = $user->id;
        $order['name'] = $request->name;
        $order['phone'] = $request->phone;
        $order['address'] = $request->address;
        $order['status'] = 0;
        $order['total_money'] = $total;
        $order['pro_type'] = 0;
        $order['payment_method'] = $request->ShipType;
        $order['note'] = $request->txtNote;
        if ($request->bill != null) {
            $order['bill'] = $this->uploadFile($request->bill);
        }

        $totalPointBuy = 0; // Biến để lưu tổng point_buy

        // Duyệt qua các mục trong giỏ hàng
        foreach ($carts as $item) {
            // Lấy thông tin chi tiết sản phẩm từ cơ sở dữ liệu
            $product = Product::find($item->id);

            // Tính tổng point_buy
            $totalPointBuy += $product->point_buy * $item->qty;
        }

        if ($user->point_buy < $totalPointBuy) {
            session()->flash('error', 'Không đủ điểm Smile');
            return redirect()->back();
        }

        $status = Order::create($order);
        if ($status) {
            $user->point_buy -= $totalPointBuy;
            $user->save();
            foreach ($carts as $cart) {
                $order_detail['order_id'] = $status->id;
                $order_detail['product_id'] = $cart->id;
                // $userId = users()->user()->id;
                $order_detail['user_id'] = $user->id;
                $order_detail['qty'] = $cart->qty;
                $order_detail['money'] = $cart->price;
                OrderDetail::create($order_detail);
            }
            Cart::destroy();
            session()->flash('success', 'Đặt hàng thành công!');
            return redirect()->route('us.order.index');
        } else {
            session()->flash('info', 'Có lỗi sảy ra. Vui lòng thử lại sau!');
            return redirect()->back();
        }
    }
}
