@extends('backend.masterbackend')
@section('title', 'KADER | EDIT-KADER')


@section('backend')
    <div class="container mt-3">
        <br>
        <h1 id="ftd">Edit Jenis Imunisasi</h1>
        <br>
        <form action="{{ route('update-jenisImunisasi', $jenis_imunisasi->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('POST')
            <input type="hidden" class="form-control" name="id" value="{{ $jenis_imunisasi->id }}">
            <div class="form-group">
                <label for="imunisasi"><strong>Jenis Imunisasi</strong></label>
                <input type="text" class="form-control" name="imunisasi" value="{{ $jenis_imunisasi->imunisasi }}">
                @error('imunisasi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-success" type="submit"
                onclick="return confirm('Anda Yakin Sudah Benar ?')">Upload</button>
            <a href="{{ route('index-jenisImunisasi') }}" class="btn btn-primary">Back</a>
        </form>
        <br>
    </div>
@endsection
