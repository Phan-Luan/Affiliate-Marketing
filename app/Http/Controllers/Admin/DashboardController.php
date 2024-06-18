<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log_refund_warehouse;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Tổng đơn hàng / doanh số
        $report_order['total_order'] = Order::count();
        $report_order['total_sale'] = Order::sum('total_money');

        // Tổng đơn hàng / doanh số chưa duyệt
        $report_order['total_order_not_pay'] = Order::where('status', 0)->count();
        $report_order['total_sale_not_pay'] = Order::where('status', 0)->sum('total_money');

        // Tổng đơn hàng / doanh số đã duyệt
        $report_order['total_order_pay'] = Order::where('status', 1)->count();
        $report_order['total_sale_pay'] = Order::where('status', 1)->sum('total_money');

        // Tổng thành viên
        $report_user['total_user'] = User::count();
        $report_user['total_user_not_active'] = User::where('type', 1)->count();
        $report_user['total_user_active'] = User::where('type', 2)->count();

        // Tổng hoa hồng, voucher còn trong User
        $report_money['money'] = User::sum('money');
        $report_money['voucher_gift'] = User::sum('point');
        $report_money['voucher_buy'] = User::sum('point_buy');

        // Tổng doanh số theo sản phẩm đã duyệt
        $report_order['total_order_product'] = Order::where('status', 1)->where('pro_type', 0)->sum('total_money');

        // Chart user đăng ký theo ngày
        $day = 30;
        $date_now1 = date('Y-m-j');
        $date1 = strtotime('-30 day', strtotime($date_now1));
        $date1 = date('Y-m-j', $date1);

        $report_user_daily = array();
        $report_user_daily[0][] = 'Ngày';
        $report_user_daily[0][] = 'Thành viên';
        for ($i = 1; $i <= $day; $i++) {
            $new_date1 = strtotime('+' . $i . ' day', strtotime($date1));
            $new_date_format = date('Y-m-j', $new_date1);
            $date_start = date('Y-m-j 00:00:00', $new_date1);
            $date_end = date('Y-m-j 23:59:59', $new_date1);
            $user_new = User::where('created_at', '>=', $date_start)->where('created_at', '<=', $date_end)->count();

            $report_user_daily[$i][0] = $new_date_format;
            $report_user_daily[$i][1] = $user_new;
        }


        return view('admin.home')->with(compact('report_order', 'report_user', 'report_user_daily', 'report_money'));
    }

    public function refund_warehouse()
    {
        $refund_warehouses = Log_refund_warehouse::with('user')->orderBy('id', 'desc')->paginate(10);
        return view('admin.payments.refund_warehouse', compact('refund_warehouses'));
    }
}
