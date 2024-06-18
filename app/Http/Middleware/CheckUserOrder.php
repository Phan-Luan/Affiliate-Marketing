<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class CheckUserOrder
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $order = Order::where('pro_type', 4)->where('status', 1)->where('user_id', users()->user()->id)->count();
        if ($order) {
            Route::resource('product', 'NhaSanXuatKinhDoanhController')->except('show');
            Route::resource('productcategory', 'ProductCategoryUserController');
        }
        return $next($request);
    }
}
