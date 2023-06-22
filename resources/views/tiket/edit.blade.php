@extends('layouts.app')

@section('title', 'Edit Tiket')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Internship / <a class="text-decoration-none text-muted fw-light"
                href="{{ route('order.customer') }}">Data user</a> /</span> Edit Data Tiket
    </h4>
    <div class="row">
        <!-- Form controls -->
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Edit Data Tiket</h5>
                <div class="card-body">
                    <form action="{{ route('customer.update', $tiket->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $tiket->name) }}" required>
                            @error('name')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', $tiket->email) }}" required>
                            @error('email')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="id_ticket" class="form-label">ID Tiket</label>
                            <input type="id_tiket" class="form-control" id="id_tiket" name="id_tiket"
                                value="{{ old('id_ticket', $tiket->id_ticket) }}" required readonly>
                            @error('id_ticket')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                       
                
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" aria-label="status" required>
                              @foreach ($status as $stat)
                              @if ($stat === $tiket->status )
                              <option value="{{ $tiket->status }}" selected>{{ $tiket->status }}</option>
                              @else
                              <option value="{{ $stat }}">{{ $stat }}</option>
                              @endif
                            
                              @endforeach
                                
                            </select>
                            @error('status')
                                <p style="color: rgb(253, 21, 21)">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{ route('order.customer') }}" class="btn btn-danger ms-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
