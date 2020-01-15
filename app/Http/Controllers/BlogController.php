<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Category;

class BlogController extends Controller
{
    public function index(Posts $post){
    	$posts = $post->latest()->take(6)->get();
    	$popular_post = $post->latest()->take(4)->get();
    	$file_loc = "public/uploads/posts/";
    	$categories = Category::all();
    	$newest_post = $post->latest()->take(1)->get();
    	$two_newest_post = $post->latest()->skip(1)->take(2)->get();
    	return view('blog', compact('posts','file_loc','popular_post', 'categories','newest_post','two_newest_post'));
    }

    public function read_post($slug){
    	$post = Posts::where('slug', $slug)->get();
    	$file_loc = "public/uploads/posts/";
    	$popular_post = Posts::latest()->take(4)->get();
    	$categories = Category::all();
    	$newest_post = Posts::latest()->take(1)->get();
    	$two_newest_post = Posts::latest()->skip(1)->take(2)->get();
    	return view('blog.post', compact('post','file_loc','popular_post','categories','newest_post','two_newest_post'));
    }

    public function list_post(Posts $post){
    	$posts = $post->latest()->paginate(5);
    	$popular_post = $post->latest()->take(4)->get();
    	$file_loc = "public/uploads/posts/";
    	$categories = Category::all();
    	$newest_post = $post->latest()->take(1)->get();
    	$two_newest_post = Posts::latest()->skip(1)->take(2)->get();
    	return view('blog.list_post', compact('posts','file_loc','popular_post','categories','newest_post','two_newest_post'));
    }

    public function list_category(Category $category){
    	$posts = $category->posts()->latest()->paginate(5);
    	$popular_post = Posts::latest()->take(4)->get();
    	$file_loc = "public/uploads/posts/";
    	$categories = Category::all();
    	$newest_post = Posts::latest()->take(1)->get();
    	$two_newest_post = Posts::latest()->skip(1)->take(2)->get();
    	return view('blog.list_post', compact('posts','file_loc','popular_post','categories','newest_post','two_newest_post'));

    }

    public function search(request $request){
    	$posts = Posts::where('title', $request->keyword)->orWhere('title','like','%'.$request->keyword.'%')->paginate(5);
    	$popular_post = Posts::latest()->take(4)->get();
    	$file_loc = "public/uploads/posts/";
    	$categories = Category::all();
    	$newest_post = Posts::latest()->take(1)->get();
    	$two_newest_post = Posts::latest()->skip(1)->take(2)->get();
    	return view('blog.list_post', compact('posts','file_loc','popular_post','categories','newest_post','two_newest_post'));
    }
}
