<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'title' => 'Posts',
            'posts' => Post::latest()->filter(request(['search', 'category', 'username']))->Paginate(25)->withQueryString()
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'title' => 'Insert new data',
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request);

        // return $request->file('image')->store('post-images');

        $validateData = $request->validate([
            'kode' => 'required|unique:posts',
            'deskripsi' => 'required|max:255',
            'l_deskripsi' => 'required|max:255',
            'qty' => 'required',
            'loc' => 'required',
            'ma' => 'required',
            'rop' => 'required',
            'mi' => 'required',
            'price' => 'required',
            'category_id' => 'required|max:255',
            'image' => 'image|file|max:1024'
        ]);

        if($request->file('image')){


            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $ekstensi =explode('.', $image_name);
            $ekstensi = strtolower(end($ekstensi));

            $titik = '.';
            $namaFileBaru =  $request->kode .= $titik  .= $ekstensi;
            
            $validateData['image'] = $request->file('image')->storeAS('post-images', $namaFileBaru);

            // Upload nama random by sistem laravel
            // $validateData['image'] = $request->file('image')->store('post-images');
        }

        $validateData['user_id'] = auth()->user()->id;

        Post::create($validateData);

        return redirect('/dashboard/posts')->with('status', 'Data Has Been Added..!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'title' => 'Show Details Speck',
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post 
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'title' => 'Edit data',
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'deskripsi' => 'required|max:255',
            'l_deskripsi' => 'required|max:255',
            'qty' => 'required',
            'loc' => 'required',
            'ma' => 'required',
            'rop' => 'required',
            'mi' => 'required',
            'price' => 'required',
            'category_id' => 'required|max:255',
            'image' => 'image|file|max:1024'
        ];

        if($request->kode != $post->kode){
            $rules['kode'] = 'required|unique:posts';
        }

        $validateData = $request->validate($rules);

        if($request->file('image')){

            if($request->oldImage){
                Storage::delete($request->oldImage);
            }

            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $ekstensi =explode('.', $image_name);
            $ekstensi = strtolower(end($ekstensi));

            $titik = '.';
            $namaFileBaru =  $request->kode .= $titik  .= $ekstensi;
            
            $validateData['image'] = $request->file('image')->storeAS('post-images', $namaFileBaru);

            // Update Nama random by sistem laravel
            // $validateData['image'] = $request->file('image')->store('post-images');
        }

        $validateData['user_id'] = auth()->user()->id;

        Post::where('id', $post->id )
            ->update($validateData);

        return redirect('/dashboard/posts')->with('status', 'Data Has Been Updated..!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image){
                Storage::delete($post->image);
            }

        Post::destroy($post->id);

        return redirect('/dashboard/posts')->with('status', 'Data Has Been Deleted..!');
    }
}
