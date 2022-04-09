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
                work in progress
            </div>
        </div>
    </div>
@endsection
