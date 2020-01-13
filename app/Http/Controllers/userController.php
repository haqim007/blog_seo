<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user.index',compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.user.create");
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
            "name"=>"required:min:3|max:100",
            "email"=>"required|email",
            "type"=>"required",
            "password"=>"required",
        ]);

        $user = User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "type"=>$request->type,
            "password" => bcrypt($request->password)
        ]);

        return redirect(route("user.index"))->with("message", "User berhasil ditambahkan!");
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
        $user = User::findorfail($id);

        return view('admin.user.edit', compact('user'));
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
            "name"=>"required:min:3|max:100",
            "type"=>"required",
        ]);


        $user_data = [
            "name"=>$request->name,
            "type"=>$request->type,
        ];

        if ($request->input('password')) {
            $user_data['password'] = bcrypt($request->password);
        }
        $user = User::findorfail($id)->update($user_data);
        return redirect(route("user.index"))->with("message", "User berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id)->delete();

        return redirect(route('user.index'))->with("message", "User berhasil dihapus!");
    }
}
