@extends('backend.masterbackend')
@section('title', 'KADER | EDIT-KADER')


@section('backend')
    <div class="container mt-3">
        <br>
        <h1 id="ftd">Edit Data Kader</h1>
        <br>
        <form action="{{route('update-kader', $kader->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <input type="hidden" class="form-control" name="id" value="{{ $kader->id }}">
            <div class="form-group">
                <label for="name"><strong>Name</strong></label>
                <input type="text" class="form-control" name="name" value="{{ $kader->name }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email"><strong>Email</strong></label>
                <input type="text" class="form-control" value="{{ $kader->email }}" disabled>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jenis_kelamin"><strong>Jenis Kelamin</strong></label>
                <input type="text" class="form-control" name="jenis_kelamin" value="{{ $kader->jenis_kelamin }}">
                @error('jenis_kelamin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jabatan"><strong>Jabatan</strong></label>
                <input type="text" class="form-control" name="jabatan" value="{{ $kader->jabatan }}">
                @error('jabatan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status"><strong>status</strong></label>
                <input type="text" class="form-control" name="status" value="{{ $kader->status }}">
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-success" type="submit"
                onclick="return confirm('Anda Yakin Sudah Benar ?')">Upload</button>
            <a href="{{ route('index-kader') }}" class="btn btn-primary">Back</a>
        </form>
        <br>
    </div>
@endsection
