<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class BlogController extends Controller
{
    public function index(Posts $posts){
    	$posts = $posts->orderBy('created_at', 'desc')->get();
    	$file_loc = "public/uploads/posts/";
    	return view('blog', compact('posts','file_loc'));
    }

    public function read_post($slug){
    	$post = Posts::where('slug', $slug)->get();
    	$file_loc = "public/uploads/posts/";
    	return view('blog.post', compact('post','file_loc'));
    }
}
