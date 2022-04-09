@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="text-center">
            <h2 class="text-primary-2 mb-4"><b>Laporkan Fasilitas Yang Rusak</b></h2>
        </div>
        <form action="{{ route('lapor.keluhan.save') }}" method="post">
            @csrf
            {{-- TIPE FASILITAS RUSAK --}}
            <input type="hidden" name="tipe" value="1">
            <div class="card-register mx-auto">
                <div class="card shadow-sm border-0 pt-3 pb-3" style="border-radius: 35px;">
                    <div class="card-body text-center">
                        <div class="border-bottom mx-4 pb-3">
                            <img src="{{ asset('images/step-1.svg') }}" width="100%" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
