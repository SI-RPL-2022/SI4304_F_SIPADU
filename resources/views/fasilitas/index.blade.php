@extends('layouts.app')
@section('content')
    <div class="container pt-5">
        @if (Session::has('alert'))
            <div class="alert alert-{{ Session::get('alert') }}" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="text-center mb-4">
            <h2 style="color: #170F49;"><b>{{ $title }}</b></h2>
        </div>
        <div class="row">
            @foreach ($fasilitas as $item)
                <div class="col-md-4 p-0">
                    <div class="card p-0 w-auto border-0 card-fasilitas" style="background-color: transparent">
                        <div class="card-body p-0">
                            <img src="{{ asset('/fasilitas_file' . "/$item->image") }}" height="280" class="w-100"
                                alt="">
                        </div>
                        <div class="title-fasilitas" style="z-index: 9999">
                            <h3 class="text-primary-2 text-center">{{ $item->name }}</h3>
                            <div class="text-center">
                                <a href="{{ route('fasilitas.show', ['id' => $item->id]) }}"
                                    class="btn btn-warning-2">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
@section('script')
    <script type="text/javascript">
        // $('.card').css('background-color', 'transparent')
    </script>
@endsection
