<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function eksporPDF()
    {
        $absensi = Absensi::all();

        $data = [
            'absensi' => $absensi,
        ];

        $pdf = PDF::loadView('dashboard.magang.absensi.pdf', $data);

        return $pdf->download('data-absensi.pdf');
    }
}
