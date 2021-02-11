<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservasi;
use App\pemeriksaan;
use App\user;
use App\pasien;
use Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data_pasien = pasien::all();
        $riwayat = pemeriksaan::where("id_pasien", Auth::user()->id_users)->get();
        $total = pemeriksaan::whereMonth("tanggal_pemeriksaan",date('m'))->get();
        $disetujui = reservasi::where('status','1')->get();
        $dbrek = reservasi::whereday("tanggal_reservasi",date('d'))->where('status','2')->WhereMonth("tanggal_reservasi", date('m'))->get();
        $riwayatres = reservasi::where("id_pasien", Auth::user()->id_users)->get();
        $data_rekam = pemeriksaan::all();
        $data_reservasi = reservasi::all();
        return view('dashboards.index',['riwayat' => $riwayat, 'riwayatres' => $riwayatres, 'data_rekam' => $data_rekam,'dbrek' => $dbrek, 'data_reservasi' => $data_reservasi, 'disetujui' => $disetujui, 'total' => $total, 'data_pasien' => $data_pasien]);
    }
    public function contact()
    {
        return view('dashboards.contact');
    }
    public function chat()
    {
        return view('dashboards.chat');
    }

}
