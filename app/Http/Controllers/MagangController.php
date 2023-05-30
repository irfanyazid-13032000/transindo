<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Magang;
use App\Http\Requests\StoreMagangRequest;
use App\Http\Requests\UpdateMagangRequest;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;


class MagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $magang = Magang::all();
        return view('dashboard.magang.index', ['magang' => $magang]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisi = Divisi::all();
        return view('dashboard.magang.create', ['divisi' => $divisi]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMagangRequest $request)
    {
        $rules = [
            'nama' => 'required|string|max:255',
            'divisi' => 'required|string|max:255',
            'email' => 'required|email|unique:magangs,email|max:255',
            'no_hp' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'jenjang_pendidikan' => 'required|max:255',
            'jurusan' => 'required|string|max:255',
            'universitas' => 'required|string|max:255',
            'surat_kontrak' => 'required',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date',
            'status' => 'required|string|max:255',
        ];

        if ($request->has('sertifikat')) {
            $rules['sertifikat'] = 'max:255';
        }

        Magang::create($request->validate($rules));
        return redirect()->route('intern.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Magang $magang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idmagang)
    {
        $divisi = Divisi::all();
        $data = Magang::findorfail($idmagang);
        return view('dashboard.magang.edit', ['magang' => $data, 'divisi' => $divisi]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMagangRequest $request, Magang $magang, $idmagang)
    {
        $old_data = $magang->where('id', $idmagang)->first();
        $rules =
            [
                'nama' => 'required|string|max:255',
                'divisi' => 'required|string|max:255',
                'no_hp' => 'required|string|max:255',
                'nim' => 'required|string|max:255',
                'jenjang_pendidikan' => 'required|max:255',
                'jurusan' => 'required|string|max:255',
                'universitas' => 'required|string|max:255',
                'surat_kontrak' => 'required',
                'tanggal_masuk' => 'required|date',
                'tanggal_keluar' => 'required|date',
                'status' => 'required|string|max:255',
            ];

        if ($request->has('sertifikat')) {
            $rules['sertifikat'] = 'max:255';
        }

        if ($request->email != $old_data->email) {
            $rules['email'] = 'required|email|unique:magangs,email|max:255';
        } else {
            $rules['email'] = 'required|email|max:255';
        }

        Magang::whereId($idmagang)->update($request->validate($rules));
        return redirect()->route('intern.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Magang $magang, $idmagang)
    {
        $magang->where('id', $idmagang)->delete();
        return redirect()->route('intern.index')->with('success', 'Data berhasil dihapus');
    }


}
