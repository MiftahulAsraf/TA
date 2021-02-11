<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LayananTambahan;
use App\DetailLayananTambahan;

class LayananTambahanController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_layanantambahan =\App\layanantambahan::where('id_layanan_tambahan','LIKE','%'.$request->cari.'%')->orwhere('nama_layanan_tambahan','LIKE','%'.$request->cari.'%')->get();

        }else{
            $data_layanantambahan = \App\layanantambahan::all();
        }
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
        
        $layanantambahan = new layanantambahan();
        $layanantambahan->id_layanan_tambahan = $request->id_layanan_tambahan;
        $layanantambahan->nama_layanan_tambahan = $request->nama_layanan_tambahan;
        $layanantambahan->save();

        return redirect('/layanantambahan')->with('sukses','Data Berhasil diinput');
    }
    public function edit($id_layanan_tambahan)
    {
        $layanantambahan = \App\layanantambahan::find($id_layanan_tambahan);
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
        $layanantambahan = \App\layanantambahan::find($id_layanan_tambahan);
        $layanantambahan->id_layanan_tambahan = $request->id_layanan_tambahan;
        $layanantambahan->nama_layanan_tambahan = $request->nama_layanan_tambahan;
        $layanantambahan->update();
        return redirect('/layanantambahan')->with('sukses','Data Berhasil diupdate');
    }
    public function delete($id_layanan_tambahan)
    {
        $layanantambahan = \App\layanantambahan::find($id_layanan_tambahan);
        $layanantambahan->delete($layanantambahan);
        return redirect('/layanantambahan')->with('sukses','Data Berhasil dihapus');
    }
    
}

