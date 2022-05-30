@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between">
            <h2 class="text-primary-2">
                <b>ALASAN PENOLAKAN LAPORAN</b>
            </h2>
            <a href="{{ route('lapor.show', ['id' => $id]) }}" class="text-primary-2"
                style="font-size: 1.3em; text-decoration: none; vertical-align: bottom;">Kembali</a>
        </div>
        <div class="row">
            <div class="card py-4">
                <form action="{{ route('lapor.verifikasi', ['id' => $id]) }}" id="formPenolakan" method="POST">
                    @csrf
                    <input type="hidden" name="lapor" value="tolak">
                    <div class="card-body">
                        <div class="py-4">
                            <h3 class="text-primary-2 ms-md-5">
                                <b>Alasan Penolakan</b>
                            </h3>
                        </div>
                        <div class="form-group mx-5 px-md-5">
                            <textarea id="alasan" name="alasan" cols="30" rows="10" class="form-control border-0" style="background-color: #F7F8FA"
                                required></textarea>
                        </div>
                        <div class="text-center my-3">
                            <button type="button" class="btn btn-danger-2 verifikasiButton">Tolak Laporan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $('.verifikasiButton').on('click', function() {
            let alasan = $('#alasan').val()
            if (alasan == '') {
                Swal.fire({
                    title: 'Warning',
                    text: "Harap isi alasan menolak!",
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                })

                return
            }

            let form = $('#formPenolakan')
            Swal.fire({
                title: 'Apa Anda Yakin?',
                text: "Laporan Akan Ditolak!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Tolak',
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
    </script>
@endsection
