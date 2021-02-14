<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\penyakit;

class PenyakitController extends Controller
{
    public function index(Request $request)
    {
        $data_penyakit = penyakit::all();
        return view('penyakit.index',['data_penyakit' => $data_penyakit]);
    }
    public function create(Request  $request)
    {
        $validation = $request->validate([
                'nama_penyakit' => 'required|min:4',
            ],
            [
                'nama_penyakit.required' => 'Masukkan Nama Penyakit',
                'nama_penyakit.min' => 'Minimal 4 Huruf'
            ]
        );
        
        $penyakit = new penyakit();
        $penyakit->id_penyakit = $request->id_penyakit;
        $penyakit->nama_penyakit = $request->nama_penyakit;
        $penyakit->save();

        return redirect('/penyakit')->with('sukses','Data Berhasil diinput');
    }

    public function edit($id_penyakit)
    {
        $penyakit = penyakit::find($id_penyakit);
        return view('penyakit.edit',['penyakit' => $penyakit]);
    }
    public function update(Request $request, $id_penyakit)
    {
        $validation = $request->validate([
            'nama_penyakit' => 'required|min:4'
        ],
        [
            'nama_penyakit.required' => 'Masukkan Nama Penyakit',
            'nama_penyakit.min' => 'Minimal 4 Huruf'
        ]
    );
    
        $penyakit = penyakit::find($id_penyakit);
        $penyakit->id_penyakit = $request->id_penyakit;
        $penyakit->nama_penyakit = $request->nama_penyakit;
        $penyakit->update();

        return redirect('/penyakit')->with('sukses','Data Berhasil diupdate');
    }
    public function delete($id_penyakit)
    {
        $penyakit = penyakit::find($id_penyakit);
        $penyakit->delete($penyakit);
        return redirect('/penyakit')->with('sukses','Data Berhasil dihapus');
    }
    
}


