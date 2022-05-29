@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row mb-5">

            <form action="{{ route('lapor.verifikasi', ['id' => $id]) }}" id="formPenolakan" method="POST">
                @csrf
                <input type="hidden" name="lapor" value="verifikasi">
                <div class="card-register mx-auto">
                    <div class="d-flex justify-content-between">
                        <h2 class="text-primary-2">
                            <b>ASSIGN PETUGAS</b>
                        </h2>
                        {{-- <a href="#" class="text-primary-2"
                            style="font-size: 1.3em; text-decoration: none; vertical-align: bottom;">Kembali</a> --}}
                    </div>
                    <div class="card shadow-sm border-0 pt-3 pb-3" style="border-radius: 35px;">
                        <div class="card-body text-center">
                            <div class="py-3 text-start px-4">
                                <div class="form-group mb-4">
                                    <label class="mb-2 ms-3"><b>Pilih Petugas</b></label>
                                    <select name="petugas" id="petugas" class="form-control py-2 px-3 rounded-pill border-0"
                                        style="box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);" required>
                                        <option value="">Pilih Petugas</option>
                                        @foreach ($petugas as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="mb-2 ms-3"><b>Deskripsi</b></label>
                                    <textarea type="text" name="description" class="form-control py-2 px-3 border-0"
                                        style="box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);" placeholder="Deskripsi"
                                        rows="10" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-primary-2 verifikasiButton" type="button">Verifikasi</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $('.verifikasiButton').on('click', function() {
            let description = $('#description').val()
            let petugas = $('#petugas').val()
            if (description == '' || petugas == '') {
                Swal.fire({
                    title: 'Warning',
                    text: "Harap isi data dengan lengkap!",
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                })

                return
            }

            let form = $('#formPenolakan')
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
    </script>
@endsection
