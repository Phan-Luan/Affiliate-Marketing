<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\LogTransaction;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function buypoint()
    {
        $logs = LogTransaction::where('user_id', users()->user()->id)->where('wallet', 1)->where('add', 0)->orderBy('id', 'DESC')->paginate(30);
        return view('user.payments.buypoint')->with(compact('logs'));
    }
    public function buy_point(Request $request)
    {
        $user = users()->user();
        if ($request->payment_method == 0) { // Trả bằng ví hoa hồng
            if ($user->money < $request->amount * 1000) {
                session()->flash('info', 'Số dư ví hoa hồng của bạn không đủ để mua!');
                return redirect()->back();
            } else {
                // Trừ tiền
                $user->money = $user->money - $request->amount * 1000;
                $user->save();
                // Lưu Log
                $log['user_id'] = $user->id;
                $log['before'] = $user->money + $request->amount * 1000;
                $log['money'] = $request->amount * 1000;
                $log['after'] = $user->money + $request->amount * 1000;
                $log['status'] = 1;
                $log['type'] = 13;
                $log['add'] = 1;
                $log['wallet'] = 0;
                $log['reason'] = 'Mua điểm Voucher bằng ví hoa hồng';
                $status = LogTransaction::create($log);
                if ($status) {
                    // Cộng điểm Voucher
                    $user->point_buy = $user->point_buy + $request->amount;
                    $user->save();
                    // Lưu Log
                    $log['user_id'] = $user->id;
                    $log['before'] = $user->point_buy - $request->point_buy;
                    $log['money'] = $request->amount;
                    $log['after'] = $user->point_buy;
                    $log['status'] = 1;
                    $log['type'] = 2;
                    $log['add'] = 0;
                    $log['wallet'] = 1;
                    $log['reason'] = 'Mua điểm Voucher';
                    LogTransaction::create($log);
                }
                session()->flash('success', 'Thành công');
                return redirect()->back();
            }
        } else { // Trả bằng tiền mặt
            $log['user_id'] = $user->id;
            $log['before'] = $user->point_buy;
            $log['money'] = $request->amount;
            $log['after'] = $user->point_buy + $request->amount;
            $log['status'] = 0;
            $log['type'] = 2;
            $log['add'] = 0;
            $log['wallet'] = 1;
            $log['reason'] = 'Mua điểm Voucher';
            $status = LogTransaction::create($log);
            //        dd($status);
            if ($status) {
                session()->flash('buy_point', $status);
                return redirect()->back();
            } else {
                session()->flash('error', 'Có lỗi. Vui lòng thử lại');
                return redirect()->back();
            }
        }
    }
    public function destroy_transaction($id)
    {
        $log = LogTransaction::where('user_id', users()->user()->id)->where('id', $id)->first();
        if ($log) {
            $log->delete();
            session()->flash('success', 'Xóa lệnh thành công!');
            return redirect()->back();
        } else {
            session()->flash('error', 'Không tìm thấy lệnh nạp của bạn!');
            return redirect()->back();
        }
    }
    public function tranfer()
    {
        $logs = LogTransaction::where('user_id', users()->user()->id)->where('wallet', 1)->where('user_gift', '!=', NULL)->orderBy('id', 'DESC')->paginate(30);
        return view('user.payments.tranfer')->with(compact('logs'));
    }
    public function get_balance(Request $request)
    {
        if ($request->wallet == 0) {
            return response(number_format(users()->user()->point_buy), 200)
                ->header('Content-Type', 'text/plain');
        } else {
            return response(number_format(users()->user()->point), 200)
                ->header('Content-Type', 'text/plain');
        }
    }
    public function get_user(Request $request)
    {
        $user = User::where('phone', $request->username)->first();
        return response($user->name, 200)
            ->header('Content-Type', 'text/plain');
    }
    public function tranfer_post(Request $request)
    {
        //        dd($request->all());
        $user = users()->user();
        //        if($request->txtWallet != 0 || $request->txtWallet =! 1) {
        //            session()->flash('error', 'Vui lòng chọn ví muốn chuyển');
        //            return redirect()->back();
        //        }
        if (!$request->txtUserName || !$request->txtAmount) {
            session()->flash('error', 'Vui lòng điền đủ thông tin');
            return redirect()->back();
        }
        if ($request->txtUserName == $user->phone) {
            session()->flash('error', 'Bạn không thể tự chuyển cho chính mình!');
            return redirect()->back();
        }
        if ($request->txtAmount < 10) {
            session()->flash('error', 'Số điểm chuyển tối thiểu là 10');
            return redirect()->back();
        }
        $user_gift = User::where('phone', $request->txtUserName)->first();
        if (!$user_gift) {
            session()->flash('error', 'Không tìm thấy người nhận!');
            return redirect()->back();
        }
        //        if($request->txtWallet == 0) {
        //            if($user->point_buy < $request->txtAmount) {
        //                session()->flash('error', 'Số dư ví của bạn không đủ');
        //                return redirect()->back();
        //            }
        //            // Trừ tiền người chuyển
        //            $user->point_buy = $user->point_buy - $request->txtAmount;
        //            $user->save();
        //            // Lưu log
        //            $log['user_id'] = $user->id;
        //            $log['user_gift'] = $user_gift->id;
        //            $log['before'] = $user->point_buy + $request->txtAmount;
        //            $log['money'] = $request->txtAmount;
        //            $log['after'] = $user->point_buy;
        //            $log['status'] = 1;
        //            $log['type'] = 0;
        //            $log['add'] = 1;
        //            $log['wallet'] = 1;
        //            $log['note'] = $request->txtNote;
        //            $log['reason'] = 'Chuyển điểm Voucher Mua cho '.$user_gift->phone.'';
        //            LogTransaction::create($log);
        //
        //            // Cộng tiền người nhận
        //            $user_gift->point_buy = $user_gift->point_buy + $request->txtAmount;
        //            $user_gift->save();
        //
        //            // Lưu log
        //            $log['user_id'] = $user_gift->id;
        //            $log['user_gift'] = $user->id;
        //            $log['before'] = $user_gift->point_buy - $request->txtAmount;
        //            $log['money'] = $request->txtAmount;
        //            $log['after'] = $user_gift->point_buy ;
        //            $log['status'] = 1;
        //            $log['type'] = 1;
        //            $log['add'] = 0;
        //            $log['wallet'] = 1;
        //            $log['note'] = $request->txtNote;
        //            $log['reason'] = 'Nhận điềm Voucher Mua từ '.$user_gift->phone.'';
        //            LogTransaction::create($log);
        //
        //            session()->flash('success', 'Chuyển điểm thành công');
        //            return redirect()->back();
        //        } elseif ($request->txtWallet == 1) {
        if ($user->point_buy < $request->txtAmount) {
            session()->flash('error', 'Số dư ví của bạn không đủ');
            return redirect()->back();
        }
        // Trừ tiền người chuyển
        $user->point_buy = $user->point_buy - $request->txtAmount;
        $user->save();

        // Lưu log
        $log['user_id'] = $user->id;
        $log['user_gift'] = $user_gift->id;
        $log['before'] = $user->point_buy + $request->txtAmount;
        $log['money'] = $request->txtAmount;
        $log['after'] = $user->point_buy;
        $log['status'] = 1;
        $log['type'] = 0;
        $log['add'] = 1;
        $log['wallet'] = 1;
        $log['note'] = $request->txtNote;
        $log['reason'] = '' . $user->phone . ' chuyển điểm Voucher Mua cho ' . $user_gift->phone . '';
        LogTransaction::create($log);

        // Cộng tiền người nhận
        $user_gift->point_buy = $user_gift->point_buy + $request->txtAmount;
        $user_gift->save();
        // Lưu log
        $log['user_id'] = $user_gift->id;
        $log['user_gift'] = $user->id;
        $log['before'] = $user_gift->point_buy - $request->txtAmount;
        $log['money'] = $request->txtAmount;
        $log['after'] = $user_gift->point_buy;
        $log['status'] = 1;
        $log['type'] = 1;
        $log['add'] = 0;
        $log['wallet'] = 1;
        $log['note'] = $request->txtNote;
        $log['reason'] = 'Nhận chuyển điểm Voucher Mua từ ' . $user_gift->phone . '';
        LogTransaction::create($log);

        session()->flash('success', 'Chuyển điểm thành công');
        return redirect()->back();
        //        } else {
        //            session()->flash('error', 'Không tìm thấy ví chuyển!');
        //            return redirect()->back();
        //        }
    }
    public function history_transaction()
    {
        $logs = LogTransaction::where('user_id', users()->user()->id)->orderBy('id', 'DESC')->paginate(30);
        return view('user.payments.history_transaction')->with(compact('logs'));
    }
    public function withdraw()
    {
        $payments = Payment::where('user_id', users()->user()->id)->orderBy('id', 'DESC')->paginate(20);
        return view('user.payments.withdraw')->with(compact('payments'));
    }
    public function withdraw_post(Request $request)
    {
        //        dd($request->all());
        $user = users()->user();
        $amount = (float)str_replace(',', '', $request->txtAmount);
        //        dd($amount);
        if ($amount < 450000) {
            session()->flash('error', 'Số tiền rút tối thiểu là : 450.000 VNĐ');
            return redirect()->back();
        }
        $money_amount = $amount + ($amount * 6) / 100;
        if ($user->money < $money_amount) {
            session()->flash('error', 'Số dư của bạn không đủ!');
            return redirect()->back();
        }
        $payment['user_id'] = $user->id;
        $payment['amount'] = $amount;
        $payment['order_id'] = time();
        $payment['status'] = 0;
        $payment['type'] = 1;
        $payment['name'] = $user->bank->name;
        $payment['bank'] = $user->bank->bank;
        $payment['number'] = $user->bank->number;
        $payment['branch'] = $user->bank->branch;
        $create = Payment::create($payment);
        if ($create) {
            $user->money = $user->money - $money_amount;
            $user->save();
            session()->flash('success', 'Thành công!');
            return redirect()->back();
        } else {
            session()->flash('error', 'Có lỗi. Vui lòng thử lại!');
            return redirect()->back();
        }
    }
}
