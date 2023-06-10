<?php

namespace App\Http\Controllers;

use App\Models\Magang;
use App\Models\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Dashboard;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {


      
        //     return view('dashboard.index', compact('jenis_kelamin', 'jenjang_pendidikan'));


    }

    public function showChart()
{
    $user = Magang::all();

    // Hitung jumlah pengguna berdasarkan jenis kelamin
    $laki_laki = $user->where('jenis_kelamin', 'laki_laki')->count();
    $perempuan = $user->where('jenis_kelamin', 'perempuan')->count();

    // Hitung jumlah pengguna berdasarkan jenjang pendidikan
    $smkCount = $user->where('jenjang_pendidikan', 'SMK')->count();
    $d3Count = $user->where('jenjang_pendidikan', 'D3')->count();
    $s1Count = $user->where('jenjang_pendidikan', 'S1')->count();

    return view('dashboard.index', compact('laki_laki', 'perempuan', 'smkCount', 'd3Count', 's1Count'));

    // return view('dashboard.index', compact('laki_laki', 'perempuan', 'smkCount', 'd3Count', 's1Count'));
}

}