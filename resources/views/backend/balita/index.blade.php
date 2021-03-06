@extends('backend.masterbackend')
@section('title', 'KADER | BALITA')


@section('backend')
    <br>
    <br>
    <h1 id="ftd">Table Data Balita</h1>
    <br>
    <div class="container-fluid">
        <a href="{{ route('halaman-dashboard') }}" class="btn btn-primary" style="border-radius: 5rem">Kembali Halaman
            Admin</a>
        <a href="{{ route('create-balita') }}" class="btn btn-warning" style="border-radius: 5rem">Tambah Data</a>
        <br><br>
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Table</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered ftd">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->umur }}</td>
                                <td>{{ $d->jenis_kelamin }}</td>
                                <td>{{ $d->tanggal_lahir }}</td>
                                <td>{{ $d->alamat }}</td>
                                <td>
                                    <a href="{{ route('edit-balita', $d->id) }}" class="btn btn-warning"
                                        style="border-radius: 5rem">EDIT</a>
                                    <form action="{{ route('delete-balita', $d->id) }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger"
                                            onclick="return confirm('ANDA YAKIN INGIN MENGHAPUS ?')"
                                            style="border-radius: 5rem">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
