@extends('backend.masterbackend')
@section('title', 'KADER')


@section('backend')
    <br>
    <br>
    <h1 id="ftd">Data Profil Kader</h1>
    <br>
    <div class="container-fluid">
        <a href="{{ route('halaman-dashboard') }}" class="btn btn-primary" style="border-radius: 5rem">Kembali Halaman
            Admin</a>
        <br>
        <br>

        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Table</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered ftd">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kader as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if (!$d->foto)
                                        <img src="{{ asset('assets/img/adminnn.png') }}" alt="No Foto"
                                            class="card-img-top" style="width: 100px">
                                    @else
                                        <img src="{{ Storage::url($d->foto) }}" alt="" class="card-img-top"
                                            style="width: 100px">
                                    @endif
                                </td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->email }}</td>
                                <td>{{ $d->status != null ? $d->status : '-' }}</td>
                                <td>{{ $d->jabatan != null ? $d->jabatan : '-' }}</td>
                                <td>{{ $d->jenis_kelamin != null ? $d->jenis_kelamin : '-' }}</td>
                                <td>
                                    <a href="{{ route('edit-kader', $d->id) }}" class="btn btn-warning"
                                        style="border-radius: 5rem">EDIT</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
