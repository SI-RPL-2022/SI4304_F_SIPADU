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
}