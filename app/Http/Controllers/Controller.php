<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Jenssegers\Agent\Agent;
use Cart;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

//    public function __construct()
//    {
//        $carts['carts'] = Cart::content();
//        $carts['total'] = Cart::subtotal();
////        $total_pro_cart = 0;
////        if($carts['carts']) foreach ($carts['carts'] as $cart) {
////            $total_pro_cart += $cart->qty;
////        }
////        dd($carts);
//        View::share('carts_home', $carts);
//    }

    public function uploadFile($file)
    {
        $filenameWithExt = $file->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $file->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Upload Image
        $path = $file->storeAs('/public/photos/blog/images', $fileNameToStore);
        return str_replace('public', '/storage', $path);
    }

    public function view($view)
    {
        $agent = new Agent();
        return $agent->isMobile() ? view('web.mobile.'. $view) :  view('web.'. $view);
    }
}
