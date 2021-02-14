<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LayananTambahan;

class LayananTambahanController extends Controller
{
    public function index(Request $request)
    {
        $data_layanantambahan = LayananTambahan::all();
        return view('layanantambahan.index',['data_layanantambahan' => $data_layanantambahan]);
    }
    public function create(Request  $request)
    {
        $validation = $request->validate([

            'nama_layanan_tambahan' => 'required|min:5'
            


        ],
        [
            'nama_layanan_tambahan.required' => 'Harus diisi',
            'nama_layanan_tambahan.min' => 'Minimal 5 Karakter',

        ]
    );
        
        $layanantambahan = new LayananTambahan();
        $layanantambahan->id_layanan_tambahan = $request->id_layanan_tambahan;
        $layanantambahan->nama_layanan_tambahan = $request->nama_layanan_tambahan;
        $layanantambahan->save();

        return redirect('/layanantambahan')->with('sukses','Data Berhasil diinput');
    }
    public function edit($id_layanan_tambahan)
    {
        $layanantambahan = LayananTambahan::find($id_layanan_tambahan);
        return view('layanantambahan.edit',['layanantambahan' => $layanantambahan]);
    }
    public function update(Request $request, $id_layanan_tambahan)
    {
        $validation = $request->validate([

            'nama_layanan_tambahan' => 'required|min:5'
            


        ],
        [
            'nama_layanan_tambahan.required' => 'Harus diisi',
            'nama_layanan_tambahan.min' => 'Minimal 5 Karakter',

        ]
    );
        $layanantambahan = LayananTambahan::find($id_layanan_tambahan);
        $layanantambahan->id_layanan_tambahan = $request->id_layanan_tambahan;
        $layanantambahan->nama_layanan_tambahan = $request->nama_layanan_tambahan;
        $layanantambahan->update();
        return redirect('/layanantambahan')->with('sukses','Data Berhasil diupdate');
    }
    public function delete($id_layanan_tambahan)
    {
        $layanantambahan = LayananTambahan::find($id_layanan_tambahan);
        $layanantambahan->delete($layanantambahan);
        return redirect('/layanantambahan')->with('sukses','Data Berhasil dihapus');
    }
    
}

