<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Obat;
use App\TransaksiObat;

class ObatController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_obat =\App\obat::where('id_obat','LIKE','%'.$request->cari.'%')->orwhere('nama_obat','LIKE','%'.$request->cari.'%')->orwhere('jenis_obat','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_obat = \App\obat::all();
        }
        return view('obat.index',['data_obat' => $data_obat]);
    }
    public function create(Request  $request)
    {
        $validation = $request->validate([
            'nama_obat' => 'required|min:5',
            'jenis_obat' => 'required|min:3'


            


        ],
        [
            'nama_obat.required' => 'Harus diisi',
            'nama_obat.min' => 'Minimal 5 Karakter',
            'jenis_obat.required' => 'Harus diisi',
            'jenis_obat.min' => 'Minimal 3 Karakter',



        ]
    );
        
        $obat = new obat();
        $obat->id_obat = $request->id_obat;
        $obat->nama_obat = $request->nama_obat;
        $obat->jenis_obat = $request->jenis_obat;
        $obat->save();

        
        return redirect('/obat')->with('sukses','Data Berhasil diinput');
    }
    public function edit($id_obat)
    {
        $obat = \App\obat::find($id_obat);
        return view('obat.edit',['obat' => $obat]);
    }
    public function update(Request $request, $id_obat)
    {
        $validation = $request->validate([
            'nama_obat' => 'required|min:5',
            'jenis_obat' => 'required|min:3'


            


        ],
        [
            'nama_obat.required' => 'Harus diisi',
            'nama_obat.min' => 'Minimal 5 Karakter',
            'jenis_obat.required' => 'Harus diisi',
            'jenis_obat.min' => 'Minimal 3 Karakter',



        ]
    );
        $obat = \App\obat::find($id_obat);
        $obat->id_obat = $request->id_obat;
        $obat->nama_obat = $request->nama_obat;
        $obat->jenis_obat = $request->jenis_obat;
        $obat->update();
        return redirect('/obat')->with('sukses','Data Berhasil diupdate');
    }
    public function delete($id_obat)
    {
        $obat = \App\obat::find($id_obat);
        $obat->delete($obat);
        return redirect('/obat')->with('sukses','Data Berhasil dihapus');
    }
    
}



// $TransaksiObat = new TransaksiObat();
// $TransaksiObat->id_obat = $request->id_obat;
// $obat->save();