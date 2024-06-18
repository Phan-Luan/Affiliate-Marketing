<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Str;

class ProductCategoryUserController extends Controller
{
  
    public function index()
    {
        $categories = ProductCategory::orderBy('id','DESC')->get();
        return view('user.product-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('user.product-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $save = $request->only('name', 'description','position');
        $save['slug'] = Str::slug($request->name);
        if($request->image != null){
            $save['image'] = $this->uploadFile($request->image);
        }
        ProductCategory::create($save);
        if($save){
            session()->flash('success', 'Tạo mới thành công');
            return redirect()->route('us.product.index');
        } else {
            session()->flash('error', 'Tạo mới thất bại');
            return redirect()->back();
        }
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

    
    public function edit(ProductCategory $productcategory)
    {
        return view('user.product-categories.edit', compact('productcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productcategory)
    {
        $update = $request->only('name', 'description','position');
        $update['slug'] = Str::slug($request->name);
        if ($request->image != null) {
            $request->validate([
                'image' => 'mimes:jpeg,png,jpg,gif,svg|max:5120'
            ]);
            $path = $this->uploadFile($request->image);
            $update['image'] = $path;
        }
        $productcategory->update($update);
        if($update){
            session()->flash('success', 'Cập nhật thành công');
            return redirect()->route('us.product.index');
        } else {
            session()->flash('error', 'Cập nhật thất bại');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productcategory)
    {
        $productcategory->delete();
        session()->flash('success', 'Xóa thành công');
        return redirect()->route('us.productcategory.index');
    }
}
