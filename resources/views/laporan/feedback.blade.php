@extends('layouts.app')
@section('content')
    <div class="container pb-5">
        <div class="d-flex justify-content-between">
            <h2 class="text-primary-2">
                <b>{{ $title }}</b>
            </h2>
            <a href="{{ route('lapor.list') }}" class="text-primary-2"
                style="font-size: 1.3em; text-decoration: none; vertical-align: bottom;">Kembali</a>
        </div>
        <div class="row">
            <div class="card py-4">
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
                                        <b>Nama Fasilitas</b>
                                    </h4>
                                </th>
                                <th width="10px"><b>:</b></th>
                                <td>
                                    {{ $laporan->fasilitas }}
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
                                    {{ $laporan->Petugas->User->name }}
                                </td>
                            </tr>
                            <tr class="text-primary-2 text-start" style="vertical-align: bottom;">
                                <th width="200px">
                                    <h4 class="pb-0 mb-0">
                                        <b>Metode Penanganan</b>
                                    </h4>
                                </th>
                                <th width="10px"><b>:</b></th>
                                <td>
                                    {{ $laporan->Petugas->metode }}
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
                                    @if ($laporan->Petugas->image == null)
                                        @if ($laporan->tipe == 1)
                                            <a href="{{ route('lapor.keluhan.upload.fasilitas.rusak', ['id' => $laporan->id]) }}"
                                                class="btn btn-warning-2">Upload File</a>
                                        @endif
                                    @else
                                        @if (Str::contains($laporan->Petugas->image, 'mp4'))
                                            <video width="75%" height="auto" controls>
                                                <source src="{{ asset('keluhan') . '/' . $laporan->Petugas->image }}"
                                                    type="video/mp4">
                                                <source src="movie.ogg" type="video/ogg">
                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            <img src="{{ asset('keluhan') . '/' . $laporan->Petugas->image }}" width="75%"
                                                alt="">
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div id="form-feedback" class="card pt-3 pb-3 mt-3">
                <form action="{{ route('feedback.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="id_laporan" value="{{ $laporan->id }}">
                    <div class="card-body text-center">
                        <div class="py-3 text-start px-4">
                            <div class="form-group mb-4">
                                <label class="mb-2 ms-3"><b>Feedback</b></label>
                                <input type="text" name="feedback" class="form-control py-2 px-3 rounded-pill border-0"
                                    style="box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);" placeholder="Tuliskan Feedbacknya"
                                    required>
                            </div>
                            <div class="form-group mb-4">
                                <label class="mb-2 ms-3"><b>Pesan / Kesan / Saran</b><span
                                        class="text-danger">*</span></label>
                                <input type="text" name="pesan" class="form-control py-2 px-3 rounded-pill border-0"
                                    style="box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);"
                                    placeholder="Tuliskan Pesan / Kesan / Saran" required>
                            </div>
                        </div>
                        <button class="btn btn-primary-2 me-3">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <form id="verifikasiForm" action="{{ route('lapor.verifikasi', ['id' => $laporan->id]) }}" class="d-none"
        method="POST">
        @csrf
    </form>
@endsection
@section('script')
    <script type="text/javascript">
        $('.feedbackButton').on('click', function() {
            let status = $(this).attr('data-status')

            if (status == 'false') {
                $('#form-feedback').removeClass('d-none')
                $(this).attr('data-status', 'true')
            } else {
                $('#form-feedback').addClass('d-none')
                $(this).attr('data-status', 'false')
            }
        })

        $('.verifikasiButton').on('click', function() {
            let form = $('#verifikasiForm')
            form.append('<input type="hidden" name="lapor" value="assign_petugas" />')
            Swal.fire({
                title: 'Apa Anda Yakin?',
                text: "Laporan Akan Diverifikasi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Verifikasi',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'info',
                        title: 'Tunggu Sebentar...',
                        html: 'Sedang memproses laporan...',
                        didOpen: () => {
                            Swal.showLoading()
                        }
                    })
                    form.submit()
                }
            })
        })

        $('.tolakButton').on('click', function() {
            let form = $('#verifikasiForm')
            form.append('<input type="hidden" name="lapor" value="tolak" />')
            Swal.fire({
                icon: 'info',
                title: 'Tunggu Sebentar...',
                html: 'Sedang memproses laporan...',
                didOpen: () => {
                    Swal.showLoading()
                }
            })
            form.submit()
        })
    </script>
@endsection
