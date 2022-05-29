@extends('layouts.app')
@section('content')
    <div id="intro">
        <div class="container mb-5">
            <div class="text-center">
                <h2 class="text-primary-2 mb-4"><b>{{ $title }}</b></h2>
                <img src="{{ asset('images') }}/oknum.png" alt="">
                <div class="w-50 mx-auto text-center text-primary-2">
                    <p>Anda melihat oknum yang dengan sengaja merusak fasilitas umum di daerah kelurahan mengger?, Ayo
                        Laporkan
                        segera untuk kami tindak!.</p>
                    <p>
                        Jangan Khawatir karena semua laporan akan tersubmit secara anonymous jadi kerahasiaan anda akan
                        tetap
                        terjaga.</p>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button type="button" class="btn btn-primary-2 next-page">Selanjutnya</button>
                </div>
            </div>

        </div>
    </div>
