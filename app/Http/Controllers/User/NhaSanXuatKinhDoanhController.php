<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NhaSanXuatKinhDoanhController extends Controller
{

    public function index()
    {
        $userId = users()->user()->id;
        $categories = ProductCategory::orderBy('id', 'DESC')->get();
        $products = Product::orderBy('id', 'DESC')->where('user_id', users()->user()->id)->paginate(10);
        $orderdetailsuser = OrderDetail::where('user_id', $userId)->orderBy('id', 'DESC')->paginate(20);


        // F1 F2 F3
        return view('user.productsuser.index', compact('products', 'categories', 'orderdetailsuser'));
    }


    public function create()
    {
        $users = User::where('type', '>=', 2)->orderBy('id', 'DESC')->get();
        $categories = ProductCategory::orderBy('id', 'DESC')->get();
        return view('user.productsuser.create', compact('categories', 'users'));
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
        $data['user_id'] = users()->user()->id;
        $data['slug'] = Str::slug($request->name);
        if ($request->image != null) {
            $data['image'] = $this->uploadFile($request->image);
        }

        Product::create($data);
        session()->flash('success', 'Thêm sản phẩm mới thành công');

        return redirect()->route('us.product.index');
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


    public function edit(Product $product)
    {
        // $users = User::where('type','>=',2)->orderBy('id','DESC')->get();
        $categories = ProductCategory::orderBy('id', 'DESC')->get();
        return view('user.productsuser.edit', compact('product', 'categories'));
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
        $data = $request->only('name', 'description', 'content', 'unit', 'price', 'price_sale', 'type', 'origin');
        if ($request->user_connect != 'default') {
            $data['user_connect'] = $request->user_connect;
        } else
            $data['user_connect'] = null;
        $data['user_id'] = users()->user()->id;

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
        return redirect()->route('us.product.index');
    }


    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success', 'Xóa sản phẩm thành công!');
        return redirect()->route('us.product.index');
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
