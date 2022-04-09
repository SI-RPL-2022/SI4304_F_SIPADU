@extends('layouts.app')
@section('content')
<div class="container pt-5">
        @if (Session::has('alert'))
            <div class="alert alert-{{ Session::get('alert') }}" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="card border-0 pt-5 pb-3" style="border-radius: 35px;">
            <div class="card-body text-center">
                <h2 style="color: #170F49;"><b>Laporkan Keluhanmu</b></h2>
                <p class="text-primary-2 mt-3 w-50 mx-auto">
                    Menemukan Fasilitas Publik yang rusak?, Atau ingin Melaporkan Oknum?, Atau hanya sekadar ingin
                    memberi saran? Yuk isi sekarang
                </p>
                <div class="d-flex justify-content-around mt-5 px-3">
                    <a href="{{ url('lapor/keluhan/fasilitas-rusak') }}"
                        class="btn btn-primary-2 mx-2 shadow-btn py-4">Lapor Fasilitas Rusak</a>
                    <button class="btn btn-primary-2 mx-2 shadow-btn py-4">Lapor Oknum</button>
                    <button class="btn btn-primary-2 mx-2 shadow-btn py-4">Keluhan/Saran Terkait Fasilitas</button>
                </div>
            </div>
        </div>
    </div>
@endsection
