<?php

namespace App\Http\Middleware;

use App\Models\Bank;
use Closure;
use Illuminate\Http\Request;
use App\Models\CustomerBank;

class CheckBankCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $bank = Bank::where('user_id',users()->user()->id)->first();
        if(!$bank) {
            session()->flash('info', 'Vui lòng thêm tài khoản ngân hàng trước!');
            return redirect()->route('us.account.bank');
        }
        return $next($request);
    }
}
