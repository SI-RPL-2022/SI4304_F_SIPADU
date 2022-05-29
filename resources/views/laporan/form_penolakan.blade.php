@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h2 class="text-primary-2">
                <b>ALASAN PENOLAKAN LAPORAN</b>
            </h2>
            <a href="#" class="text-primary-2"
                style="font-size: 1.3em; text-decoration: none; vertical-align: bottom;">Kembali</a>
        </div>
        <div class="row">
            <div class="card py-4">
                <form action="{{ route('lapor.verifikasi', ['id' => $id]) }}" id="formPenolakan" method="POST">
                    @csrf
                    <input type="hidden" name="lapor" value="tolak">
                    <div class="card-body">
                        <div class="py-4">
                            <h3 class="text-primary-2 ms-md-5">
                                <b>Alasan Penolakan</b>
                            </h3>
                        </div>
                        <div class="form-group mx-5 px-md-5">
                            <textarea id="alasan" name="alasan" cols="30" rows="10" class="form-control border-0" style="background-color: #F7F8FA"
                                required></textarea>
                        </div>
                        <div class="text-center my-3">
                            <button type="button" class="btn btn-danger-2 verifikasiButton">Tolak Laporan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')

