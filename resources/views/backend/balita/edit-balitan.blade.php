@extends('backend.masterbackend')
@section('title', 'KADER | EDIT-KADER')


@section('backend')
    <div class="container mt-3">
        <br>
        <h1 id="ftd">Edit Balita</h1>
        <br>
        <form action="{{ route('update-balita', $balita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <input type="hidden" class="form-control" name="id" value="{{ $balita->id }}">
            <div class="form-group">
                <label for="nama"><strong>Nama</strong></label>
                <input type="text" class="form-control" name="nama" value="{{ $balita->nama }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="umur"><strong>Umur</strong></label>
                <input type="number" class="form-control" name="umur" value="{{ $balita->umur }}">
                @error('umur')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jenis_kelamin"><strong>Jenis Kelamin</strong></label>
                <input type="text" class="form-control" name="jenis_kelamin" value="{{ $balita->jenis_kelamin }}">
                @error('jenis_kelamin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_lahir"><strong>Tanggal Lahir</strong></label>
                <input type="date" class="form-control" name="tanggal_lahir" value="{{ $balita->tanggal_lahir }}">
                @error('tanggal_lahir')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="alamat"><strong>alamat</strong></label>
                <input type="text" class="form-control" name="alamat" value="{{ $balita->alamat }}">
                @error('alamat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success" type="submit"
                onclick="return confirm('Anda Yakin Sudah Benar ?')">Upload</button>
            <a href="{{ route('index-balita') }}" class="btn btn-primary">Back</a>
        </form>
        <br>
    </div>
@endsection
