<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Cart;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        $categories = ProductCategory::orderBy('position','ASC')->get();
//        $product_hots = Product::where('hot',1)->where('display',1)->take(3)->get();
//
////        dd($carts);
//        View::share('categories', $categories);
//        View::share('product_hot_footer', $product_hots);
//        View::share('carts_home', $carts);

    }
}
