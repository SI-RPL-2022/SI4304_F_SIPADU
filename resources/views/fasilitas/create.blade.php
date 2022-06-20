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
        <form action="{{ route('fasilitas.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="card p-4 border-0 shadow-sm", style="border-radius: 34px">
                <div class="card-body">
                    <div class="row">
                        <div class="row row-cols-md-2 row-cols-1">
                            <div class="col">
                                <div class="card-body h-100" style="border: 1.5px dashed #B5B5B5; border-radius: 25px">
                                    <div class="text-center my-5 py-5" style="vertical-align: center">
                                        <img src="{{ asset('images') }}/Vector.png" height="80px" width="80px"
                                            alt=""> <br>
                                        <h6 class="my-3 selectFile" style="cursor: pointer">
                                            <strong class="text-primary">Browse</strong> file here
                                        </h6>
                                    </div>
                                </div>
                                <input class="form-control d-none" name="file" type="file" id="formFile">
                            </div>
                            <div class="col">
                                <div class="py-3 text-start px-4">
                                    <div class="form-group mb-4">
                                        <label class="mb-2 ms-3"><b>Nama Fasilitas</b></label>
                                        <input type="text" name="nama"
                                            class="form-control py-2 px-3 rounded-pill border-0"
                                            style="box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);"
                                            placeholder="Tuliskan Nama Tempat/Fasilitas" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="mb-2 ms-3"><b>Keterangan</b></label>
                                        <input type="text" name="deskripsi"
                                            class="form-control py-2 px-3 rounded-pill border-0"
                                            style="box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);"
                                            placeholder="Tuliskan Keterangan" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="mb-2 ms-3"><b>Jam Operasional</b></label>
                                        <input type="text" name="buka"
                                            class="form-control py-2 px-3 rounded-pill border-0"
                                            style="box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);"
                                            placeholder="Tuliskan Jam Operasional" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="mb-2 ms-3"><b>Alamat</b></label>
                                        <textarea type="text" name="alamat" class="form-control py-2 px-3 border-0"
                                            style="box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);" placeholder="Masukkan alamat" rows="10" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="text-end mt-3 mb-5">
                <button class="btn btn-primary-2">Selanjutnya</button>
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
