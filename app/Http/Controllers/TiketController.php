<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function customer()
    {
        return view('tiket.customer');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function dataOrder()
    {
        $tikets = Tiket::get();

     
        return DataTables::of($tikets)->toJson();
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
        $tiket = Tiket::find($id);
        $status = ['belum','sudah'];
        return view('tiket.edit',compact('tiket','status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tiket = Tiket::find($id);
        
        $tiket->name = $request->input('name');
        $tiket->email = $request->input('email');
        $tiket->id_ticket = $request->input('id_tiket');
        $tiket->status = $request->input('status');
        
        $tiket->save();
    
        return redirect('/order');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tiket = Tiket::find($id);
        $tiket->delete();

        return redirect('/order');
    }
}
