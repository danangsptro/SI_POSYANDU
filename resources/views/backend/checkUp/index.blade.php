@extends('backend.masterbackend')
@section('title', 'KADER | CHECK UP')


@section('backend')
    <br>
    <br>
    <h1 id="ftd">Table Check Up Balita</h1>
    <br>
    <div class="container-fluid">
        <a href="{{ route('halaman-dashboard') }}" class="btn btn-primary" style="border-radius: 5rem">Kembali Halaman
            Admin</a>
        <a href="{{ route('create-checkUp') }}" class="btn btn-warning" style="border-radius: 5rem">Tambah Data</a>
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
                            <th scope="col">Nama Balita</th>
                            <th scope="col">Berat Badan</th>
                            <th scope="col">Vitamin</th>
                            <th scope="col">Imunisasi</th>
                            <th scope="col">Tanggal Imunisasi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->idBalita->nama }}</td>
                                <td>{{ $d->berat_balita }}</td>
                                <td>{{ $d->idVitamin->vitamin }}</td>
                                <td>{{ $d->idImunisasi->imunisasi }}</td>
                                <td>{{ $d->tanggal_imunisasi }}</td>
                                <td>
                                    <a href="{{ route('edit-checkUp', $d->id) }}" class="btn btn-warning"
                                        style="border-radius: 5rem">EDIT</a>
                                    <form action="{{ route('delete-checkUp', $d->id) }}" class="d-inline" method="POST">
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
