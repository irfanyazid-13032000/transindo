@extends('layouts.auth')
@section('title', 'Daftar')

@section('content')
    <form method="POST" action="{{ route('register-post') }}" class="login100-form validate-form">
        @csrf
        <span class="login100-form-logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo Lokpro" width="90">
        </span>

        <span class="login100-form-title p-b-34 p-t-27">
            Daftarkan Akun Anda
        </span>

        <div class="wrap-input100 validate-input" data-validate="Masukkan Nama dengan Benar!">
            <input class="input100" type="text" name="name" placeholder="Nama Anda" value="{{ old('name') }}">
            <span class="focus-input100" data-placeholder="&#xf207;"></span>
            @if ($errors->has('name'))
                <p class="text-danger">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div class="wrap-input100 validate-input" data-validate="Masukkan Email dengan Benar!">
            <input class="input100" type="email" name="email" placeholder="Email Anda" value="{{ old('email') }}">
            <span class="focus-input100" data-placeholder="&#xf207;"></span>
            @if ($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <div class="wrap-input100 validate-input" data-validate="Masukkan Password dengan Benar!">
            <input class="input100" type="password" name="password" placeholder="Password Anda">
            <span class="focus-input100" data-placeholder="&#xf191;"></span>
            @if ($errors->has('password'))
                <p class="text-danger">{{ $errors->first('password') }}</p>
            @endif
        </div>

        <div class="wrap-input100 validate-input" data-validate="Masukkan Password dengan Benar!">
            <input class="input100" type="password" name="password_confirmation" placeholder="Masukkan Ulang Password Anda">
            <span class="focus-input100" data-placeholder="&#xf191;"></span>
            @if ($errors->has('password_confirmation'))
                <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
            @endif
        </div>

        <div class="wrap-input100 validate-input" data-validate="Masukkan Posisi Anda dengan Benar!">
            <select name="position" class="input100 position" style="border: none; outline:none;">
                @foreach ($divisi as $div)
                    <option class="text-dark" value="{{ $div->nama }}">{{ $div->nama }}</option>
                @endforeach
            </select>
            <span class="focus-input100" data-placeholder="&#xf207;"></span>
            @if ($errors->has('position'))
                <p class="text-danger">{{ $errors->first('position') }}</p>
            @endif
        </div>

        <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
                Daftar
            </button>
        </div>

        <div class="text-center p-t-90 txt1">
            Sudah Punya Akun?
            <a class="txt1" href="{{ route('login') }}">Login Disini
            </a>
        </div>
    </form>
@endsection
