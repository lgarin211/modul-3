<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $getBlog  = Cache::store('memcached')->remember('blog_smk_cloud_provider_index_post', 3600, function() { */
        /*     return Blog::all(); */
        /* }); */
        $getBlog = Cache::remember('blog_smk_cloud_provider_index_post', 600, function() {
            return Blog::all();    
        });
        
        //
        return view('blog.index', [
            'blog' => $getBlog,
        ]);
    }

    public function dashboard()
    {
        $blog     = new Blog();
        $getBlog  = $blog::all(); 
         
        return view('dashboard', ['blog' => $getBlog]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image'
        ]);

        $imageName = $request->file('image')->getClientOriginalName();
        $imagePath = $request->file('image')->storePublicly('public/img');

        $blog = new Blog();
        $blog->title      = $request->title;
        $blog->body       = $request->body;
        $blog->image_name = $imageName;
        $blog->image_path = Storage::url($imagePath);

        $blog->save();

        return redirect('/dashboard')->with('status', 'Succesfully create a new Post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog, $id)
    {
        $getBlog  = Cache::remember('blog_smk_cloud_provider_show_post_' . $id, 3600, function() use ($id) {
            return Blog::findOrFail($id);
        });

        //
        return view('blog.show', [
            'blog' => $getBlog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog, $id)
    {
        //
        $blog             = Blog::find($id);
        $getImagePath     = $blog->image_path;
        $parseImagePath   = ltrim(parse_url($getImagePath, PHP_URL_PATH), '/');

        $blog->delete();

        Storage::delete($parseImagePath);
        return redirect('/dashboard')->with('status', 'Succesfully delete a post');
    }

    /**
     * Upload file to local disk or amazon s3
     *
     */
    public function upload(Request $request) {
        
    }
}
