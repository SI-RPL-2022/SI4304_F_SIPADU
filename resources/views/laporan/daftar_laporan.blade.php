@extends('layouts.app')
@php
use App\Models\Laporan;
@endphp
@section('content')
    <div class="container pb-5">
        <div class="row">
            <div class="col-md-3 col-12">
                <div class="form-group">
                    <label style="font-size: 1.5em;">Nomor Referensi</label>
                    <input type="text" id="noRefSearch" placeholder="Cari Nomor Referensi"
                        class="mt-2 form-control rounded-pill">
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="text-center">
                <h2 class="text-primary-2">
                    <b>DAFTAR LAPORAN</b>
                </h2>
            </div>
            <div class="card scrollbar scrollbar-custom" style="height: 600px;">
                <div class="card-body">
                    <div class="table-responsive scrollbar-custom">
                        <table class="table table-borderless">
                            <thead class="text-primary-2 text-center" style="font-size: larger;">
                                <tr>
                                    <th class="pb-4">No Referensi</th>
                                    <th class="pb-4">Deskripsi Laporan</th>
                                    <th class="pb-4">Waktu Laporan</th>
                                    <th class="pb-4 text-start ps-5">Status</th>
                                    <th class="pb-4">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-primary-2 body-laporan">
                                @foreach ($laporan as $index => $row)
                                    <tr id="{{ $row->no_referensi }}" class="row-laporan border-bottom">
                                        <td>{{ $row->no_referensi }}</td>
                                        <td>{{ $row->keluhan }}</td>
                                        <td>{{ $row->created_at }}</td>
                                        <td class="ps-5">
                                            {{ $row->file != null ? Laporan::STATUS[$row->status] : 'Menunggu Upload File' }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('lapor.show', ['id' => $row->id]) }}"
                                                class="btn btn-primary-2">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="border-bottom d-none data-null">
                                    <td colspan="5" class="text-center">
                                        Laporan Tidak Ditemukan!
                                    </td>
                                </tr>
                                @if (count($laporan) < 1)
                                    <tr class="border-bottom">
                                        <td colspan="5" class="text-center">
                                            Laporan Tidak Ditemukan!
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $("#noRefSearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            let data = $(".row-laporan").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
            // $('.data-null').addClass('d-none')
            // if (data.length < 1) {
            //     $('.data-null').removeClass('d-none')
            // }
        });
    </script>
@endsection
