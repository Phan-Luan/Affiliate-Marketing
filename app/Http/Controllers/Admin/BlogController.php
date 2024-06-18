<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends BaseController
{

    public function index(Request $request)
    {
        $query = Blog::orderBy('id', 'DESC')->with('category');

        // if ( $request->name ) {
        //     $query->where('blogs.name', 'LIKE', '%' . $request->name . '%');
        // }
        // if ($request->category_id) {
        //     $query->where('blogs.category_id', $request->category_id);
        // }

        $blogs = $query->paginate(5);

        $categories = Category::get();

        return view('admin.blogs.index', compact('blogs', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.blogs.create', compact('categories'));
    }

    public function store(CreateBlogRequest $request)
    {
        $data = $request->only('name', 'content', 'description', 'category_id', 'keywords', 'video');

        $data['image'] = $this->uploadFile($request->image);
        $data['slug'] = Str::slug($request->name);
        
        Blog::create($data);
        session()->flash('success', 'Thành Công');

        return redirect()->route('ad.blog.index');


        
    }

    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $data = $request->only('name', 'description', 'category_id', 'content', 'keywords', 'video');

        if ($request->image) {
            $request->validate([
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:5120'
            ]);

            $path = $this->uploadFile($request->image);
            $data['image'] = $path;
        }

        $data['slug'] = Str::slug($request->name);

        $blog->update($data);

        session()->flash('success', 'Thành công');

        return redirect()->route('ad.blog.index');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        session()->flash('success', 'Thành Công!');
        return redirect()->route('ad.blog.index');
    }
}
