<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemeriksaan;
use App\Pasien;
use App\reservasi;
use App\penyakit;
use App\detailPenyakit;
use App\Obat;
use App\TransaksiObat;
use App\LayananTambahan;
use App\DetailLayananTambahan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RekamController extends Controller
{
    public function index(Request $request)
    {

            $data_rekam = Pemeriksaan::OrderBy('tanggal_pemeriksaan' , 'DESC')->get(); 
            $disetujui = reservasi::whereday("tanggal_reservasi",date('d'))->where('status','2')->WhereMonth("tanggal_reservasi", date('m'))->get();
            $data_pasien = Pasien::all();
            $data_obat = TransaksiObat::all();
            $data_layanan = DetailLayananTambahan::all();
            $db_layanan = LayananTambahan::all();
            $data_penyakit = penyakit::all();
            $db_obat = obat::all();
        
        return view('rekammedis.index',['data_rekam' => $data_rekam, 'disetujui' => $disetujui, 'data_pasien' => $data_pasien, 'data_obat' => $data_obat, 
        'data_penyakit' => $data_penyakit, 'data_layanan' => $data_layanan, 'db_obat' => $db_obat, 'db_layanan' => $db_layanan ]);
    }

    public function rekampribadi($id_pasien, Request $request)
    {

            $data_rekam = Pemeriksaan::WHERE('id_pasien',$id_pasien)->OrderBy('tanggal_pemeriksaan' , 'DESC')->get();
            return view('rekammedis.rekam2',['data_rekam' => $data_rekam]);
    }

    public function edit($id_pemeriksaan)
    {
        $data_rekam = Pemeriksaan::find($id_pemeriksaan);
        $data_obat = TransaksiObat::all();
        $db_layanan = LayananTambahan::all();
        $data_layanan = DetailLayananTambahan::all();
        $data_penyakit = penyakit::all();
        $db_obat = obat::all();
    
    return view('rekammedis.edit',['data_rekam' => $data_rekam,  'data_obat' => $data_obat, 'data_layanan' => $data_layanan,
    'data_penyakit' => $data_penyakit, 'db_layanan' => $db_layanan , 'db_obat' => $db_obat ]);
    }

    public function update($id_pasien, Request $request)
    {
        $validation = $request->validate([
                'id_pemeriksaan' => 'required' ,
                'keluhan' => 'required' ,
                'id_penyakit' => 'required' ,
                'tekanan_darah' => 'required' ,
                'tanggal_pemeriksaan' => 'required' ,
                'id_obat' => 'required' ,

                'petunjuk' => 'required' ,
            ],
            [
                'id_pemeriksaan.required' => 'Harus diisi',
                'keluhan.required'=>'Harus diisi',
                'id_penyakit.required'=> 'Harus diisi',
                'tekanan_darah.required'=> 'Harus diisi',
                'tanggal_pemeriksaan.required'=> 'Harus diisi',
                'id_obat.required' =>'Harus diisi',
        
                'petunjuk.required' =>'Harus diisi',
            ]
        );

        $pemeriksaan = new Pemeriksaan();
        $pemeriksaan->id_pemeriksaan = $request->id_pemeriksaan;
        $pemeriksaan->keluhan = $request->keluhan;
        $pemeriksaan->tekanan_darah = $request->tekanan_darah;
        $pemeriksaan->tambahan = $request->tambahan;
        $pemeriksaan->tanggal_pemeriksaan = $request->tanggal_pemeriksaan;
        $pemeriksaan->total_biaya = $request->total_biaya;
        
        $pemeriksaan->id_pasien = $id_pasien;

        
        $pemeriksaan->update();

        foreach($request->id_penyakit as $id_penyakit){
            $penyakit = new detailPenyakit();
            $penyakit->id_penyakit = $id_penyakit;
            $penyakit->id_pemeriksaan = $pemeriksaan->id_pemeriksaan;
            $penyakit->update();
        }
        foreach($request->id_obat as $id_obat){
            $obat = new TransaksiObat();
            $obat->id_obat = $id_obat;
            $obat->id_pemeriksaan = $pemeriksaan->id_pemeriksaan;
            $obat->jumlah_obat = $request->jumlah_obat;
            $obat->petunjuk = $request->petunjuk;
            $obat->update();
        }

        if(is_array($request->id_layanan_tambahan)){
            foreach($request->id_layanan_tambahan as $id_layanan){
                $layanan = new DetailLayananTambahan();
                $layanan->id_layanan_tambahan = $id_layanan;
                $layanan->id_pemeriksaan = $pemeriksaan->id_pemeriksaan;
                $layanan->nilai = $request->nilai;
                $layanan->update();
            }
        }

        return redirect('/rekammedis')->with('sukses','Data Berhasil diupdate');
    }

    public function delete($id_pemeriksaan)
    {

        $pemeriksaan = Pemeriksaan::find($id_pemeriksaan);
        $pemeriksaan->delete($pemeriksaan);
        return redirect('/rekammedis')->with('sukses','Data Berhasil dihapus');
    }

    public function index2(Request $request)
    {
            $data_rekam = Pemeriksaan::all();
            $data_hari = Pemeriksaan::whereDay("tanggal_pemeriksaan",date('d'))->WhereMonth("tanggal_pemeriksaan", date('m'))->get();
            $data_pasien = Pasien::all();
            $data_obat = TransaksiObat::all();
        
        return view('transaksi.index',['data_rekam' => $data_rekam, 'data_hari' => $data_hari, 'data_pasien' => $data_pasien, 'data_obat' => $data_obat ]);
    }

    public function create($id_pasien, Request  $request)
    {
        
        $validation = $request->validate([
                'id_pemeriksaan' => 'required' ,
                'keluhan' => 'required' ,
                'id_penyakit' => 'required' ,
                'tekanan_darah' => 'required' ,
                'tanggal_pemeriksaan' => 'required|date|after:yesterday' ,
                'id_obat' => 'required' ,
                'status' => 'required',
                'petunjuk' => 'required' ,
            ],
            [
                'id_pemeriksaan.required' => 'Harus diisi',
                'keluhan.required'=>'Harus diisi',
                'id_penyakit.required'=> 'Harus diisi',
                'tekanan_darah.required'=> 'Harus diisi',
                'tanggal_pemeriksaan.required' => 'Pilih tanggal',
                'tanggal_pemeriksaan.after' => 'Tidak dapat memilih tanggal sebelum hari ini',
                'id_obat.required' =>'Harus diisi',
                'status.required' =>'Harus diisi',
                'petunjuk.required' =>'Harus diisi',


            ]
        );

        $pemeriksaan = new Pemeriksaan();
        $pemeriksaan->id_pemeriksaan = $request->id_pemeriksaan;
        $pemeriksaan->keluhan = $request->keluhan;
        $pemeriksaan->tekanan_darah = $request->tekanan_darah;
        $pemeriksaan->tambahan = $request->tambahan;
        $pemeriksaan->tanggal_pemeriksaan = $request->tanggal_pemeriksaan;
        $pemeriksaan->total_biaya = $request->total_biaya;
        $pemeriksaan->status = $request->status;
        $pemeriksaan->id_dokter = Auth::User()->id_users;
        $pemeriksaan->id_pasien = $id_pasien;
        $pemeriksaan->save();
        
        
        foreach($request->id_penyakit as $id_penyakit){
            $penyakit = new detailPenyakit();
            $penyakit->id_penyakit = $id_penyakit;
            $penyakit->id_pemeriksaan = $pemeriksaan->id_pemeriksaan;
            $penyakit->save();
        }
        foreach($request->id_obat as $id_obat){
            $obat = new TransaksiObat();
            $obat->id_obat = $id_obat;
            $obat->id_pemeriksaan = $pemeriksaan->id_pemeriksaan;
            $obat->jumlah_obat = $request->jumlah_obat;
            $obat->petunjuk = $request->petunjuk;
            $obat->save();
        }
        if(is_array($request->id_layanan_tambahan)){
            foreach($request->id_layanan_tambahan as $id_layanan){
                $layanan = new DetailLayananTambahan();
                $layanan->id_layanan_tambahan = $id_layanan;
                $layanan->id_pemeriksaan = $pemeriksaan->id_pemeriksaan;
                $layanan->nilai = $request->nilai;
                $layanan->save();
            }
        }

        $reservasi = reservasi::find($request->id_reservasi);
        $reservasi->status = 3;
        $reservasi->update();

        return redirect('/rekammedis')->with('sukses','Data Berhasil diinput');
    }

    public function riwayat(Request $request)
    {

        $data_rekam = Pemeriksaan::where("id_pasien", Auth::user()->id_users)->get();
        $disetujui = reservasi::where("id_pasien", Auth::user()->id_users)->where('status', 2)->get();
        $data_pasien = Pasien::all();
        $data_obat = TransaksiObat::all();
        $data_reservasi = reservasi::all();
        
        return view('transaksi.riwayat',['data_rekam' => $data_rekam, 'disetujui' => $disetujui, 'data_pasien' => $data_pasien, 'data_obat' => $data_obat ]);
    }

    public function laporan(Request $request)
    {

        $data_rekam = Pemeriksaan::whereMonth("tanggal_pemeriksaan",date('m'))->get();
        $total = Pemeriksaan::whereMonth("tanggal_pemeriksaan",date('m'))->get();
        $totalhari = Pemeriksaan::whereDay("tanggal_pemeriksaan",date('d'))->WhereMonth("tanggal_pemeriksaan", date('m'))->get();
        $dbrek = Pemeriksaan::all();

        return view('laporan.index',['data_rekam' => $data_rekam,'totalhari' => $totalhari, 'total' => $total, 'dbrek' => $dbrek]);
    }

    public function cetaklaporan( Request $request)
    {
        $tanggal = explode('-', $request->tanggal_pemeriksaan);
        $data_rekam = Pemeriksaan::where(DB::raw('YEAR(tanggal_pemeriksaan)'), $tanggal[0])->where(DB::raw('MONTH(tanggal_pemeriksaan)'), $tanggal[1])->get();
        $now = Carbon::parse()->format('Y-m-d');
        return view('laporan.cetaklaporan',['now'=>$now, 'data_rekam' => $data_rekam ]);
    }

    public function riwayatrekam(Request $request)
    {
        $data_rekam = Pemeriksaan::where("id_pasien", Auth::user()->id_users)->get();
        $data_pasien = Pasien::all();
        $data_obat = TransaksiObat::all();
        $data_penyakit = detailpenyakit::all();
        $data_reservasi = reservasi::all();
        
        return view('rekammedis.riwayat',['data_rekam' => $data_rekam, 'data_pasien' => $data_pasien, 'data_obat' => $data_obat, 
        'data_penyakit' => $data_penyakit ]);
    }

    public function invoice($id_pemeriksaan, Request $request)
    {
        $now = Carbon::parse()->format('Y-m-d');
        $data_rekam = Pemeriksaan::find($id_pemeriksaan);
        $data_pasien = Pasien::all();
        $data_obat = TransaksiObat::all();
        $data_layanan = DetailLayananTambahan::all();
        $db_layanan = LayananTambahan::all();
        $data_penyakit = penyakit::all();
        $db_obat = obat::all();
        $data_reservasi = reservasi::all();
    
        return view('transaksi.invoice',['now'=>$now, 'data_rekam' => $data_rekam,  'data_pasien' => $data_pasien, 'data_obat' => $data_obat, 
        'data_penyakit' => $data_penyakit, 'data_layanan' => $data_layanan, 'db_obat' => $db_obat, 'db_layanan' => $db_layanan ]);
    }

 

}
