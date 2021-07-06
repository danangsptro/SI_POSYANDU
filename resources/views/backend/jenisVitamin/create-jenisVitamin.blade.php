@extends('backend.masterbackend')
@section('title', 'KADER | CREATE-JENIS VITAMIN')


@section('backend')
    <div class="container mt-3">
        <br>
        <h1 id="ftd">Create Jenis Vitamin</h1>
        <br>
        <form action="{{route('store-jenisVitamin')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="vitamin"><strong>Jenis Vitamin</strong></label>
                <input type="text" class="form-control" name="vitamin">
                @error('vitamin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-success" type="submit"
                onclick="return confirm('Anda Yakin Sudah Benar ?')">Save</button>
            <a href="{{route('index-jenisVitamin')}}" class="btn btn-primary">Back</a>
        </form>
    </div>
@endsection
