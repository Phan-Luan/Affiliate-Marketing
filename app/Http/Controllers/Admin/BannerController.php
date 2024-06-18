<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('position','ASC')->paginate(20);
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'position');
        if($request->images != null){
            $data['images'] = $this->uploadFile($request->images);
        }else{
            $data['images'] = asset('/images/defaul-user-image.jpeg');
        }
        Banner::create($data);

        session()->flash('success', 'Thêm banner mới thành công');
        return redirect()->route('ad.banner.index');
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
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $data = $request->only('name', 'position');
        if($request->has('images')) $data['images'] = $this->uploadFile($request->images);
        $banner->update($data);

        session()->flash('success', 'Cập nhật banner thành công');
        return redirect()->route('ad.banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('ad.banner.index')->with('success', 'Xóa banner thành công!');
    }

    public function display(Request $request) {
        $banner = Banner::find($request->banner_id);
        if($banner->display == 0) {
            $banner->display = 1;
        } else {
            $banner->display = 0;
        }
        $banner->save();
        return response('Success', 200)
            ->header('Content-Type', 'text/plain');
    }
}
