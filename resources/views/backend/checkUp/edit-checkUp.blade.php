@extends('backend.masterbackend')
@section('title', 'KADER | EDIT-CHECK UP')


@section('backend')
    <div class="container mt-3">
        <br>
        <h1 id="ftd">Edit Check Up</h1>
        <br>
        <form action="{{ route('update-checkUp', $checkUp->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <input type="hidden" class="form-control" name="id" value="{{ $checkUp->id }}">
            {{-- BALITA --}}
            <div class="form-group">
                <label for="id_balita"><strong>Nama Balita</strong></label>
                <select name="id_balita" id="id_balita" class="custom-select">
                    @foreach ($balita as $ds)
                        <option value="{{ $ds->id }}"
                            {{ old('id_balita') ?? $checkUp->id_balita == $ds->id ? 'selected' : '' }}>
                            {{ $ds->nama }}
                        </option>
                    @endforeach
                </select>
                @error('id_balita')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- BERAT BALITA --}}
            <div class="form-group">
                <label for="berat_balita"><strong>Berat Balita</strong></label>
                <input type="text" class="form-control" name="berat_balita" value="{{ $checkUp->berat_balita }}">
                @error('berat_balita')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- NAMA VITAMIN --}}
            <div class="form-group">
                <label for="nama_vitamin"><strong>Nama Vitamin</strong></label>
                <select name="nama_vitamin" id="nama_vitamin" class="custom-select">
                    @foreach ($jenisVitamin as $ds)
                        <option value="{{ $ds->id }}"
                            {{ old('nama_vitamin') ?? $checkUp->nama_vitamin == $ds->id ? 'selected' : '' }}>
                            {{ $ds->vitamin }}
                        </option>
                    @endforeach
                </select>
                @error('nama_vitamin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Imunisasi --}}
            <div class="form-group">
                <label for="nama_imunisasi"><strong>Nama Imunisasi</strong></label>
                <select name="nama_imunisasi" id="nama_imunisasi" class="custom-select">
                    @foreach ($jenisImunisasi as $ds)
                        <option value="{{ $ds->id }}"
                            {{ old('nama_imunisasi') ?? $checkUp->nama_imunisasi == $ds->id ? 'selected' : '' }}>
                            {{ $ds->imunisasi }}
                        </option>
                    @endforeach
                </select>
                @error('nama_imunisasi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- TANGGAL Imunisasi --}}
            <div class="form-group">
                <label for="tanggal_imunisasi"><strong>Tanggal Imunisasi</strong></label>
                <input type="date" class="form-control" name="tanggal_imunisasi"
                    value="{{ $checkUp->tanggal_imunisasi }}" style="width: 180px">
                @error('tanggal_imunisasi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-success" type="submit"
                onclick="return confirm('Anda Yakin Sudah Benar ?')">Upload</button>
            <a href="{{ route('index-checkUp') }}" class="btn btn-primary">Back</a>
        </form>
        <br>
    </div>
@endsection
