<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductCategory::orderBy('id', 'DESC')->get();
        $products = Product::orderBy('id', 'DESC')->paginate(10);

        return view('admin.products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('type', '>=', 2)->orderBy('id', 'DESC')->get();
        $categories = ProductCategory::orderBy('id', 'DESC')->get();
        return view('admin.products.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'price', 'price_sale', 'unit', 'content', 'description', 'category_id', 'type', 'origin', 'point_buy');
        if ($request->user_connect != 'default') {
            $data['user_connect'] = $request->user_connect;
        }
        // $data['display'] = 0;
        $data['slug'] = Str::slug($request->name);
        if ($request->image != null) {
            $data['image'] = $this->uploadFile($request->image);
        } else {
            $data['image'] = asset('/images/defaul-user-image.jpeg');
        }

        Product::create($data);
        session()->flash('success', 'Thêm sản phẩm mới thành công');

        return redirect()->route('ad.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $users = User::where('type', '>=', 2)->orderBy('id', 'DESC')->get();
        $categories = ProductCategory::orderBy('id', 'DESC')->get();
        return view('admin.products.edit', compact('product', 'categories', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->only('name', 'description', 'content', 'unit', 'price', 'price_sale', 'type', 'origin', 'point_buy');
        if ($request->user_connect != 'default') {
            $data['user_connect'] = $request->user_connect;
        } else $data['user_connect'] = null;

        $data['slug'] = Str::slug($request->name);
        if ($request->image != null) {
            $request->validate([
                'image' => 'mimes:jpeg,png,jpg,gif,svg|max:5120'
            ]);
            $path = $this->uploadFile($request->image);
            $data['image'] = $path;
        }

        $product->update($data);
        session()->flash('success', 'Cập nhật sản phẩm thành công');
        return redirect()->route('ad.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success', 'Xóa sản phẩm thành công!');
        return redirect()->route('ad.product.index');
    }

    public function hot(Request $request)
    {
        $product = Product::find($request->pro_id);
        if ($product->hot == 0) {
            $product->hot = 1;
        } else {
            $product->hot = 0;
        }
        $product->save();
        return response('Success', 200)
            ->header('Content-Type', 'text/plain');
    }
    public function sale1k(Request $request)
    {
        $product = Product::find($request->pro_id);
        if ($product->sale1k == 0) {
            $product->sale1k = 1;
        } else {
            $product->sale1k = 0;
        }
        $product->save();
        return response('Success', 200)
            ->header('Content-Type', 'text/plain');
    }
    public function origin(Request $request)
    {
        $product = Product::find($request->pro_id);
        if ($product->origin == 0) {
            $product->origin = 1;
        } else {
            $product->origin = 0;
        }
        $product->save();
        return response('Success', 200)
            ->header('Content-Type', 'text/plain');
    }
    public function display(Request $request)
    {
        $product = Product::find($request->pro_id);
        if ($product->display == 0) {
            $product->display = 1;
        } else {
            $product->display = 0;
        }
        $product->save();
        return response('Success', 200)
            ->header('Content-Type', 'text/plain');
    }
}
