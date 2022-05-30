@extends('layouts.app')
@section('content')
    <div class="container pb-5">
        <div class="d-flex justify-content-between">
            <h2 class="text-primary-2">
                <b>DETAIL LAPORAN</b>
            </h2>
            <a href="{{ route('lapor.list') }}" class="text-primary-2"
                style="font-size: 1.3em; text-decoration: none; vertical-align: bottom;">Kembali</a>
        </div>
        <div class="row">
            <div class="card py-4">
                <form action="{{ route('input.laporan.store', ['id' => $laporan->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="table-responsive scrollbar-custom">
                            <table class="table table-borderless">
                                <tr class="text-primary-2 text-start" style="vertical-align: bottom;">
                                    <th width="200px">
                                        <h4 class="pb-0 mb-0">
                                            <b>Nomor Laporan</b>
                                        </h4>
                                    </th>
                                    <th width="10px"><b>:</b></th>
                                    <td>
                                        {{ $laporan->no_referensi }}
                                    </td>
                                </tr>
                                <tr class="text-primary-2 text-start" style="vertical-align: bottom;">
                                    <th width="200px">
                                        <h4 class="pb-0 mb-0">
                                            <b>Status Laporan</b>
                                        </h4>
                                    </th>
                                    <th width="10px"><b>:</b></th>
                                    <td>
                                        Selesai
                                    </td>
                                </tr>
                                <tr class="text-primary-2 text-start" style="vertical-align: bottom;">
                                    <th width="200px">
                                        <h4 class="pb-0 mb-0">
                                            <b>Detail Keluhan</b>
                                        </h4>
                                    </th>
                                    <th width="10px"><b>:</b></th>
                                    <td>
                                        {{ $laporan->keluhan }}
                                    </td>
                                </tr>
                                <tr class="text-primary-2 text-start" style="vertical-align: bottom;">
                                    <th width="200px">
                                        <h4 class="pb-0 mb-0">
                                            <b>Nama Petugas</b>
                                        </h4>
                                    </th>
                                    <th width="10px"><b>:</b></th>
                                    <td>
                                        {{ Auth::user()->name }}
                                    </td>
                                </tr>
                                <tr class="text-primary-2 text-start" style="vertical-align: bottom;">
                                    <th width="200px" style="vertical-align: top">
                                        <h4 class="pb-0 mb-0">
                                            <b>Metode Penanganan</b>
                                        </h4>
                                    </th>
                                    <th width="10px" style="vertical-align: top"><b>:</b></th>
                                    <td>
                                        <div class="form-group mb-4">
                                            <textarea id="metode" name="metode" cols="30" rows="10" class="form-control border-0" style="background-color: #F7F8FA"
                                                required></textarea>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="text-primary-2 text-start" style="vertical-align: top;">
                                    <th width="200px">
                                        <h4 class="pb-0 mb-0">
                                            <b>Bukti Laporan</b>
                                        </h4>
                                    </th>
                                    <th width="10px"><b>:</b></th>
                                    <td>
                                        <div class="card border-0 rounded mt-3 p-3 w-50"
                                            style="box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                                            <div class="row row-cols-3">
                                                <div class="col-2">
                                                    <img src="{{ asset('images/upload.svg') }}" width="44px" height="36px"
                                                        alt="">
                                                </div>
                                                <div class="col-6 text-start ps-0">
                                                    <h6 class="text-nowrap mb-0 pb-0">Select a file or drag and drop here
                                                    </h6>
                                                    <span class="text-muted text-nowrap mt-0 pt-0"
                                                        style="font-size: 12px;">JPG,
                                                        PNG
                                                        or MP4, file size no
                                                        more than
                                                        10MB</span>
                                                </div>
                                                <div class="col-4">
                                                    <button type="button" class="btn btn-outline-info selectFile">SELECT
                                                        FILE</button>
                                                    <input class="form-control d-none" name="file" type="file"
                                                        id="formFile">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary-2 me-3">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $('.selectFile').on('click', function() {
            $('#formFile').trigger('click')
        })
    </script>
@endsection
