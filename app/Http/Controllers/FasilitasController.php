<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function show($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $data = [
            'title' => 'Fasilitas Publik Kelurahan Mengger',
            'fasilitas' => $fasilitas
        ];
        return view('fasilitas.detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Masukan Fasilitas',
        ];

        return view('fasilitas.create', $data);
    }

    public function store(Request $request)
    {
        try {
            $fasilitas = new Fasilitas();
            $fasilitas->name = $request->nama;
            $fasilitas->deskripsi = $request->deskripsi;
            $fasilitas->buka = $request->buka;
            $fasilitas->alamat = $request->alamat;
            if ($request->hasFile('file')) {
                $format = $request->file('file')->getClientOriginalName();
                $name = Str::random(7);
                $newName = 'fasilitas_' . $name . $format;
                $request->file('file')->move(public_path() . '/fasilitas_file', $newName);

                $fasilitas->image = $newName;
            } else {
                $request->session()->flash('alert', 'warning');
                $request->session()->flash('message', 'Harap Upload File Terlebih Dahulu!');
                return redirect()->to(route('fasilitas.create'));
            }
            $fasilitas->save();

            $request->session()->flash('alert', 'success');
            $request->session()->flash('message', 'Fasilitas Berhasil Ditambahkan!');
            return redirect()->to(route('fasilitas.create'));
        } catch (\Exception $err) {
            throw $err;
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Fasilitas',
            'fasilitas' => Fasilitas::findOrFail($id)
        ];

        return view('fasilitas.edit', $data);
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
            $fasilitas = Fasilitas::findOrFail($id);
            $fasilitas->name = $request->nama;
            $fasilitas->deskripsi = $request->deskripsi;
            $fasilitas->buka = $request->buka;
            $fasilitas->alamat = $request->alamat;
            if ($request->hasFile('file')) {
                $format = $request->file('file')->getClientOriginalName();
                $name = Str::random(7);
                $newName = 'fasilitas_' . $name . $format;
                $request->file('file')->move(public_path() . '/fasilitas_file', $newName);

                $fasilitas->image = $newName;
            }
            $fasilitas->save();

            $request->session()->flash('alert', 'success');
            $request->session()->flash('message', 'Fasilitas Berhasil Diubah!');
            return redirect()->to(route('fasilitas.index'));
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
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->delete();

        $request->session()->flash('alert', 'success');
        $request->session()->flash('message', 'Fasilitas Berhasil Dihapus!');
        return redirect()->to(route('fasilitas.index'));
    }
}
