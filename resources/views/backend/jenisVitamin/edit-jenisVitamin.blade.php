@extends('backend.masterbackend')
@section('title', 'KADER | EDIT-JENIS VITAMIN')


@section('backend')
    <div class="container mt-3">
        <br>
        <h1 id="ftd">Edit Jenis Vitamin</h1>
        <br>
        <form action="{{ route('update-jenisVitamin', $jenisVitamin->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <input type="hidden" class="form-control" name="id" value="{{ $jenisVitamin->id }}">
            <div class="form-group">
                <label for="vitamin"><strong>Jenis Vitamin</strong></label>
                <input type="text" class="form-control" name="vitamin" value="{{ $jenisVitamin->vitamin }}">
                @error('vitamin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-success" type="submit"
                onclick="return confirm('Anda Yakin Sudah Benar ?')">Upload</button>
            <a href="{{ route('index-jenisVitamin') }}" class="btn btn-primary">Back</a>
        </form>
        <br>
    </div>
@endsection
