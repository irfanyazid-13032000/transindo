@extends('layouts.auth')
@section('title', 'Pemesanan Tiket')

@section('content')
    <form method="POST" action="{{ route('customer.pesan') }}" class="login100-form validate-form">
        @csrf
        <span class="login100-form-logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="90">
        </span>

        <span class="login100-form-title p-b-34 p-t-27">
            Pemesanan Tiket Coldplay 2023
        </span>

        
        <div class="wrap-input100 validate-input">
          <input class="input100" type="text" name="name" placeholder="Nama Anda">
          <span class="focus-input100" data-placeholder="&#xf191;"></span>
        </div>
        
       <div class="wrap-input100 validate-input" data-validate="Enter email">
          <input class="input100" type="text" name="email" placeholder="Email Anda">
          <span class="focus-input100" data-placeholder="&#xf207;"></span>
       </div>


        <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
                Pesan Sekarang
            </button>
        </div>

    </form>
@endsection
