<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Layanan;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        $data_layanan = Layanan::all();
        return view('layanan.index',['data_layanan' => $data_layanan]);
    }
    public function create(Request  $request)
    {
        try {
            $validation = $request->validate([
                'nama_layanan' => 'required|min:5'
            ],
            [
                'nama_layanan.required' => 'Harus diisi',
                'nama_layanan.min' => 'Minimal 5 Karakter',
            ]
        );
        $layanan = new Layanan();
        $layanan->id_layanan = $request->id_layanan;
        $layanan->nama_layanan = $request->nama_layanan;
        $layanan->save();
        } catch (\Throwable $th) {
            throw $th;
        }


        return redirect('/reservasi')->with('sukses','Data Berhasil diinput');
    }
    public function edit($id_layanan)
    {

        $layanan = Layanan::find($id_layanan);
        return view('layanan.edit',['layanan' => $layanan]);
    }
    public function update(Request $request, $id_layanan)
    {
        $validation = $request->validate([
                'nama_layanan' => 'required|min:5'
            ],
            [
                'nama_layanan.required' => 'Harus diisi',
                'nama_layanan.min' => 'Minimal 5 Karakter',
            ]
        );

        $layanan = Layanan::find($id_layanan);
        $layanan->id_layanan = $request->id_layanan;
        $layanan->nama_layanan = $request->nama_layanan;
        $layanan->update();
        return redirect('/layanan')->with('sukses','Data Berhasil diupdate');
    }

    public function delete($id_layanan)
    {
        $layanan = Layanan::find($id_layanan);
        $layanan->delete($layanan);
        return redirect('/layanan')->with('sukses','Data Berhasil dihapus');
    }
}
