<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\reservasi;
use App\Pemeriksaan;
use App\Pasien;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data_pasien = Pasien::all();
        $riwayat = Pemeriksaan::where("id_pasien", Auth::user()->id_users)->get();
        $total = Pemeriksaan::whereMonth("tanggal_pemeriksaan",date('m'))->get();
        $disetujui = reservasi::where('status','1')->get();
        $dbrek = reservasi::whereday("tanggal_reservasi",date('d'))->where('status','2')->WhereMonth("tanggal_reservasi", date('m'))->get();
        $riwayatres = reservasi::where("id_pasien", Auth::user()->id_users)->get();
        $data_rekam = Pemeriksaan::all();
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
