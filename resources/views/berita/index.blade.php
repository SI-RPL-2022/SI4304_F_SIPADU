@extends('layouts.app')
@section('content')
    <div class="container pt-5">
        @if (Session::has('alert'))
            <div class="alert alert-{{ Session::get('alert') }}" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="pb-4 mt-3">
            <div class="container pb-5">
                <div class="d-flex justify-content-between">
                    <h3 class="text-primary-2 title-news">
                        <i>Berita Terbaru</i>
                    </h3>
                    @if (Auth::user()->role == 'superadmin')
                        <div class="">
                            <img src="{{ asset('images') }}/plusss.png" class="d-inline-block" alt="">
                            <a href="{{ route('berita.create') }}" class="d-inline-block" style="text-decoration: none">
                                <h6>
                                    &nbsp; Tambah Berita
                                </h6>
                            </a>
                        </div>
                    @endif
                </div>
                <div class="my-5">
                    <div class="row row-cols-md-4 row-cols-2">
                        @foreach ($berita as $item)
                            <div class="col">
                                <div class="card mx-2" style="width: 250px; cursor: pointer"
                                    onclick="window.location.href = 'berita/{{ $item->id }}'">
                                    <img src="{{ asset('berita_file') }}/{{ $item->image }}" height="180px"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->judul }}</h5>
                                        <p class="card-text">{{ substr($item->deskripsi, 0, 50) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script type="text/javascript">
        // $('.card').css('background-color', 'transparent')
    </script>
@endsection
