<?php

namespace App\Http\Controllers;

use App\Models\CronJob;
use App\Models\LogTransaction;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CronJobController extends Controller
{

    public function delete_user_7_day(Request $request) {
        if($request->token != 'FSZ1BMOHgaqtGey') {
            $job['money'] = 0;
            $job['type'] = 3;
            $job['note'] = 'Token không hợp lệ';
            CronJob::create($job);
            return response('Token không hợp lệ', 200)
                ->header('Content-Type', 'text/plain');
        } else {
            $dt = Carbon::now('Asia/Ho_Chi_Minh');
            $time = $dt->subDay(7)->toDateTimeString();
//            dd($time);
            $users =  User::where('type',1)->where('created_at','<',$time)->get();
            if($users->count() > 0) {
                foreach ($users as $user) {
                    $order = Order::where('user_id',$user->id)->where('pro_type',1)->where('bill',null)->first();
                    if($order) {
                        $order->delete();
                        $job['money'] = 0;
                        $job['type'] = 3;
                        $job['note'] = 'Xóa thành công user '.$user->name.'('.$user->phone.')';
                        CronJob::create($job);
                        $user->delete();
                    }
                }
            }
        }
    }

    public function thuong_ca_nhan_xuat_sac(Request $request) {
        if($request->token != 'FSZ1BMOHgaqtGey') {
            $job['money'] = 0;
            $job['type'] = 3;
            $job['note'] = 'Token không hợp lệ';
            CronJob::create($job);
            return response('Token không hợp lệ', 200)
                ->header('Content-Type', 'text/plain');
        } else {
            $dt = Carbon::now('Asia/Ho_Chi_Minh');
            $dt->subMonth()->firstOfMonth();
            $timeStart = $dt->toDateString().' 00:00:00';

            $dt->lastOfMonth();
            $timeEnd = $dt->toDateString().' 23:59:59';

            $total_sale = Order::where('status',1)->where('time_confirm','>=',$timeStart)->where('pro_type',1)->where('time_confirm','<=',$timeEnd)->sum('total_money');

            $users =  User::where('type',2)->get();
            if($users->count() > 0) {
                foreach ($users as $user) {
                    $count_f1 = User::where('type',2)->where('invite_user',$user->id)->where('created_at','>=',$timeStart)->where('created_at','<=',$timeEnd)->count();

                    if($count_f1 >= 50 && $count_f1 < 100) {
                        $percent = 2;
                    } elseif ($count_f1 >= 100 && $count_f1 < 500) {
                        $percent = 3;
                    } elseif($count_f1 >= 500) {
                        $percent = 10;
                    } else {
                        $percent = 0;
                    }
                    if($percent > 0 && $count_f1 >= 50) {
                        $total_money = ($total_sale*$percent)/100;
                        $user->money = $user->money + $total_money;
                        $user->save();
                        // Lưu Log
                        $log['user_id'] = $user->id;
                        $log['before'] = $user->money - $total_money;
                        $log['money'] = $user;
                        $log['after'] = $user->money;
                        $log['status'] = 1;
                        $log['type'] = 4;
                        $log['add'] = 0;
                        $log['wallet'] = 0;
                        $log['reason'] = 'Thưởng cá nhân ưu tú (Phí thành viên) tháng '.\Carbon\Carbon::createFromDate($dt->toDateString())->format('m/Y').'';
                        LogTransaction::create($log);
                    }
                }
            }
        }
    }
    public function thuong_ca_nhan_xuat_sac_ban_hang(Request $request) {
        if($request->token != 'FSZ1BMOHgaqtGey') {
            $job['money'] = 0;
            $job['type'] = 3;
            $job['note'] = 'Token không hợp lệ';
            CronJob::create($job);
            return response('Token không hợp lệ', 200)
                ->header('Content-Type', 'text/plain');
        } else {
            $dt = Carbon::now('Asia/Ho_Chi_Minh');
            $dt->subMonth()->firstOfMonth();
            $timeStart = $dt->toDateString().' 00:00:00';

            $dt->lastOfMonth();
            $timeEnd = $dt->toDateString().' 23:59:59';
            $total_sale = Order::where('status',1)->where('time_confirm','>=',$timeStart)->where('pro_type',0)->where('time_confirm','<=',$timeEnd)->sum('total_money');
            $users =  User::where('type',2)->get();
            if($users->count() > 0) {
                foreach ($users as $user) {
                    $count_f1 = User::where('type',2)->where('invite_user',$user->id)->where('created_at','>=',$timeStart)->where('created_at','<=',$timeEnd)->count();

                    if($count_f1 >= 50 && $count_f1 < 100) {
                        $percent = 2;
                    } elseif ($count_f1 >= 100 && $count_f1 < 500) {
                        $percent = 3;
                    } elseif($count_f1 >= 500) {
                        $percent = 10;
                    } else {
                        $percent = 0;
                    }
                    if($percent > 0 && $count_f1 >= 50) {
                        $total_money = ($total_sale*$percent)/100;
                        $user->money = $user->money + $total_money;
                        $user->save();
                        // Lưu Log
                        $log['user_id'] = $user->id;
                        $log['before'] = $user->money - $total_money;
                        $log['money'] = $user;
                        $log['after'] = $user->money;
                        $log['status'] = 1;
                        $log['type'] = 5;
                        $log['add'] = 0;
                        $log['wallet'] = 0;
                        $log['reason'] = 'Thưởng cá nhân ưu tú (Bán hàng) tháng '.\Carbon\Carbon::createFromDate($dt->toDateString())->format('m/Y').'';
                        LogTransaction::create($log);
                    }
                }
            }
        }
    }
}
