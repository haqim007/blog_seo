<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Category;
use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
            "slug"=> Str::slug($request->title),
            "users_id"=>Auth::id()
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
        $posts = Posts::findorfail($id);
        $tags = Tags::all();
        $category = Category::all();
        return view('admin.post.edit', compact("posts", "tags", "category"));
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
        $this->validate($request, [
            "title"=>"required",
            "category_id"=>"required",
            "content"=>"required",
        ]);


        $post = Posts::findorfail($id);


        $post_data = [
            "title"=>$request->title,
            "category_id"=>$request->category_id,
            "content"=>$request->content,
            "slug"=> Str::slug($request->title)
        ];

        if ($request->has('image')) {
            $image = $request->image;
            $newImage = Time().$image->getClientOriginalName();
            $image->move('public/uploads/posts', $newImage);
            $post_data['image'] = $newImage;
        }
        $post->tags()->sync($request->tags);
        $post->update($post_data);

        return redirect(route("post.index"))->with("message", "Posting berhasil diperbarui!");
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

        return redirect(route('post.index'))->with("message", "Post berhasil dihapus! (Silahkan periksa Trashed Post)");

    }

    public function trashed_post(){
        $posts = Posts::onlyTrashed()->paginate(10);
        $file_loc = "public/uploads/posts/";
        return view('admin.post.trashed_post', compact('posts','file_loc'));
    }

    public function restore($id){
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->restore();

        return redirect(route('post.trashed_post'))->with("message", "Post berhasil direstore! (Silahkan periksa Daftar Post)");
    }

    public function destroy_permanent($id){
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        return redirect(route('post.trashed_post'))->with("message", "Post berhasil terhapus secara permanent!");
    }
}
