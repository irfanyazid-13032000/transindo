<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customer.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function pesan(Request $request)
    {

      $generate_id_tiket = Str::random(15);

      $ticket = [
        'name' => $request->name,
        'email' => $request->email,
        'id_ticket' => $generate_id_tiket,
        'status' => 'belum'
      ];

      Tiket::create($ticket);

      return view('customer.tiket',compact('generate_id_tiket'));


    }

    public function cek()
    {
        return view('customer.tiket');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
