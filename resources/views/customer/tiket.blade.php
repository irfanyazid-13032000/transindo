@extends('layouts.auth')
@section('title', 'Pemesanan Tiket')

@section('content')
        

        <span class="login100-form-title p-b-34 p-t-27">
          ID Tiket Anda Adalah
        </span>


        <span class="login100-form-title p-b-34 p-t-27">
          {{ $generate_id_tiket }}
        </span>


        <div class="container-login100-form-btn">
            <button class="login100-form-btn" onclick="window.print()">
                Print
            </button>
        </div>



        
        

@endsection

