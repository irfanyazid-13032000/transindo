<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Divisi;
use App\Models\Magang;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use TheSeer\Tokenizer\Exception;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('users.index', ['user' => $user]);
    }

    public function create()
    {
        $divisi = Divisi::all();
        return view('users.create', ['divisi' => $divisi]);
        
    }

    public function store(StoreUserRequest $request)
    {
        $rules = [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'divisi'=>$request->divisi
            
        ];
        $rules['password'] = bcrypt($rules['password']);
        User::create($rules);
        return redirect()->route('users.index')->with('success', 'Data berhasil ditambahkan');
        
    }
    
    public function show(user $user)
    {
        //
    }
    
    public function edit($iduser)
    {
        
        $divisi = Divisi::all();
        $data = User::findorfail($iduser);
        return view('users.edit', ['user' => $data, 'divisi' => $divisi]);
    }

    public function update(UpdateUserRequest $request, user $user, $id)
    {
        $user = User::findorfail($id);
        
            $user->update(
            [ 
                'name' => $request->name,
                'email' => $request->email,
                // 'password' => $request->password,
                'divisi' => $request->divisi,
               'status' => $request->status,

               
               $user->save($request->all())
            ]);
            if ($request->password!= $user->password) {
                $user['password'] ='required|string|min:6|confirmed';
            } else {
                $user['password'] ='required|string|min:6|confirmed';
            }
            //  dd($request);
            return redirect()->route('users.index')->with('success', 'Data berhasil diubah');
        
        // $old_data = $user->where('id', $id)->first();
        // $rules =
        //     [
        //         'nama' => 'required|string|max:255',
        //         // 'email' => 'required|string|max:255',
        //         // 'password' => 'required',
        //         'divisi' => 'required|string|max:255',
                
        //         // 'jenis_kelamin' => 'required|string|max:255',
        //         // 'jenjang_pendidikan' => 'required|max:255',
        //         'status' => 'required|string|max:255',
        //     ];


        // if ($request->email != $old_data->email) {
        //     $rules['email'] = 'required|email|unique:users,email|max:255';
        // } else {
        //     $rules['email'] = 'required|email|max:255';
        // }
        // if ($request->password!= $old_data->password) {
        //     $rules['password'] ='required|string|min:6|confirmed';
        // } else {
        //     $rules['password'] ='required|string|min:6|confirmed';
        // }
        
        // User::whereId($id)->update($request->validate($rules));

        // return redirect()->route('users.index')->with('success', 'Data berhasil diubah');
        
    }

    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Data berhasil dihapus');
    }

}
