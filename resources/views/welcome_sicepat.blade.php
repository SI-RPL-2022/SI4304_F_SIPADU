<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Welcome Page</title>
</head>

<body>
    <nav class="navbar navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h2 class="text-primary-2">SICEPAT</h2>
                {{-- <img src="./images/logo.svg" alt=""> --}}
            </a>
        </div>
    </nav>
    <div class="landing-page my-5">
        <div class="container">
            @if (Session::has('alert'))
                <div class="alert alert-{{ Session::get('alert') }}" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="row mt-3">
                <div class="text-center">
                    <h2 class="text-primary-2">
                        <b>DATA ORDERAN</b>
                    </h2>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ url('sicepat') }}?sync=true" class="btn btn-primary-2 mb-3">Sinkron API Shopee</a>
                </div>
                <div class="card scrollbar scrollbar-custom" style="height: 600px;">
                    <div class="card-body">
                        <div class="table-responsive scrollbar-custom">
                            <table class="table table-borderless">
                                <thead class="text-primary-2 text-left" style="font-size: larger;">
                                    <tr>
                                        <th class="pb-4">No</th>
                                        <th class="pb-4">Rincian Pengirim</th>
                                        <th class="pb-4">Rincian Penerima</th>
                                        <th class="pb-4">Harga Ongkir</th>
                                        <th class="pb-4">Tanggal Pemesanan</th>
                                    </tr>
                                </thead>
                                <tbody class="text-primary-2 body-laporan">
                                    @foreach ($orderan as $index => $row)
                                        <tr id="{{ $row->no_referensi }}" class="row-laporan border-bottom">
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <ul>
                                                    <li>{{ $row->Nama_Pengirim }}</li>
                                                    <li>{{ $row->Alamat_Pickup }}</li>
                                                </ul>
                                            </td>
                                            <td>
                                                <ul>
                                                    <li>{{ $row->Nama_Penerima }}</li>
                                                    <li>{{ $row->Alamat_Penerima }}</li>
                                                </ul>
                                            </td>
                                            <td>
                                                Rp. {{ number_format($row->Harga_Ongkir, 0) }}
                                            </td>
                                            <td>
                                                {{ $row->Tanggal_Pemesanan }}
                                            </td>
                                            <!--<td></td>-->
                                        </tr>
                                    @endforeach
                                    <tr class="border-bottom d-none data-null">
                                        <td colspan="5" class="text-center">
                                            Orderan Tidak Ditemukan!
                                        </td>
                                    </tr>
                                    @if (count($orderan) < 1)
                                        <tr class="border-bottom">
                                            <td colspan="5" class="text-center">
                                                Orderan Tidak Ditemukan!
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
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
