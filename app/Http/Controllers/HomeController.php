<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Cabang;
use App\Models\Order;
use App\Models\Paket;
use App\Models\Pendapatan;
use App\Models\Pengiriman;
use App\Models\StatusPaket;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        if(!Str::contains($request->url(), 'sicepat')){
            $this->middleware('auth');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        return view('home', $data);
    }

    public function profil(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $data = [
            'title' => 'Profil',
            'user' => $user
        ];

        if ($request->segment(2) == 'edit') {
            if ($request->segment(3) == 'submit') {
                $userEmail = User::where('email', $request->email)->where('id', '!=', Auth::user()->id)->first();
                if($userEmail){
                    $request->session()->flash('alert', 'danger');
                    $request->session()->flash('message', 'Email telah digunakan!');
                    return redirect()->back();
                }
                $user->email = $request->email;
                $user->address = $request->address;
                $user->phone = $request->phone;
                if($request->password != null){
                    if($request->password == $request->password_confirmation){
                        $user->password = Hash::make($request->password);
                    }else {
                        $request->session()->flash('alert', 'danger');
                        $request->session()->flash('message', 'Password konfirmasi tidak sesuai!');
                        return redirect()->back();
                    }
                }
                $user->save();

                $request->session()->flash('alert', 'success');
                $request->session()->flash('message', 'User Berhasil Diubah!');
                return redirect()->to(route('profil'));
            }
            return view('profil.edit', $data);
        }

        return view('profil.index', $data);
    }
    

