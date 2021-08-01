@extends('backend.masterbackend')
@section('title', 'KADER')

    <style>
        .toggle-password {
            float: right;
            cursor: pointer;
            margin-left: 27rem;
            margin-top: -26px;
        }

    </style>

@section('backend')
    <br>
    <br>
    <h1 id="ftd">Data Profil Kader</h1>
    <br>
    <div class="container-fluid">
        <a href="{{ route('halaman-dashboard') }}" class="btn btn-primary" style="border-radius: 5rem">Kembali Halaman
            Admin</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalScrollable"
            style="border-radius: 5rem">
            Register
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if (session('message'))
                            <div class="alert alert-{{ session('style') }}" id="alert-notification">
                                <div class="row">
                                    <div class="col-md-11">
                                        <h5>{{ session('message') }}</h5>
                                    </div>
                                    <div class="col-md-1 text-right">
                                        <span id="close-notification">&times;</span>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form method="POST" action="{{ url('backend/users/store') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="name" class="text-md-right">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="email" class="">{{ __('E-Mail') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="ml-3">Status</label>
                                <div class="col-md-12">
                                    <select name="status" id="status"
                                        class="form-control @error('status') is-invalid @enderror">
                                        <option value="" selected disabled>-Select--</option>
                                        <option value="Staff">Staff</option>
                                        <option value="Jurnalis">Jurnalis</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="jenis_kelamin" class="">{{ __('Jenis Kelamin') }}</label>
                                    <input id="jenis_kelamin" type="text"
                                        class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                                        value="{{ old('jenis_kelamin') }}" required>
                                    @error('jenis_kelamin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="alamat" class="ml-3">alamat</label>
                                <div class="col-md-12">
                                    <textarea id="field" class="form-control @error('alamat') is-invalid @enderror"
                                        name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-10">
                                    <label for="password" class="text-md-right">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="" class="text-light">span</label>
                                    <a class="btn btn-info" onclick="lihatPass()"><i class="fa fa-eye"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-10">
                                    <label for="password-confirm"
                                        class="text-md-right">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="col-md-2">
                                    <label for="" class="text-light">span</label>
                                    <a class="btn btn-info" onclick="lihatConfirmPass()"><i class="fa fa-eye"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>

        {{-- Index Data --}}
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Table</strong>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table-export" class="table table-striped table-bordered ftd">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Jabatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->email }}</td>
                                <td>{{ $d->status != null ? $d->status : '-' }}</td>
                                <td>{{ $d->jabatan != null ? $d->jabatan : '-' }}</td>
                                <td>{{ $d->jenis_kelamin != null ? $d->jenis_kelamin : '-' }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script>
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            input = $(this).parent().find("input");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
@endsection
