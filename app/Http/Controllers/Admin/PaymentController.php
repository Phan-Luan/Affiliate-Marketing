<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LogTransaction;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function withdraw()
    {
        $payments = Payment::where('type', 1)->with('user')->orderBy('id', 'DESC')->paginate(20);

        return view('admin.payments.withdraw')->with(compact('payments'));
    }
    public function confirmWithdraw($id)
    {
        $payment = Payment::find($id);
        $admin = auth()->user();
        if ($payment) {
            $payment->user->use_point += ($payment->amount * 0.24);
            $payment->user->save();
            //trừ 1% phí rút và 5% thuế
            $admin->money += ($payment->amount * 0.06);
            $admin->save();
            $payment->status = 1;
            $payment->save();
            session()->flash('success', 'Duyệt thành công!');
            return redirect()->back();
        } else {
            session()->flash('error', 'Không tìm thấy lệnh');
            return redirect()->back();
        }
    }
    public function drop_withdraw(Request $request, $id)
    {
        $payment = Payment::find($id);
        if ($payment) {
            $payment->status = 2;
            $payment->save();
            // Hoàn tiền
            $user = User::find($payment->user_id);
            $user->money = $user->money + $payment->amount + ($payment->amount * 6) / 100;
            $user->save();
            session()->flash('success', 'Hủy thành công!');
            return redirect()->back();
        } else {
            session()->flash('error', 'Không tìm thấy lệnh');
            return redirect()->back();
        }
    }
    public function transaction()
    {
        $logs = LogTransaction::with(['user', 'user_receive'])->orderBy('id', 'DESC')->paginate(8);

        return view('admin.payments.transaction')->with(compact('logs'));
    }
    public function buy_point()
    {
        $logs = LogTransaction::where('type', 2)->orderBy('id', 'DESC')->paginate(8);
        return view('admin.payments.buy_point')->with(compact('logs'));
    }
    public function confirm_buy_point($id)
    {
        $log = LogTransaction::find($id);
        if ($log) {
            $user = User::find($log->user_id);
            $user->point_buy = $user->point_buy + $log->money;
            $user->save();
            $log->status = 1;
            $log->save();
            session()->flash('success', 'Duyệt thành công!');
            return redirect()->back();
        } else {
            session()->flash('error', 'Không tìm thấy lệnh');
            return redirect()->back();
        }
    }
}
