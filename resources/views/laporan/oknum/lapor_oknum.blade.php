@extends('layouts.app')
@section('content')
    <div id="intro">
        <div class="container mb-5">
            <div class="text-center">
                <h2 class="text-primary-2 mb-4"><b>{{ $title }}</b></h2>
                <img src="{{ asset('images') }}/oknum.png" alt="">
                <div class="w-50 mx-auto text-center text-primary-2">
                    <p>Anda melihat oknum yang dengan sengaja merusak fasilitas umum di daerah kelurahan mengger?, Ayo
                        Laporkan
                        segera untuk kami tindak!.</p>
                    <p>
                        Jangan Khawatir karena semua laporan akan tersubmit secara anonymous jadi kerahasiaan anda akan
                        tetap
                        terjaga.</p>
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
                <input type="hidden" name="tipe" value="2">
                <div id="step-1" class="card-register mx-auto">
                    <div class="card shadow-sm border-0 pt-3 pb-3" style="border-radius: 35px;">
                        <div class="card-body text-center">
                            <div class="border-bottom mx-4 pb-3">
                                <img src="{{ asset('images/step-1-4.svg') }}" width="100%" alt="">
                            </div>
                            <div class="py-3 text-start px-4">
                                <div class="form-group mb-4">
                                <label class="mb-2 ms-3"><b>Pilih Fasilitas</b></label>
                                <select name="fasilitas" id="fasilitas" class="form-control py-2 px-3 rounded-pill border-0"
                                    style="box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);" required>
                                    <option value="">Pilih Fasilitas</option>
                                    @foreach($fasilitas as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="mb-2 ms-3"><b>Lokasi</b></label>
                                    <input type="text" name="lokasi" class="form-control py-2 px-3 rounded-pill border-0"
                                        style="box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);"
                                        placeholder="Tuliskan Lokasinya" required>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="mb-2 ms-3"><b>Detail Kejadian</b></label>
                                    <input type="text" name="keluhan" class="form-control py-2 px-3 rounded-pill border-0"
                                        style="box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);" placeholder="Detail Keluhan"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="button" class="btn btn-primary-2 next-step">Selanjutnya</button>
                    </div>
                </div>
                <div id="step-2" class="d-none card-register mx-auto">
                    <div class="card shadow-sm border-0 pt-3 pb-3" style="border-radius: 35px;">
                        <div class="card-body text-center">
                            <div class="border-bottom mx-4 pb-3">
                                <img src="{{ asset('images/step-2-4.svg') }}" width="100%" alt="">
                            </div>
                            <div class="py-3 text-start px-4">
                                <div class="form-group mb-4">
                                    <label class="mb-2 ms-3"><b>Tanggal Kejadian</b></label>
                                    <input type="date" name="tanggal_kejadian"
                                        class="form-control py-2 px-3 rounded-pill border-0"
                                        style="box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);" required>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="mb-2 ms-3"><b>Waktu Kejadian</b></label>
                                    <input type="time" name="waktu_kejadian"
                                        class="form-control py-2 px-3 rounded-pill border-0"
                                        style="box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);" required>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="mb-2 ms-3"><b>Nama Oknum Opsional</b></label>
                                    <input type="text" name="oknum" class="form-control py-2 px-3 rounded-pill border-0"
                                        style="box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);"
                                        placeholder="Tuliskan nama oknum jika anda tahu ( Tidak Wajib )" required>
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
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $('.next-page').on('click', function() {
            $('#intro').addClass('d-none')
            $('#form-1').removeClass('d-none')
        })
        $('.next-step').on('click', function() {
            $('#step-1').addClass('d-none')
            $('#step-2').removeClass('d-none')
        })
    </script>
@endsection
