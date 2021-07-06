@extends('backend.masterbackend')
@section('title', 'KADER | CREATE-BALITA')


@section('backend')
    <div class="container mt-3">
        <br>
        <h1 id="ftd">Create Balita</h1>
        <br>
        <form action="{{route('store-balita')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama"><strong>Nama</strong></label>
                <input type="text" class="form-control" name="nama">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="umur"><strong>Umur</strong></label>
                <input type="number" class="form-control" name="umur">
                @error('umur')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jenis_kelamin"><strong>Jenis Kelamin</strong></label>
                <input type="text" class="form-control" name="jenis_kelamin">
                @error('jenis_kelamin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_lahir"><strong>Tanggal lahir</strong></label>
                <input type="date" class="form-control" name="tanggal_lahir">
                @error('tanggal_lahir')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat"><strong>Alamat</strong></label>
                <input type="text" class="form-control" name="alamat">
                @error('alamat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success" type="submit"
                onclick="return confirm('Anda Yakin Sudah Benar ?')">Save</button>
            <a href="{{ route('index-balita') }}" class="btn btn-primary">Back</a>
        </form>
    </div>
@endsection
