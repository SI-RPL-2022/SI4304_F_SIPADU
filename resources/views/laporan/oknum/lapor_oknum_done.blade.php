@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="text-center">
            <h2 class="text-primary-2 mb-4"><b>Lapor Oknum Perusak Fasilitas</b></h2>
        </div>
        <div class="card-register mx-auto">

            <div class="card shadow-sm border-0 pt-3 pb-3" style="border-radius: 35px;">
                <div class="card-body text-center">
                    <div class="border-bottom mx-4 pb-3">
                        <img src="{{ asset('images/step-4-4.svg') }}" width="100%" alt="">
                    </div>
                    <div class="py-3 text-center px-4">
                        <img src="{{ asset('images/success.svg') }}" class="my-3" alt="">
                        <p class="text-primary-2 mt-4 px-md-5">
                            Laporan Berhasil Di Kirimkan
                            Nomor Laporan Anda Adalah <b>#{{ Session::get('noRef') }}</b>
                            Silahkan tunggu Update Laporannya di Menu Status Laporan Secara Berkala
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
