<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Category;
use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::paginate(10);
        $file_loc = "public/uploads/posts/";
        return view("admin.post.index", compact("posts", "file_loc"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tags::all();
        $category = Category::all();
        return view("admin.post.create", compact('category', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "title"=>"required",
            "category_id"=>"required",
            "content"=>"required",
            "image"=>"required",
        ]);

        $image = $request->image;
        $newImage = Time().$image->getClientOriginalName();

        $post = Posts::create([
            "title"=>$request->title,
            "category_id"=>$request->category_id,
            "content"=>$request->content,
            "image" => $newImage,
            "slug"=> Str::slug($request->title)
        ]);

        $post->tags()->attach($request->tags);

        $image->move('public/uploads/posts', $newImage);

        return redirect(route("post.index"))->with("message", "Posting berhasil ditambahkan!");
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Posts::findorfail($id)->delete();

        return redirect(route('post.index'))->with("message", "Post berhasil dihapus!");

    }
}
