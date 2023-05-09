<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensi = Absensi::all();
        return view('dashboard.magang.absensi.index', ['absensi' => $absensi]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAbsensiRequest $request)
    {
        $data = [
            'tanggal' => now()->format('Y-m-d'),
            'nama' => auth()->user()->name,
            'email' => auth()->user()->email,
            'posisi' => auth()->user()->position,
            'jam_masuk' => now()->format('H:i:s'),
        ];
        $old_data = Absensi::where('tanggal', $data['tanggal'])->where('email', auth()->user()->email)->first();
        if ($old_data != null && auth()->user()->role === 'Intern') {
            return redirect()->route('absensi.show', auth()->user()->email)->with('error', 'Anda Sudah Mengisi Absensi Masuk Hari Ini');
        } else {
            Absensi::create($data);
            return redirect()->route('absensi.show', auth()->user()->email)->with('success', 'Absensi Masuk Berhasil Dicatat');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($email)
    {
        $data = Absensi::where('email', $email)->get();

        return view('dashboard.magang.absensi.show', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        return view('dashboard.magang.absensi.edit', ['absensi' => $absensi]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsensiRequest $request, Absensi $absensi)
    {
        $data = $request->validate(
            [
                'aktivitas' => 'required|string|max:255',
            ]
        );

        $data['tanggal'] = $absensi->tanggal;
        $data['nama'] = auth()->user()->name;
        $data['email'] = auth()->user()->email;
        $data['posisi'] = auth()->user()->position;
        $data['jam_masuk'] = $absensi->jam_masuk;
        $data['jam_keluar'] = now()->format('H:i:s');

        if (auth()->user()->role === 'Intern' && $absensi->jam_keluar != null) {
            return redirect()->route('absensi.show', auth()->user()->email)->with('error', 'Anda Sudah Mengisi Absensi Keluar Hari Ini');
        } else {
            $absensi->update($data);
            return redirect()->route('absensi.show', auth()->user()->email)->with('success', 'Absensi Keluar Berhasil Dicatat');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        //
    }
}
