@extends('layouts.app')
@section('content')
    <div class="container pb-5">
        <div class="card-register mx-auto">
            <div class="card ">
                <div class="card-body py-4">
                    <div class="py-3 text-center px-4">
                        <img src="{{ asset('images/success.svg') }}" class="my-3" alt="">
                        <h2 class="text-primary-2 mt-4 px-md-5">
                            {!! $message !!}
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
