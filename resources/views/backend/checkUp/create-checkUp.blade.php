@extends('backend.masterbackend')
@section('title', 'KADER | CREATE-CHECK UP')


@section('backend')
    <div class="container mt-3">
        <br>
        <h1 id="ftd">Create Check Up</h1>
        <br>
        <form action="{{ route('store-checkUp') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Vitamin --}}
            <label for="nama_vitamin"><strong>Vitamin</strong></label>
            <select name="nama_vitamin" id="nama_vitamin" class="custom-select">
                <option value="">
                    -- Pilih Vitamin --
                </option>
                @foreach ($jenisVitamin as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->vitamin }}
                    </option>
                @endforeach
            </select>
            @error('nama_vitamin')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <br><br>
            {{-- Imunisasi --}}
            <label for="nama_imunisasi"><strong>Imunisasi</strong></label>
            <select name="nama_imunisasi" id="nama_imunisasi" class="custom-select">
                <option value="">
                    -- Pilih Imunisasi --
                </option>
                @foreach ($jenisImunisasi as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->imunisasi }}
                    </option>
                @endforeach
            </select>
            @error('nama_imunisasi')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <br><br>
            {{-- Balita --}}
            <label for="id_balita"><strong>Nama Balita</strong></label>
            <select name="id_balita" id="id_balita" class="custom-select">
                <option value="">
                    -- Pilih Nama Balita --
                </option>
                @foreach ($balita as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
            @error('id_balita')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <br><br>
            {{-- Berat Badan --}}
            <div class="form-group">
                <label for="berat_balita"><strong>Berat Badan</strong></label>
                <input type="text" class="form-control" name="berat_balita">
                @error('berat_balita')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- TANGGAL Imunisasi --}}
            <div class="form-group">
                <label for="tanggal_imunisasi"><strong>Tanggal Imunisasi</strong></label>
                <input type="date" class="form-control" name="tanggal_imunisasi">
                @error('tanggal_imunisasi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success" type="submit" onclick="return confirm('Anda Yakin Sudah Benar ?')">Save</button>
            <a href="{{ route('index-checkUp') }}" class="btn btn-primary">Back</a>
        </form>
    </div>
@endsection
