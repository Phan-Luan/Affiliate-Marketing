<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Config;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $userId = users()->user()->id;
        // Lấy tất cả chi tiết đơn hàng của người dùng hiện tại khi mua
        $orderDetails = OrderDetail::where('user_id', $userId)->orderBy('id', 'DESC')->paginate(20);
        // dd($orderDetails);
        // Phí thành viên
        $membership_fee = Order::where('user_id', users()->user()->id)
            ->where('pro_type', 2)
            ->where('status', 1)
            ->sum('total_money');
        $products = [];
        $totalProfit = 0; // Khởi tạo biến tổng lợi nhuận

        // Lặp qua từng chi tiết đơn hàng để lấy thông tin sản phẩm
        foreach ($orderDetails as $orderDetail) {
            // Lấy id sản phẩm từ chi tiết đơn hàng
            $productId = $orderDetail->product_id;

            // Tìm sản phẩm chi tiết dựa trên id sản phẩm
            $product = Product::find($productId);
            if ($product) {
                $products[] = $product;

                // Tính lợi nhuận từ sản phẩm và cộng vào tổng lợi nhuận
                $orderProfit = ($product->price - $product->price_sale) * 0.1 * $orderDetail->qty;

                $totalProfit += $orderProfit;
                // dd($totalProfit);
            }
        }
        // Phí sản xuất kinh doanh
        $production_business = 0;
        $phi_sxkd = Order::where('user_id', users()->user()->id)->where('pro_type', 4)->first();
        if ($phi_sxkd) {
            $production_business = 1900000 * 0.02;
        }
        // Quỹ phụ nữ khởi nghiệp
        $wallet_woment = 0;
        $women_wallets = Order::where('user_id', users()->user()->id)
            ->where('pro_type', 5)
            ->pluck('total_money');
        foreach ($women_wallets as $women_wallet) {
            $wallet_woment += $women_wallet;
        }


        $warehouse = $totalProfit + ($membership_fee * 0.03) + $production_business + ($wallet_woment * 0.02);
        $pointUser =  User::where('id', $userId)->update(['point' => users()->user()->point += $warehouse]);

        // $orderrefund = Order::orderBy('id', 'DESC')->where('pro_type', 0)->where('total_money', '>=', 1000000)->paginate(20);
        // $orderrefund = Order::orderBy('id', 'DESC')->where('pro_type', 0)->where('total_money', '<', 1000000)->paginate(20);

        $orders = OrderDetail::where('user_id', $userId)->with(['order', 'product'])->orderBy('id', 'DESC')->paginate(20);
        // $userId = users()->user()->id;

        // foreach ($orders as $key => $order) {
        //     $total_money = $order->money * $order->qty;
        //     if ($total_money <= $pointUser * 1.5) {
        //         $beforepointUser = $pointUser * 1.5;
        //         // Cập nhật hoặc tạo mới giá trị cho chính nó
        //         $user = User::where('id', $userId)->first();
        //             $user->update(['money' => $user->money + $beforepointUser/150*100]);                
        //         // Cập nhật thuộc tính 'pro_type' của đơn hàng thành 1
        //         Order::where('user_id', $userId)->update(['pro_type' => 1]);

        //         // Cập nhật hoặc tạo mới giá trị cho người giới thiệu
        //         $Id_invite_user = users()->user()->invite_user;
        //         $userInvite = User::where('invite_user', $Id_invite_user)->first();
        //         if ($userInvite) {
        //             $userInvite->update(['money' => $userInvite->money + $beforepointUser/150*50]);
        //         } else {
        //             User::create(['invite_user' => $Id_invite_user, 'money' => $userInvite->money + $beforepointUser/150*50]);
        //         }
        //     }
        //     // dd($warehouse, $order->total_money);
        // }

        $categories = ProductCategory::orderBy('id', 'DESC')->get();
        $products = Product::where('user_id', $userId)
            ->where('display', 1)
            ->orderBy('id', 'DESC')
            ->paginate(10);
        $orderdetailsuser = OrderDetail::where('user_id', $userId)->orderBy('id', 'DESC')->paginate(20);

        return view('user.orders.index', compact('orders', 'warehouse', 'products', 'orderdetailsuser'));
    }
    public function warehouse()
    {
        $userId = users()->user()->id;
        // Lấy tất cả chi tiết đơn hàng của người dùng hiện tại khi mua
        $orderDetails = OrderDetail::where('user_id', $userId)->orderBy('id', 'DESC')->paginate(20);
        // dd($orderDetails);
        // Phí thành viên
        $membership_fee = Order::where('user_id', users()->user()->id)
            ->where('pro_type', 2)
            ->where('status', 1)
            ->sum('total_money');
        $products = [];
        $totalProfit = 0; // Khởi tạo biến tổng lợi nhuận

        // Lặp qua từng chi tiết đơn hàng để lấy thông tin sản phẩm
        foreach ($orderDetails as $orderDetail) {
            // Lấy id sản phẩm từ chi tiết đơn hàng
            $productId = $orderDetail->product_id;

            // Tìm sản phẩm chi tiết dựa trên id sản phẩm
            $product = Product::find($productId);
            if ($product) {
                $products[] = $product;

                // Tính lợi nhuận từ sản phẩm và cộng vào tổng lợi nhuận
                $orderProfit = ($product->price - $product->price_sale) * 0.1 * $orderDetail->qty;

                $totalProfit += $orderProfit;
                // dd($totalProfit);
            }
        }
        // Phí sản xuất kinh doanh
        $production_business = 0;
        $phi_sxkd = Order::where('user_id', users()->user()->id)->where('pro_type', 4)->first();
        if ($phi_sxkd) {
            $production_business = 1900000 * 0.02;
        }
        // Quỹ phụ nữ khởi nghiệp
        $wallet_woment = 0;
        $women_wallets = Order::where('user_id', users()->user()->id)
            ->where('pro_type', 5)
            ->pluck('total_money');
        foreach ($women_wallets as $women_wallet) {
            $wallet_woment += $women_wallet;
        }


        $warehouse = $totalProfit + ($membership_fee * 0.03) + $production_business + ($wallet_woment * 0.02);
        // $pointUser =  User::where('id', $userId)->update(['point' => users()->user()->point += $warehouse]);

        return view('user.orders.warehouse', compact('totalProfit', 'membership_fee', 'wallet_woment', 'production_business', 'products', 'warehouse', 'userId'));
    }

    public function update_status($id)
    {
        $order = Order::where('id', $id)->first();

        if ($order) {
            if ($order->status == 0) {
                $order->status = 2;
                $order->save();

                return response()->json(['status' => 'success', 'msg' => "Hủy đơn hàng thành công!"]);
            } else {
                return response()->json(['status' => 'error', 'msg' => "Không thể hủy đơn hàng. Trạng thái đơn hàng hiện tại là: " . $order->status_name]);
            }
        } else {
            return response()->json(['status' => 'error', 'msg' => "Không tìm thấy đơn hàng với ID: $id"]);
        }
    }
}
