<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('users.index', ['users' => $user]);
    }

    public function create()
    {
        $divisi = Divisi::all();
        return view('users.create', ['divisi' => $divisi]);
        
    }

    public function store(Request $request)
    {
        $rules = 
        [ 
            'name' => 'required|string|max:255',
            'email' =>'required|string|email|max:255|unique:users',
            'password' =>'required',
            'divisi' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ];

        User::create($request->validate($rules));
        return redirect()->route('users.index')->with('success', 'Data berhasil ditambahkan');
        
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        
        $divisi = Divisi::all();
        $data = User::findorfail($id);
        return view('dashboard.magang.edit', ['magang' => $data, 'divisi' => $divisi]);
    }

    public function update(Request $request, user $user)
    {
        $user = User::findorfail($user);
        if($request->input('password')){
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->password);
            $user->divisi = $request->input('divisi');
            $user->status = $request->input('status');
        } else {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->divisi = $request->input('divisi');
            $user->status = $request->input('status');
        }
        $user->update();
        return redirect()->route('users.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Data berhasil dihapus');
    }

}
