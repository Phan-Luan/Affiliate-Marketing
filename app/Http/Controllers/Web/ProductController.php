<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index ($slug) {
        $product = Product::where('slug',$slug)->first();
        $categories = ProductCategory::orderBy('id', 'DESC')->get();

        $product_hots = Product::where('hot',1)->where('display',1)->take(8)->get();
        $product_relates = Product::where('category_id',$product->category_id)->where('id','!=',$product->id)->where('display',1)->take(4)->get();
        return view('web.home.productdetail')->with(compact('product', 'categories','product_hots','product_relates'));
    }
    public function getProduct(Request $request) {
        $product = Product::find($request->id);
        return response($product, 200)
            ->header('Content-Type', 'text/plain');
    }
}
