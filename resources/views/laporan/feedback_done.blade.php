@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="text-center">
            <h2 class="text-primary-2 mb-4"><b>BERHASIL</b></h2>
        </div>
        <div class="card-register mx-auto">

            <div class="card shadow-sm border-0 pt-3 pb-3" style="border-radius: 35px;">
                <div class="card-body text-center">
                    <div class="py-5 text-center px-4">
                        <img src="{{ asset('images/success.svg') }}" class="my-3" alt="">
                        <p class="text-primary-2 mt-4 px-md-5">
                            Feedback Berhasil Dikirimkan
                        </p>
                    </div>

                    <a href="{{ url('home') }}" class="btn btn-warning-2 me-3">Home</a>
                </div>
            </div>
        </div>
    </div>
@endsection
