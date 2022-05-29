@extends('layouts.app')
@section('content')
    <div class="container pt-5">
        @if (Session::has('alert'))
            <div class="alert alert-{{ Session::get('alert') }}" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="text-center mb-4">
            <h2 style="color: #170F49;"><b>Infrastruktur {{ $fasilitas->name }} Kelurahan Mengger</b></h2>
        </div>
        <div class="row pb-2">
            <div class="col-md-6 p-0">
                <img width="100%" src="{{ asset('images/fasilitas' . "/$fasilitas->image") }}" alt="">
            </div>
            <div class="col-md-6 p-0">
                <div class="mapouter w-100">
                    <div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas"
                            src="{{ $fasilitas->maps }}" frameborder="0" scrolling="no" marginheight="0"
                            marginwidth="0"></iframe><a href="https://putlocker-is.org"></a><br>
                        <style>
                            .mapouter {
                                position: relative;
                                text-align: right;
                                /* height: 500px; */
                                width: 100%;
                            }

                            /*

                        </style><a href="https://www.embedgooglemap.net">embedded maps google</a> */
                        <style>
                            .gmap_canvas {
                                overflow: hidden;
                                background: none !important;
                                /* height: 500px; */
                                width: 100%;
                            }

                        </style>
                    </div>
                </div>
            </div>
        </div>

