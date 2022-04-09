<?php
 
namespace App\Http\Controllers;
 
use App\Models\Laporan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
 
class LaporanController extends Controller
{
 
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Lapor Keluhan'
        ];
        return view('laporan.lapor_keluhan', $data);
    }
 
    public function laporKeluhan(Request $request, $type, $id = null)
    {
 
        if ($type == 'fasilitas-rusak') {
            $data = [
                'title' => 'Lapor Fasilitas Rusak'
            ];
 
            if ($id != null) {
                $laporan = Laporan::find($id);
                if ($laporan == null) abort(404);
 
                $data['laporan'] = $laporan;
 
                return view('laporan.lapor_fasilitas_rusak_upload', $data);
            }
 
            return view('laporan.lapor_fasilitas_rusak', $data);
        } else {
            return abort(404);
        }
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $laporan = Laporan::create([
                'id_user' => Auth::user()->id,
                'no_referensi' => rand(10000, 999999),
                'fasilitas' => $request->fasilitas,
                'lokasi' => $request->lokasi,
                'keluhan' => $request->keluhan,
                'tipe' => $request->tipe,
                'status' => 0,
            ]);
 
            DB::commit();
 
            $request->session()->flash('alert', 'success');
            $request->session()->flash('message', 'Laporan Berhasil Ditambahkan!');
            if ($request->tipe == 1) {
                return redirect()->to(route('lapor.keluhan.upload.fasilitas.rusak', ['id' => $laporan->id]));
            }
            return redirect()->to(route('lapor.keluhan'));
        } catch (\Exception $e) {
            throw $e;
        }
    }
 
    public function uploadFasilitasRusak(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            if ($request->hasFile('file')) {
                $format = $request->file('file')->getClientOriginalName();
                $name = Str::random(7);
                $newName = 'fasilitas_rusak_' . $name . $format;
                $request->file('file')->move(public_path() . '/keluhan', $newName);
 
                $laporan = Laporan::find($id);
                $laporan->file = $newName;
                $laporan->save();
            } else {
                $request->session()->flash('alert', 'warning');
                $request->session()->flash('message', 'Harap Upload File Terlebih Dahulu!');
                return redirect()->back();
            }
            $request->session()->flash('noRef', $laporan->no_referensi);
            DB::commit();
 
            return redirect()->to(route('lapor.keluhan.fasilitas.rusak.done'));
        } catch (\Exception $e) {
            throw $e;
        }
    }
}