<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Layanan;
use App\WaktuReservasi;
use App\Reservasi;

class WaktuController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_waktu =\App\waktuReservasi::where('id_waktu','LIKE','%'.$request->cari.'%')->orwhere('waktu_selesai','LIKE','%'.$request->cari.'%')->orwhere('waktu_mulai','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_waktu = \App\waktuReservasi::all();
        }
        $layanan = Layanan::all();
        

        return view('waktu.index',['data_waktu' => $data_waktu, 'layanan' => $layanan]);
    }
    public function create(Request  $request)
    {
        $validation = $request->validate([
            'id_waktu' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'id_layanan' => 'required',
            'waktu_mulai' => 'required|unique:waktu_reservasi',
            'waktu_selesai' => 'required|unique:waktu_reservasi',
            


        ],
        [
            'id_waktu.required' => 'Pilih',
            'waktu_mulai.required' => ' Pilih Waktu',
            'waktu_selesai.required' => ' Pilih Waktu',
            'id_layanan.required' => 'Pilih Layanan',
            'waktu_mulai.unique' => 'Waktu Tidak Tersedia',
            'waktu_selesai.unique' => 'Waktu Tidak Tersedia',


        ]
    );
        
        $waktu = new waktuReservasi();
        $waktu->id_waktu = $request->id_waktu;
        $waktu->waktu_mulai = $request->waktu_mulai;
        $waktu->waktu_selesai = $request->waktu_selesai;

        $waktu->id_layanan = $request->id_layanan;
        $waktu->save();

        return redirect('/waktu')->with('sukses','Data Berhasil diinput');
    }
    public function edit($id_waktu)
    {
        $layanan = Layanan::all();
        $waktu = \App\waktuReservasi::find($id_waktu);
        return view('waktu.edit',['waktu' => $waktu , 'layanan' => $layanan]);
    }
    public function update(Request $request, $id_waktu)
    {
        $validation = $request->validate([
            'id_waktu' => 'required',
            'id_layanan' => 'required',

            


        ],
        [
            'id_waktu.required' => 'Pilih',
            'id_layanan.required' => 'Pilih Layanan',


        ]
    );
        $waktu = \App\waktuReservasi::find($id_waktu);
        $waktu->id_waktu = $request->id_waktu;
        $waktu->waktu_mulai = $request->waktu_mulai;
        $waktu->waktu_selesai = $request->waktu_selesai;

        $waktu->id_layanan = $request->id_layanan;
        $waktu->update();

        return redirect('/waktu')->with('sukses','Data Berhasil diupdate');
    }
    public function delete($id_waktu)
    {
        $waktu = \App\waktuReservasi::find($id_waktu);
        $waktu->delete($waktu);
        return redirect('/waktu')->with('sukses','Data Berhasil dihapus');
    }
}