// Begin of sicepat

    public function indexSicepat(Request $request)
    {

        if($request->sync){
            $shopee = $this->SinkronisasiDataShopee();
            $request->session()->flash('alert', 'success');
            $request->session()->flash('message', 'Berhasil Sinkronisasi dari Data Shopee! ' . $shopee . ' Data telah ditambahkan.');
            return redirect()->to(url('sicepat'));
        }
        $data = [
            'title' => 'Welcome Page',
            'orderan' => Order::all()
        ];
        // dd($shopee);

        return view('welcome_sicepat', $data);
    }

    public function SinkronisasiDataShopee()
    {
        $shopee = Http::get('https://shopee-iae.herokuapp.com/api/pengiriman')->json();
        $count = 0;
        // Sinkronisasi Dari API Shopee
        DB::beginTransaction();
        try{
            foreach ($shopee['data'] as $row) {
    
                // Tambah Data ke Tabel "DATAORDER"
                $order = Order::find($row['id_pemesanan']); //mencari tabel data order yang sesuai dengan data order dari shopee
                if (!$order) {
                    $order = new Order();
                    $count++;
                    $order->ID_Pesanan = $row['id_pemesanan'];
                }
                $order->Harga_Ongkir = $row['harga_ongkir'];
                $order->Tanggal_Pemesanan = $row['tanggal_pengiriman'];
                $order->Alamat_Pickup = $row['alamat_pengirim'];
                $order->Alamat_Penerima = $row['alamat_penerima'];
                $order->Nama_Pengirim = $row['nama_pengirim'];
                $order->Nama_Penerima = $row['nama_penerima'];
                $order->save();
    
                // Tambah Data ke Tabel "DATA_PAKET"
                $paket = Paket::where('ID_Pesanan', $order->ID_Pesanan)->first(); //nyari data paket == tersedia didataorder
                if (!$paket) {
                    $paket = new Paket();
                }
                $paket->ID_Pesanan = $order->ID_Pesanan;
                $paket->Jenis_Layanan = $row['jenis_layanan'];
                $paket->Berat_Paket = rand(1, 10) . "KG";
                $paket->Volume_Paket = rand(1, 10) . "x" . rand(1, 10) . "x" . rand(1, 10);
                $paket->Kategori_Paket = isset($paket->Kategori_Paket) ? $paket->Kategori_Paket : "Lainnya"; //ganti jadi lainnya
                $paket->Status_Asuransi = $row['status_asuransi'];
                $paket->save();
    
                // Tambah Data ke Tabel "DATA_PENGIRIMAN"
                $pengiriman = Pengiriman::where('ID_Paket', $paket->ID_Paket)->first();
                if (!$pengiriman) {
                    $pengiriman = new Pengiriman();
                }
                $pengiriman->ID_Paket = $paket->ID_Paket;
                $pengiriman->Alat_Transportasi = isset($pengiriman->Alat_Transportasi) ?  $pengiriman->Alat_Transportasi : "Motor";
                $pengiriman->Alur_Pengiriman = isset($pengiriman->Alur_Pengiriman) ?  $pengiriman->Alur_Pengiriman : "Jalur Darat";
                $pengiriman->save();
    
                // Tambah Data ke Tabel "DATA_CABANG"
                $cabang = Cabang::where('ID_Pengiriman', $pengiriman->ID_Pengiriman)->first();
                if (!$cabang) {
                    $cabang = new Cabang();
                }
                $cabang->ID_Pengiriman = $pengiriman->ID_Pengiriman;
                $cabang->Alamat_Cabang = isset($cabang->Alamat_Cabang) ?  $cabang->Alamat_Cabang : "KANTOR CABANG 4";
                $cabang->Riwayat_Pengiriman = isset($cabang->Riwayat_Pengiriman) ?  $cabang->Riwayat_Pengiriman : "Paket sedang dalam perjalanan";
                $cabang->save();
    
                // Tambah Data ke Tabel "DATA_STATUS_PAKET"
                $status = StatusPaket::where('ID_Pengiriman', $pengiriman->ID_Pengiriman)->first();
                if (!$status) {
                    $status = new StatusPaket();
                }
                $status->ID_Pengiriman = $pengiriman->ID_Pengiriman;
                $status->ID_Pesanan = $order->ID_Pesanan;
                $status->Status_Paket = isset($status->Status_Paket) ? $status->Status_Paket : 'Sedang diproses';
                $status->Tanggal_Status = $row['tanggal_pengiriman'];
                $status->Jam_Status = isset($status->Jam_Status) ?  $status->Jam_Status : "8:40:00";
                $status->Nama_Penerima = $row['nama_penerima'];
                $status->save();
    
                // Tambah Data ke Tabel "Data pendapatan"
                $pendapatan = Pendapatan::where('ID_Pesanan', $order->ID_Pesanan)->first();
                if (!$pendapatan) {
                    $pendapatan = new Pendapatan();
                }
                $pendapatan->ID_Pesanan = $order->ID_Pesanan;
                $pendapatan->ID_Paket = $paket->ID_Paket;
                $pendapatan->Total_Pendapatan = $row['harga_ongkir'];
                $pendapatan->save();
            }
            
            DB::commit();
        } catch(\Exception $err){
            DB::rollBack();
            throw $err;
        }
        
        return $count;
        // dd($shopee);
    }
    
    

    public function CheckStatusPaket()
    {
        //  $data = Order::with([
        //     'Paket' => function($query){ // dataorder ambil relasi data_paket
        //         $query->with(['Pengiriman' => function($query){ // data_paket ambil relasi data_pengiriman
        //             $query->with('StatusPaket'); // data_pengiriman ambil relasi status_paket
        //         }]);
        //     }    
        // ]);
        
        $data = StatusPaket::with('Order')->get();

        return response()->json([
            'status' => 200,
            'message' => "Berhasil",
            'data' => $data
        ]);
    }
    
    public function GetOrderan() //menampilkan data orderan dari model yang berisikan data orderan yang berlasi dengan data paket
    {
        $data = Order::with([
            'Paket' => function($query){ // dataorder ambil relasi data_paket
                $query->with(['Pengiriman' => function($query){ // data_paket ambil relasi data_pengiriman
                    $query->with('StatusPaket'); // data_pengiriman ambil relasi status_paket
                }]);
            }    
        ]);

        return response()->json([
            'status' => 200,
            'message' => "Berhasil",
            'data' => $data->get()
        ]);
    }
    
    public function TambahOrderan(Request $request) //helper utk menyediakan data/param yang kita inputkan kedalam function controller
    {
        // return "OKE";
        DB::beginTransaction();
        try {
            // Tambah Data ke Tabel "DATAORDER"   //Kalau data id_pemesanan diceklis postmant berarti dia edit data
            if(isset($request->id_pemesanan)){
                $order = Order::find($request->id_pemesanan);
                if(!$order){
                    return response()->json([
                        'status' => 200,
                        'message' => "Data dengan ID => $request->id_pemesanan Tidak Ditemukan"
                    ]);
                }
            }else {
                $order = new Order();
            }
            $order->Harga_Ongkir = $request->harga_ongkir;
            $order->Tanggal_Pemesanan = $request->tanggal_pengiriman;
            $order->Alamat_Pickup = $request->alamat_pengirim;
            $order->Alamat_Penerima = $request->alamat_penerima;
            $order->Nama_Pengirim = $request->nama_pengirim;
            $order->Nama_Penerima = $request->nama_penerima;
            $order->save();

            // Tambah Data ke Tabel "DATA_PAKET"
            $paket = Paket::where('ID_Pesanan', $order->ID_Pesanan)->first();
            if (!$paket) {
                $paket = new Paket();
            }
            $paket->ID_Pesanan = $order->ID_Pesanan;
            $paket->Jenis_Layanan = $request->jenis_layanan;
            $paket->Berat_Paket = rand(1, 10) . "KG";
            $paket->Volume_Paket = rand(1, 10) . "x" . rand(1, 10) . "x" . rand(1, 10);
            $paket->Kategori_Paket = $request->kategori_paket;
            $paket->Status_Asuransi = $request->status_asuransi;
            $paket->Berat_Paket = $request->berat_paket;
            $paket->Volume_Paket = $request->volume_paket;
            $paket->save();

            // Tambah Data ke Tabel "DATA_PENGIRIMAN"
            $pengiriman = Pengiriman::where('ID_Paket', $paket->ID_Paket)->first();
            if (!$pengiriman) {
                $pengiriman = new Pengiriman();
                $pengiriman->ID_Paket = $paket->ID_Paket;
            }
            $pengiriman->Alat_Transportasi = $request->alat_transportasi;
            $pengiriman->Alur_Pengiriman = $request->alur_pengiriman;
            $pengiriman->save();

            // Tambah Data ke Tabel "DATA_CABANG"
            $cabang = Cabang::where(
                'ID_Pengiriman',
                $pengiriman->ID_Pengiriman
            )->first();
            if (!$cabang) {
                $cabang = new Cabang();
            }
            $cabang->ID_Pengiriman = $pengiriman->ID_Pengiriman;
            $cabang->Alamat_Cabang = $request->alamat_cabang;
            $cabang->Riwayat_Pengiriman = $request->riwayat_pengiriman;
            $cabang->save();

            // Tambah Data ke Tabel "DATA_STATUS_PAKET"
            $status = StatusPaket::where('ID_Pengiriman', $pengiriman->ID_Pengiriman)->first();
            if (!$status) {
                $status = new StatusPaket();
            }
            $status->ID_Pengiriman = $pengiriman->ID_Pengiriman;
                $status->ID_Pesanan = $order->ID_Pesanan;
            $status->Status_Paket = $request->status_pengiriman;
            $status->Tanggal_Status = $request->tanggal_pengiriman;
            $status->Jam_Status = $request->jam_status;
            $status->Nama_Penerima = $request->nama_penerima;
            $status->save();

            // Tambah Data ke Tabel "DATA_STATUS_PAKET"
            $pendapatan = Pendapatan::where('ID_Pesanan', $order->ID_Pesanan)->first();
            if (!$pendapatan) {
                $pendapatan = new Pendapatan();
            }
            $pendapatan->ID_Pesanan = $order->ID_Pesanan;
            $pendapatan->ID_Paket = $paket->ID_Paket;
            $pendapatan->Total_Pendapatan = $request->harga_ongkir;
            $pendapatan->save();

            DB::commit();

            return response()->json([
                'status' => 200,
                'message' => 'Data Berhasil Ditambahkan!'
            ]);
        } catch (\Exception $err) {
            DB::rollBack();
            return $err;
        }
        // dd($shopee);
    }

    public function HapusOrderan(Request $request)
    {
        DB::beginTransaction();
        try {
            // Tambah Data ke Tabel "DATAORDER"
            $order = Order::find($request->id_pemesanan);
            if (!$order) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Data Tidak Ditemukan!'
                ]);
            }
            $order->delete();

            DB::commit();

            return response()->json([
                'status' => 200,
                'message' => 'Data Berhasil Dihapus!'
            ]);
        } catch (\Exception $err) {
            DB::rollBack();
            return $err;
        }
        // dd($shopee);
    }
}
