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
}
 
