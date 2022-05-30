@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card-register mx-auto">

            <div class="card shadow-sm border-0 pt-3 pb-3" style="border-radius: 35px;">
                <div class="card-body text-center">
                    {{-- <div class="border-bottom mx-4 pb-3">
                        <img src="{{ asset('images/step-3.svg') }}" width="100%" alt="">
                    </div> --}}
                    <div class="py-3 text-center px-4">
                        <img src="{{ asset('images/success.svg') }}" class="my-3" alt="">
                        <p class="text-primary-2 mt-4 px-md-5">
                            Laporan <b>#{{ Session::get('noRef') }}</b>Telah Berhasil Diinputkan
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
