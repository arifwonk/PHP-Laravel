<?php

namespace App\Http\Controllers;

use App\models\Post;
use App\Models\Category;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            'title' => 'Database Spareparts',
            'posts' => Post::latest()->filter(request(['search', 'category', 'username']))->Paginate(10)->withQueryString(),
            'categories' => Category::all(),

        ]);
       
    }

    public function show(Post $post) {
        return view('post',[
            "title" => "Show Detail Database Spareparts",
            "post" => $post
        ]);
    }

}
