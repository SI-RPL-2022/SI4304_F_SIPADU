@extends('layouts.app')
@section('content')
    <div id="intro">
        <div class="container mb-5">
            <div class="text-center">
                <h2 class="text-primary-2 mb-4"><b>{{ $title }}</b></h2>
                <img src="{{ asset('images') }}/saran.png" alt="">
                <div class="w-50 mx-auto text-center text-primary-2 mt-3">
                    <p>Anda memiliki keluhan ataupun saran terkait fasilitas publik yang ada di kelurahan Mengger?</p>
                    <p>Ayo aspirasikan Keluhan atau saranmu disini agar fasilitas di kelurahan Mengger bisa jadi lebih baik
                        lagi!</p>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button type="button" class="btn btn-primary-2 next-page">Selanjutnya</button>
                </div>
            </div>

        </div>
    </div>
