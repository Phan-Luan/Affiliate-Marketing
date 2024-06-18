<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use Jenssegers\Agent\Agent;
use Cart;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::where('display', 1)->orderBy('position', 'ASC')->get();
        $product_hots = Product::where('display', 1)->where('hot', 1)->take(15)->orderBy('id', 'DESC')->get();
        $categories = ProductCategory::orderBy('position', 'ASC')->get();
        $blogs = Blog::orderBy('id', 'DESC')->take(10)->get();
        $videos = Video::orderBy('position', 'ASC')->get();
        //        dd($categories,$product_cates);
        //        $carts['carts'] = Cart::content();
        //        $carts['total'] = Cart::subtotal();
        //        dd($carts);

        return view('web.home.index')->with(compact('product_hots', 'banners', 'categories', 'blogs', 'videos'));
    }
}
