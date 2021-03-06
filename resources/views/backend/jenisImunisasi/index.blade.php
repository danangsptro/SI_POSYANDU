@extends('backend.masterbackend')
@section('title', 'KADER | BALITA')


@section('backend')
    <br>
    <br>
    <h1 id="ftd">Table Jenis Imunisasi</h1>
    <br>
    <div class="container-fluid">
        <a href="{{ route('halaman-dashboard') }}" class="btn btn-primary" style="border-radius: 5rem">Kembali Halaman
            Admin</a>
        <a href="{{ route('create-jenisImunisasi') }}" class="btn btn-warning" style="border-radius: 5rem">Tambah Data</a>
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
                            <th scope="col">Jenis Imunisasi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->imunisasi }}</td>
                                <td>
                                    <a href="{{ route('edit-jenisImunisasi', $d->id) }}" class="btn btn-warning"
                                        style="border-radius: 5rem">EDIT</a>
                                    <form action="{{ route('delete-imunisasi', $d->id) }}" class="d-inline" method="POST">
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
