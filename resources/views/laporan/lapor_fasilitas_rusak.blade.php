@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="text-center">
            <h2 class="text-primary-2 mb-4"><b>Laporkan Fasilitas Yang Rusak</b></h2>
        </div>
        <form action="{{ route('lapor.keluhan.save') }}" method="post">
            @csrf
            {{-- TIPE FASILITAS RUSAK --}}
            <input type="hidden" name="tipe" value="1">
            <div class="card-register mx-auto">
                <div class="card shadow-sm border-0 pt-3 pb-3" style="border-radius: 35px;">
                    <div class="card-body text-center">
                        <div class="border-bottom mx-4 pb-3">
                            <img src="{{ asset('images/step-1.svg') }}" width="100%" alt="">
                        </div>
                        <div class="py-3 text-start px-4">
                            <div class="form-group mb-4">
                                <label class="mb-2 ms-3"><b>Pilih Fasilitas</b></label>
                                <select name="fasilitas" id="fasilitas" class="form-control py-2 px-3 rounded-pill border-0"
                                    style="box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);" required>
                                    <option value="">Pilih Fasilitas</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label class="mb-2 ms-3"><b>Lokasi</b></label>
                                <input type="text" name="lokasi" class="form-control py-2 px-3 rounded-pill border-0"
                                    style="box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);" placeholder="Tuliskan Lokasinya"
                                    required>
                            </div>
                            <div class="form-group mb-4">
                                <label class="mb-2 ms-3"><b>Detail Keluhan</b></label>
                                <input type="text" name="keluhan" class="form-control py-2 px-3 rounded-pill border-0"
                                    style="box-shadow: 0px 4px 14px rgba(0, 0, 0, 0.1);" placeholder="Detail Keluhan"
                                    required>
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