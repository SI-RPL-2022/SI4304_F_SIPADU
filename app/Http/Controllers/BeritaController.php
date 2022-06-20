<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $data = [
            'title' => 'Berita',
            'berita' => Berita::all()
        ];

        return view('berita.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Masukan Berita',
        ];

        return view('berita.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $berita = new Berita();
            $berita->judul = $request->judul;
            $berita->deskripsi = $request->isi;
            $berita->tempat_tanggal = $request->tempat_tanggal;
            if ($request->hasFile('file')) {
                $format = $request->file('file')->getClientOriginalName();
                $name = Str::random(7);
                $newName = 'berita_' . $name . $format;
                $request->file('file')->move(public_path() . '/berita_file', $newName);

                $berita->image = $newName;
            } else {
                $request->session()->flash('alert', 'warning');
                $request->session()->flash('message', 'Harap Upload File Terlebih Dahulu!');
                return redirect()->to(route('berita.create'));
            }
            $berita->save();

            $request->session()->flash('alert', 'success');
            $request->session()->flash('message', 'Berita Berhasil Ditambahkan!');
            return redirect()->to(route('berita.create'));
        } catch (\Exception $err) {
            throw $err;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'title' => 'Masukan Berita',
            'berita' => Berita::findOrFail($id)
        ];

        return view('berita.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Berita',
            'berita' => Berita::findOrFail($id)
        ];

        return view('berita.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $berita = Berita::findOrFail($id);
            $berita->judul = $request->judul;
            $berita->deskripsi = $request->isi;
            $berita->tempat_tanggal = $request->tempat_tanggal;
            if ($request->hasFile('file')) {
                $format = $request->file('file')->getClientOriginalName();
                $name = Str::random(7);
                $newName = 'berita_' . $name . $format;
                $request->file('file')->move(public_path() . '/berita_file', $newName);

                $berita->image = $newName;
            }
            $berita->save();

            $request->session()->flash('alert', 'success');
            $request->session()->flash('message', 'Berita Berhasil Ditambahkan!');
            return redirect()->to(route('berita.create'));
        } catch (\Exception $err) {
            throw $err;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        $request->session()->flash('alert', 'success');
        $request->session()->flash('message', 'Berita Berhasil Dihapus!');
        return redirect()->to(route('berita.index'));
    }
}
