<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();
        $data = [
            'title' => 'Fasilitas Publik Kelurahan Mengger',
            'fasilitas' => $fasilitas
        ];
        return view('fasilitas.index', $data);
    }
}