@extends('backend.masterbackend')
@section('title', 'KADER | CREATE-JENIS IMUNISASI')


@section('backend')
    <div class="container mt-3">
        <br>
        <h1 id="ftd">Create Jenis Imunisasi</h1>
        <br>
        <form action="{{route('store-jenisImunisasi')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="imunisasi"><strong>Jenis Imunisasi</strong></label>
                <input type="text" class="form-control" name="imunisasi">
                @error('imunisasi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-success" type="submit"
                onclick="return confirm('Anda Yakin Sudah Benar ?')">Save</button>
            <a href="{{route('index-jenisImunisasi')}}" class="btn btn-primary">Back</a>
        </form>
    </div>
@endsection
