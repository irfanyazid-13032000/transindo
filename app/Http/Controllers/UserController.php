<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Divisi;
use App\Models\Role;
use App\Models\User;
use DB;

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

    public function getJumlahJenisKelamin()
    {
        $jumlahLakiLaki = User::where('jenis_kelamin', 'Laki-Laki')->count();
        $jumlahPerempuan = User::where('jenis_kelamin', 'Perempuan')->count();

        $data = [
            'labels' => ['Laki-Laki', 'Perempuan'],
            'data' => [$jumlahLakiLaki, $jumlahPerempuan],
            'hoverBackgroundColor' => ['#36A2EB', '#FF4081'],
            'hoverBorderColor' => ['#36A2EB', '#FF4081'],
        ];

        return response()->json($data);
    }

    public function jenjangPendidikan()
    {
        $labels = ['SMP', 'SMA', 'SMK', 'D3', 'S1', 'S2'];
        $data = [];

        foreach ($labels as $jenjang) {
            $count = User::where('jenjang_pendidikan', $jenjang)->count();
            $data[] = $count;
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data,
            'backgroundColor' => ['#00008B', '#708090', '#2F4F4F', '#000000', '#00BFFF', '#B0E0E6'],
        ]);
    }
}
