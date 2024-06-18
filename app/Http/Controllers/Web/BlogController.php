<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $blog_realates = Blog::where('id','!=', $blog->id)->take(3)->get();
        $blog_news = Blog::where('id','!=', $blog->id)->orderBy('id','DESC')->take(5)->get();
        $product_hots = Product::where('hot',1)->where('display',1)->take(8)->get();
        $productCategory = ProductCategory::orderBy('id','DESC')->get();
        return view('web.blog.view')->with(compact('blog','blog_realates','blog_news','product_hots','productCategory'));
    }

    public function category() {
        $blogs = Blog::orderBy('id','DESC')->paginate(15);
        $blog_news = Blog::orderBy('id','DESC')->take(5)->get();
        $product_hots = Product::where('hot',1)->where('display',1)->take(8)->get();
        $productCategory = ProductCategory::orderBy('id','DESC')->get();
        return view('web.blog.category')->with(compact('blogs','blog_news','product_hots','productCategory'));
    }
}
