@extends('layouts.app')

@section('content')
    <table id="users-table" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>ID Tiket</th>
                <th>Status</th>
                <th>Jam Pendaftaran</th>
                <th>Action</th>
                
            </tr>
        </thead>
    </table>
@endsection

@push('addon-script')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                serverSide: true,
                ajax: "{{ route('order.data') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'id_ticket', name: 'id_ticket' },
                    { data: 'status', name: 'status' },
                    { data: 'created_at', name: 'created_at' },
                    { 
                    data: 'halo',
                    name: 'halo',
                    render: function(data, type, row, meta) {
                        // Kustomisasi kolom tambahan di sini
                        return '<a href="customer/delete/' + row.id + '" class="btn btn-danger">Hapus</a> <a href="customer/edit/' + row.id + '" class="btn btn-primary">Ubah</a>';
                    }
                    },
                    
                ]
            });
        });
    </script>
@endpush

