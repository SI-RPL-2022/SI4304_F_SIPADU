@extends('layouts.app')
@section('content')
    <div class="container pt-5">
        @if (Session::has('alert'))
            <div class="alert alert-{{ Session::get('alert') }}" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="pb-4 mt-3">
            <div class="container pb-5">
                <div class="d-flex justify-content-between">
                    <h3 class="text-primary-2 title-news-2">
                        <a href="{{ route('berita.index') }}" style="text-decoration: none">Kembali</a>
                    </h3>
                    @if (Auth::user()->role == 'superadmin')
                        <div class="dropdown">
                            <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <svg width="5" height="34" viewBox="0 0 5 34" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.0431027 3.28935C0.0414676 2.52935 0.230219 1.94894 0.609358 1.54812C1.00854 1.16726 1.52813 0.976145 2.16813 0.974769L2.67813 0.973671C3.33813 0.972252 3.85853 1.16113 4.23935 1.54031C4.62021 1.9395 4.81146 2.51909 4.81309 3.27908C4.81477 4.05908 4.62602 4.63949 4.24684 5.02031C3.86765 5.40112 3.34806 5.59224 2.68807 5.59366L2.17807 5.59476C1.53807 5.59613 1.01766 5.40725 0.616845 5.02812C0.236028 4.64893 0.0447807 4.06934 0.0431027 3.28935ZM0.0732304 17.2932C0.0715953 16.5332 0.260347 15.9528 0.639486 15.552C1.03867 15.1711 1.55826 14.98 2.19826 14.9786L2.70825 14.9775C3.36825 14.9761 3.88866 15.165 4.26948 15.5442C4.65034 15.9434 4.84158 16.523 4.84322 17.283C4.8449 18.063 4.65615 18.6434 4.27696 19.0242C3.89778 19.405 3.37819 19.5961 2.71819 19.5975L2.2082 19.5986C1.5682 19.6 1.04779 19.4111 0.646972 19.032C0.266156 18.6528 0.0749084 18.0732 0.0732304 17.2932ZM0.103358 31.2971C0.101723 30.5371 0.290475 29.9567 0.669613 29.5559C1.06879 29.175 1.58838 28.9839 2.22838 28.9825L2.73838 28.9814C3.39838 28.98 3.91879 29.1689 4.29961 29.5481C4.68046 29.9472 4.87171 30.5268 4.87335 31.2868C4.87503 32.0668 4.68627 32.6472 4.30709 33.0281C3.92791 33.4089 3.40832 33.6 2.74832 33.6014L2.23832 33.6025C1.59832 33.6039 1.07792 33.415 0.6771 33.0359C0.296283 32.6567 0.105036 32.0771 0.103358 31.2971Z"
                                        fill="black" />
                                </svg>

                            </a>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item"
                                        href="{{ route('berita.edit', ['beritum' => $berita->id]) }}">Edit</a></li>
                                <li><a class="dropdown-item hapus-btn" href="#">Hapus</a></li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="text-center">
                        <h3 class="text-primary-2">
                            {{ $berita->judul }} <br>
                            <img src="{{ asset('berita_file') }}/{{ $berita->image }}" width="50%" alt="">
                        </h3>
                    </div>
                    <div class="text-start my-3">
                        <h6 class="text-primary-2">
                            {{ $berita->tempat_tanggal }}
                        </h6>
                        <h6 class="text-primary-2">
                            {{ $berita->deskripsi }}
                        </h6>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <form id="verifikasiForm" action="{{ route('berita.destroy', ['beritum' => $berita->id]) }}" class="d-none"
        method="POST">
        @csrf
        @method('delete')
    </form>
@endsection
@section('script')
    <script type="text/javascript">
        $('.hapus-btn').on('click', function() {
            let form = $('#verifikasiForm')
            form.append('<input type="hidden" name="lapor" value="tolak" />')
            Swal.fire({
                title: 'Apa Anda Yakin Ingin Menghapus Berita Ini ?',
                // text: "Laporan Akan Diverifikasi!",
                // icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Swal.fire({
                    //     icon: 'info',
                    //     title: 'Tunggu Sebentar...',
                    //     html: 'Sedang memproses laporan...',
                    //     didOpen: () => {
                    //         Swal.showLoading()
                    //     }
                    // })
                    form.submit()
                }
            })
        })
    </script>
@endsection
