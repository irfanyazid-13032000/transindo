@extends('layouts.app')

@section('title', 'Edit Data Anggota users')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Internship / <a class="text-decoration-none text-muted fw-light"
                href="{{ route('users.index') }}">Data user</a> /</span> Edit Data user
    </h4>
    <div class="row">
        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Data user</h5>
                <div class="card-body">
                    <form action="{{ route('users.update', $users->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ old('nama', $users->nama) }}" required>
                            @error('nama')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', $users->email) }}" required>
                            @error('email')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                value="{{ old('password') }}">
                            <label>*) Jika Password tidak diganti, kosongkan saja.</label> 
                        </div>
                       
                        <div class="mb-3">
                            <label for="gender" class="form-label">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-select" aria-label="status" required>
                                <option value="male" {{ $users->gender == 'male' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="female" {{ $users->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
              
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" aria-label="status" required>
                                <option value="{{ $users->status }}">{{ $users->status }}</option>
                                <option value="{{ $users->status === 'Aktif' ? 'Nonaktif' : 'Aktif' }}">
                                    {{ $users->status === 'Aktif' ? 'Nonaktif' : 'Aktif' }}</option>
                            </select>
                            @error('status')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror




































































































































































































































































































































                            ++++++++++++++++
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{ route('users.index') }}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
