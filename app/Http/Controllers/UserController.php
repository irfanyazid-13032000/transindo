<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Divisi;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('users.index', ['user' => $user]);
    }

    public function create()
    {
        // 

    }

    public function store(StoreUserRequest $request)
    {
        // 
    }

    public function show(user $user)
    {
        //
    }

    public function edit($iduser)
    {

        $role = Role::all();
        $divisi = Divisi::all();
        $data = User::findorfail($iduser);
        return view('users.edit', ['user' => $data, 'role' => $role, 'divisi' => $divisi]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user = User::findorfail($request->iduser);

        $user->update(
            [
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role,
            'divisi_id' => $request->divisi,
            'status' => $request->status,
            ]
        );
         $user->save($request->all());
        
        return redirect()->route('users.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Data berhasil dihapus');
    }

}
