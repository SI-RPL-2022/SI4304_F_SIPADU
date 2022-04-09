@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="text-center">
            <h2 class="text-primary-2 mb-4"><b>Laporkan Fasilitas Yang Rusak</b></h2>
        </div>
        <form action="#" method="post"
            enctype="multipart/form-data">
            @csrf
            {{-- TIPE FASILITAS RUSAK --}}
            <input type="hidden" name="tipe" value="1">
            <div class="card-register mx-auto">
                @if (Session::has('alert'))
                    <div class="alert alert-{{ Session::get('alert') }}" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
 
                <div class="card shadow-sm border-0 pt-3 pb-3" style="border-radius: 35px;">
                    <div class="card-body text-center">
                        <div class="border-bottom mx-4 pb-3">
                            <img src="{{ asset('images/step-2.svg') }}" width="100%" alt="">
                        </div>
                        <div class="py-3 text-center px-4">
                            <h3 class="text-primary-2">
                                <b>Silahkan Upload Evidence mengenai laporan anda</b>
                            </h3>
                           WIP
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button class="btn btn-primary-2">Selanjutnya</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $('.selectFile').on('click', function() {
            $('#formFile').trigger('click')
        })
    </script>
@endsection