@extends('layouts.app')
@section('content')
    <div class="container py-5">
        @if (Session::has('alert'))
            <div class="alert alert-{{ Session::get('alert') }}" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="d-flex justify-content-start">
            <h2 class="text-primary-2">
                <b>PROFIL PENGGUNA</b>
            </h2>
        </div>
        <div class="row">
            <div class="card py-5 border-0 shadow-sm">
                <form action="{{ route('profil.submit') }}" method="post">
                    @csrf
                    <div class="card-body px-md-5">
                        <div class="form-group mb-3">
                            <label class="text-primary-2" style="font-size: 1.4em">
                                <b>Username</b>
                            </label>
                            <input type="text" class="form-control border-0" readonly value="{{ Auth::user()->username }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-primary-2" style="font-size: 1.4em">
                                <b>Nama</b>
                            </label>
                            <input type="text" class="form-control border-0" readonly value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-primary-2" style="font-size: 1.4em">
                                <b>Email</b>
                            </label>
                            <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-primary-2" style="font-size: 1.4em">
                                <b>Alamat</b>
                            </label>
                            <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-primary-2" style="font-size: 1.4em">
                                <b>No. HP</b>
                            </label>
                            <input type="number" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-primary-2" style="font-size: 1.4em">
                                <b>Password</b>
                            </label>
                            <input type="password" class="form-control" name="password">
                            <small class="text-danger">Isi password jika ingin menggantinya.</small>
                        </div>
                        <div class="form-group mb-3">
                            <label class="text-primary-2" style="font-size: 1.4em">
                                <b>Konfirmasi Password</b>
                            </label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{ route('profil') }}" class="btn btn-warning-2 me-4">Kembali</a>
                            <button type="submit" class="btn btn-primary-2">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
