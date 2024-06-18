<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function view($slug) {
        $category = ProductCategory::where('slug',$slug)->first();
        $product_hots = Product::where('hot',1)->where('display',1)->take(8)->get();
        if($category) {
            $products = Product::where('category_id',$category->id)->orderBy('id','DESC')->where('display',1)->paginate(20);
            return view('web.productCategory.view')->with(compact('products','category','product_hots'));
        } else {
            $products = Product::where('display',1)->orderBy('id','DESC')->paginate(20);
            return view('web.productCategory.index')->with(compact('products','product_hots'));
        }
    }

    public function index() {
        $product_hots = Product::where('hot',1)->where('display',1)->take(8)->get();
        $products = Product::orderBy('id','DESC')->where('display',1)->paginate(20);
        return view('web.productCategory.index')->with(compact('products','product_hots'));
    }
}
