@extends('layouts.app')
@section('content')
    <div id="intro">
        <div class="container mb-5">
            <div class="text-center">
                <h2 class="text-primary-2 mb-4"><b>{{ $title }}</b></h2>
                <img src="{{ asset('images') }}/saran.png" alt="">
                <div class="w-50 mx-auto text-center text-primary-2 mt-3">
                    <p>Anda memiliki keluhan ataupun saran terkait fasilitas publik yang ada di kelurahan Mengger?</p>
                    <p>Ayo aspirasikan Keluhan atau saranmu disini agar fasilitas di kelurahan Mengger bisa jadi lebih baik
                        lagi!</p>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button type="button" class="btn btn-primary-2 next-page">Selanjutnya</button>
                </div>
            </div>

        </div>
    </div>
    <div id="form-1" class="d-none">
        <div class="container mb-5">
            <div class="text-center">
                <h2 class="text-primary-2 mb-4"><b>{{ $title }}</b></h2>
            </div>
            <form action="{{ route('lapor.keluhan.save') }}" method="post">
                @csrf
                {{-- TIPE FASILITAS RUSAK --}}
                <input type="hidden" name="tipe" value="3">
                <div id="step-1" class="card-register mx-auto">
                    <div class="card shadow-sm border-0 pt-3 pb-3" style="border-radius: 35px;">
                        <div class="card-body text-center">
                            <div class="border-bottom mx-4 pb-3">
                                <img src="{{ asset('images/step-1.svg') }}" width="100%" alt="">
                            </div>
                            <div class="py-3 text-start px-4">
                                <div class="form-group mb-4">
                                    <label class="mb-2 ms-3"><b>Nama Tempat/Fasilitas</b></label>
                                    <input type="text" name="fasilitas" class="form-control py-2 px-3 rounded-pill border-0"
                                        style="box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);" placeholder="Detail fasilitas"
                                        required>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="mb-2 ms-3"><b>Lokasi</b></label>
                                    <input type="text" name="lokasi" class="form-control py-2 px-3 rounded-pill border-0"
                                        style="box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);"
                                        placeholder="Tuliskan Lokasinya" required>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="mb-2 ms-3"><b>Detail Saran</b></label>
                                    <textarea id="text" name="keluhan" cols="30" rows="10" class="form-control border-0" style="background-color: #F7F8FA"
                                        required></textarea>
                                </div>



                            </div>
                        </div>
                        </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button class="btn btn-primary-2 next-step">Selanjutnya</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $('.next-page').on('click', function() {
            $('#intro').addClass('d-none')
            $('#form-1').removeClass('d-none')
        })
    </script>
@endsection
