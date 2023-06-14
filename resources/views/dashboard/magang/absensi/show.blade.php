@extends('layouts.app')
@section('title', 'Data Absensi')
@section('content')
    @if (session()->has('success'))
        <div class="bs-toast toast fade show bg-primary float-end" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bx bx-bell me-2"></i>
                <div class="me-auto fw-semibold">Notifikasi</div>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Internship /</span> Absensi Harian Lokpro Media</h4>
    <div class="d-flex justify-content-start mb-4 ms-1">
        <form action="{{ route('absensi.store') }}" method="POST">
            @csrf
            <button class="btn btn-primary" type="submit">Isi Absen Masuk</button>
        </form>
    </div>
    <div class="card">
        <div class="d-flex pe-4">
            <h5 class="card-header">Data Absensi Harian Kamu</h5>
            {{-- eport pff --}}
            @if (auth()->user()->role == 'HRD')
                <button type="button" class="btn btn-primary ms-auto align-self-center" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Export PDF
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Export</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Export Semua Data</label>
                                            <a href="{{ url('/ekspor-pdf') }}" target="_blank"
                                                class="btn btn-primary w-100">Export
                                                Semua</a>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Export Data 1 Bulan</label>
                                            <a href="{{ url('/ekspor-pdf/bulan') }}" target="_blank"
                                                class="btn btn-primary w-100">Export
                                                Bulan</a>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Export Data 7 Hari Terakhir</label>
                                            <a href="{{ url('/ekspor-pdf/minggu') }}" target="_blank"
                                                class="btn btn-primary w-100">Export
                                                Minggu</a>
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Export Data Hari Ini</label>
                                            <a href="{{ url('/ekspor-pdf/hari') }}" target="_blank"
                                                class="btn btn-primary w-100">Export
                                                Hari</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
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
                                        <a class="dropdown-item" href="{{ route('absensi.edit', $abs->id) }}"><i
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
