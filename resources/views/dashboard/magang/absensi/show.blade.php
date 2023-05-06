@extends('layouts.app')
@section('title', 'Data Absensi')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Internship /</span> Data Absensi</h4>
    <div class="card">
        <h5 class="card-header">Data Absensi Intern Lokpro</h5>
        <div class="d-flex justify-content-start ms-4">
            <a href="{{ route('absensi.create') }}" class="btn btn-primary">Isi Absen</a>
        </div>
        <div class="table-responsive text-nowrap p-4">
            <table class="table table-hover" id="table">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Posisi</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Aktivitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($data as $abs)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $abs->tanggal }}</td>
                            <td>{{ $abs->nama }}</td>
                            <td>{{ $abs->posisi }}</td>
                            <td>{{ $abs->jam_masuk }}</td>
                            <td>{{ $abs->jam_keluar }}</td>
                            <td>{{ $abs->aktivitas }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('intern.edit', $abs->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Isi Absen Pulang</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="{{ url('https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css') }}">
@endpush

@push('addon-script')
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        let table = new DataTable('#table');
    </script>
@endpush
