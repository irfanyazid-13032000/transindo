@extends('layouts.app')
@section('title', 'Data Absensi')
@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Internship /</span> Data Absensi</h4>
    <div class="card">
        <div class="d-flex pe-4">
            <h5 class="card-header">Data Absensi Intern Lokpro</h5>
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
                        <th>Waktu Dibuat</th>
                        <th>Waktu Diperbarui</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($absensi as $abs)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $abs->tanggal }}</td>
                            <td>{{ $abs->nama }}</td>
                            <td>{{ $abs->posisi }}</td>
                            <td>{{ $abs->jam_masuk }}</td>
                            <td>{{ $abs->jam_keluar }}</td>
                            <td>{{ $abs->aktivitas }}</td>
                            <td>{{ $abs->created_at }}</td>
                            <td>{{ $abs->update_at }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('intern.edit', $abs->id) }}"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <form action="{{ route('intern.destroy', $abs->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i>
                                                Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="10">Data Kosong</td>
                        </tr>
                    @endforelse
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
