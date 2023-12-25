<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Menampilkan User
        $users = \App\Models\User::paginate(10);

        return view('users.index', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Membuat user
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Menyimpan user ke database
        switch ($request->input('action')) {
            case 'cancel':
                return redirect()->route("users.index");
    
            case 'save':
                $validation = \Validator::make($request->all(),[
                    "name" => "required|min:2|max:50|unique:users",
                    "level" => "required",
                    "email" => "required|email|unique:users",
                    "password" => "required",
                    "password_confirmation" => "required|same:password"
                  ])->validate();
                // Store the data to database
                $new_user = new \App\Models\User;
                $new_user-> name= $request->get('name');
                $new_user-> email= $request->get('email');
                $new_user-> password= \Hash::make($request->get('password'));
                $new_user-> level= $request->get('level');
                
                $new_user->save();
                return redirect()->route('users.index')->with('status', 'User Berhasil Ditambahkan');
        }

        
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
        // Menampilkan laman edit
        $user = \App\Models\User::findOrFail($id);

        return view('users.edit', ['user' => $user]);
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
        // Update user
        switch ($request->input('action')) {
            case 'cancel':
                return redirect()->route("users.index");
    
            case 'save':
                \Validator::make($request->all(), [
                    "name" => "required|min:5|max:100",
                    "level" => "required",
                    
                ])->validate();
        
                $user = \App\Models\User::findOrFail($id);
        
                $user->name = $request->get('name');
                $user->level = $request->get('level');
                
                $user->save();
        
                return redirect()->route('users.index', [$id])->with('status', 'User succesfully updated');
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete user
        $user = \App\Models\User::findOrFail($id);

        $user->delete();

        return redirect()->route('users.index')->with('status', 'User successfully delete');
    }
}
