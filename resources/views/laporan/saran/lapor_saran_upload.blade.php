@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="text-center">
            <h2 class="text-primary-2 mb-4"><b>Keluhan/Saran Terkait Fasilitas</b></h2>
        </div>
        <form action="{{ route('lapor.keluhan.upload.saran', ['id' => $laporan->id]) }}" method="post"
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
                            <div class="card border-0 rounded mt-3 p-3 "
                                style="box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                                <div class="row row-cols-3">
                                    <div class="col-2">
                                        <img src="{{ asset('images/upload.svg') }}" width="44px" height="36px" alt="">
                                    </div>
                                    <div class="col-6 text-start ps-0">
                                        <h6 class="text-nowrap mb-0 pb-0">Select a file or drag and drop here</h6>
                                        <span class="text-muted text-nowrap mt-0 pt-0" style="font-size: 12px;">JPG, PNG
                                            or MP4, file size no
                                            more than
                                            10MB</span>
                                    </div>
                                    <div class="col-4">
                                        <button type="button" class="btn btn-outline-info selectFile">SELECT FILE</button>
                                        <input class="form-control d-none" name="file" type="file" id="formFile">
                                    </div>
                                </div>
                            </div>
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
