@extends('frontend.masterFrontend')
@section('title', 'Data Imunisasi')

@section('frontend')

    <div class="container data-karyawan">
        <h1>Data Sudah Imunisasi</h1>
        <hr><br>
    </div>
    <div class="card container">
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered ftd"
                style="text-align: center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Balita</th>
                        <th scope="col">Berat Badan</th>
                        <th scope="col">Vitamin</th>
                        <th scope="col">Imunisasi</th>
                        <th scope="col">Status Gizi</th>
                        <th scope="col">Tanggal Sudah Imunisasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($checkUp as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->idBalita->nama }}</td>
                            <td>{{ $d->berat_balita }}</td>
                            <td>{{ $d->idVitamin->vitamin }}</td>
                            <td>{{ $d->idImunisasi->imunisasi }}</td>
                            <td>{{ $d->status_gizi }}</td>
                            <td>{{ $d->tanggal_imunisasi }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
