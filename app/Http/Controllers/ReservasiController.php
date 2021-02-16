<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Layanan;
use App\WaktuReservasi;
use App\reservasi;
use App\Pasien;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReservasiController extends Controller
{

    public function index()
    {
        $data_waktu = WaktuReservasi::all();
        $layanan_booking = WaktuReservasi::where('id_layanan','LYN01')->get();
        $layanan_homevisit = WaktuReservasi::where('id_layanan','LYN02')->get();
        return view('reservasi.index',['data_waktu' => $data_waktu, 'layanan_booking' => $layanan_booking, 'layanan_homevisit' => $layanan_homevisit]);
    }

    public function jadwal()
    {
        $data_waktu = reservasi::whereDay("tanggal_reservasi",date('d'))->WhereMonth("tanggal_reservasi", date('m'))->where('status','2')->get();;
        $layanan_booking = WaktuReservasi::where('id_layanan','LYN01')->get();
        $layanan_homevisit = WaktuReservasi::where('id_layanan','LYN02')->get();
        return view('reservasi.jadwal',['data_waktu' => $data_waktu, 'layanan_booking' => $layanan_booking, 'layanan_homevisit' => $layanan_homevisit]);
    }

    public function pendaftaran()
    {
        $data_waktu = WaktuReservasi::all();
        $data_pasien = Pasien::OrderBy('id_pasien' , 'DESC')->get(); ;
        $layanan_booking = WaktuReservasi::where('id_layanan','LYN01')->get();
        
        return view('reservasi.pendaftaran',['data_waktu' => $data_waktu, 'layanan_booking' => $layanan_booking, 'data_pasien' => $data_pasien]);
    }

    public function daftarcreate(Request  $request)
    {
        $validation = Validator::make($request->all(), [
            'tanggal_reservasi' => 'required|date|after:yesterday'  
        ],
        [
            'tanggal_reservasi.required' => 'Pilih tanggal',
            'tanggal_reservasi.after' => 'Tidak dapat memilih tanggal sebelum hari ini',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $waktu = $request->id_layanan == "LYN01" ? $request->id_waktu_booking : $request->id_waktu_visit;
        if(reservasi::where('tanggal_reservasi',$request->tanggal_reservasi)->where('id_waktu',$waktu)->first()){
            $validation->errors()->add('tanggal_reservasi','Jadwal Tidak Tersedia, Pilih Waktu Lain');
            if($request->id_layanan == "LYN01"){
                $validation->errors()->add('id_waktu_booking','Jadwal Tidak Tersedia, Pilih Waktu Lain');
            }
            return redirect()->back()->withErrors($validation)->withInput();
        }

        try{
            $reservasi = new reservasi();
            $reservasi->id_reservasi = $request->id_reservasi;
            $reservasi->tanggal_reservasi = $request->tanggal_reservasi;
            $reservasi->status = "2";
            $reservasi->id_pasien = $request->id_pasien;
            if($request->id_layanan == "LYN01"){
                $reservasi->id_waktu = $request->id_waktu_booking;
            }
            $reservasi->save();
        
            return redirect('/pendaftaran')->with('sukses','Data Berhasil diinput');
        }
        catch(\Exception $e)
        {
            return redirect()->with('gagal','Data pada tanggal tersebut sudah ada');
        }

    }

    public function index2(Request $request)
    {
        $data_reservasi = reservasi::all();

        $belumdisetujui = reservasi::with('pasien')->whereMonth("tanggal_reservasi",date('m'))->where('status','1')->get();
        $disetujui = reservasi::where('status','2')->get();
        $selesai = reservasi::where('status','3')->get();
        $ditolak = reservasi::where('status','4')->get();
        $data_waktu = WaktuReservasi::all();
        $data_pasien = Pasien::all();
        $layanan = Layanan::all();
        $user = User::all();
        return view('reservasi.index2',['data_reservasi' => $data_reservasi, 'data_pasien' => $data_pasien, 'data_waktu' => $data_waktu, 'layanan' => $layanan, 
        'belumdisetujui' => $belumdisetujui, 'disetujui' => $disetujui, 'selesai' => $selesai, 'ditolak' => $ditolak]);
    }

    public function riwayat(Request $request)
    {
        $data_reservasi = reservasi::where("id_pasien", Auth::user()->id_users)->get();
        $belumdisetujui = reservasi::where("id_pasien", Auth::user()->id_users)->where('status', 1)->get();
        $data_waktu = WaktuReservasi::all();
        $data_pasien = pasien::all();
        $layanan = Layanan::all();
        $user = user::all();
        $layanan_booking = WaktuReservasi::where('id_layanan','LYN01')->get();
        $layanan_homevisit = WaktuReservasi::where('id_layanan','LYN02')->get();

        return view('reservasi.riwayat',['data_reservasi' => $data_reservasi, 'data_pasien' => $data_pasien, 'data_waktu' => $data_waktu, 'layanan' => $layanan, 
        'user' => $user, 'belumdisetujui' => $belumdisetujui, 'layanan_booking' => $layanan_booking, 'layanan_homevisit' => $layanan_homevisit]);
    }

    public function create(Request  $request)
    {
        $validation = Validator::make($request->all(), [
            'tanggal_reservasi' => 'required|date|after:today'  
        ],
        [
            'tanggal_reservasi.required' => 'Pilih tanggal',
            'tanggal_reservasi.after' => 'Hanya Bisa Reservasi Setelah Hari Ini',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $waktu = $request->id_layanan == "LYN01" ? $request->id_waktu_booking : $request->id_waktu_visit;
        if(reservasi::where('tanggal_reservasi',$request->tanggal_reservasi)->where('id_waktu',$waktu)->first()){
            $validation->errors()->add('tanggal_reservasi','Jadwal Tidak Tersedia, Pilih Waktu Lain');
            if($request->id_layanan == "LYN01"){
                $validation->errors()->add('id_waktu_booking','Jadwal Tidak Tersedia, Pilih Waktu Lain');
            }else{
                $validation->errors()->add('id_waktu_visit','Jadwal Tidak Tersedia, Pilih Waktu Lain');
            }
            return redirect()->back()->withErrors($validation)->withInput();
        }

        try{
            $reservasi = new reservasi();
            $reservasi->id_reservasi = $request->id_reservasi;
            $reservasi->tanggal_reservasi = $request->tanggal_reservasi;
            $reservasi->status = "1";
            $reservasi->id_pasien = $request->id_pasien;
            if($request->id_layanan == "LYN01"){
                
                $reservasi->id_waktu = $request->id_waktu_booking;
            }else{
                $reservasi->id_waktu = $request->id_waktu_visit;
            }
            $reservasi->save();
        
            return redirect('/reservasi')->with('sukses','Data Berhasil diinput');
        }catch(\Exception $e)
        {
            return redirect()->with('gagal','Data pada tanggal tersebut sudah ada');
        }

    }

    public function edit($id_reservasi)
    {
        $reservasi = reservasi::find($id_reservasi);
        return view('reservasi.index2',['reservasi' => $reservasi]);
    }

    public function update(Request $request, $id_reservasi)
    {
        $validation = $request->validate([
                'status' => 'required'
            ],
            [
                'status.required' => 'Pilih Status',
            ]
        );
        $reservasi = reservasi::find($id_reservasi); 
        $reservasi->status =$request->status;
        $reservasi->update();
        $my_apikey = 'KEOS4EUUAAPDUS86GVTM';
        $nohape = $request->notelp;
        if($nohape['0']=='0') {
            $nohape['0']='2';
            $nohape = '6'.$nohape;
        }
        if($reservasi->waktu_reservasi->layanan->nama_layanan == "Booking"){
            if($request->status == 2){
                $message =  'Kepada '.$reservasi->pasien->user->nama_user.' Booking Telah Disetujui Pada Tanggal '.$reservasi->tanggal_reservasi.' Harap Tiba di Klinik 5 Menit Sebelum Jadwal Booking' ;
            }elseif($request->status == 4){
                $message =  'Mohon Maaf Kepada '.$reservasi->pasien->user->nama_user.' Reservasi Anda Tanggal '.$reservasi->tanggal_reservasi.' Ditolak Dikarenakan Dokter Berhalangan' ;
            }

        }elseif($reservasi->waktu_reservasi->layanan->nama_layanan == "Home Visit"){
            if($request->status == 2){
                $message =  'Kepada '.$reservasi->pasien->user->nama_user.' Reservasi Home Visit Telah Disetujui Pada Tanggal '.$reservasi->tanggal_reservasi.' Harap Tiba di Klinik 5 Menit Sebelum Jadwal Booking' ;
            }elseif($request->status == 4){
                $message =  'Mohon Maaf Kepada '.$reservasi->pasien->user->nama_user.' Reservasi Anda Tanggal '.$reservasi->tanggal_reservasi.' Ditolak Dikarenakan Alamat Terlalu Jauh' ;
            }
        }
        $api_url = "http://panel.rapiwha.com/send_message.php";
        $api_url .= "?apikey=". urlencode ($my_apikey);
        $api_url .= "&number=". urlencode ($nohape);
        $api_url .= "&text=". urlencode ($message);

        $my_result_object = json_decode(file_get_contents($api_url, false));

        $result = [$my_result_object->success , $my_result_object->description , $my_result_object->description];
        json_encode($result);
        
        return redirect('/konfirmasi')->with('sukses','Data Berhasil diupdate');
    }

    public function delete($id_reservasi)
    {
        $reservasi = reservasi::find($id_reservasi);
        $reservasi->delete($reservasi);
        return redirect('/konfirmasi')->with('sukses','Data Berhasil dihapus');
    }  

    public function deleteres($id_reservasi)
    {
        $reservasi = reservasi::find($id_reservasi);
        $reservasi->delete($reservasi);
        
        return redirect('/riwayatreservasi')->with('sukses','Data Berhasil dibatalkan');
    }

    public function editres($id_reservasi)
    {
        $reservasi = reservasi::find($id_reservasi);

        return view('reservasi.index2',['reservasi' => $reservasi]);
    }

    public function updateres(Request $request, $id_reservasi)
    {
        $validation = $request->validate([
                'tanggal_reservasi' => 'required',
            ],
            [
                'tanggal_reservasi.required' => 'Pilih Tanggal',
            ]
        );

            $reservasi = reservasi::find($id_reservasi);    
            $reservasi->tanggal_reservasi = $request->tanggal_reservasi;
            $reservasi->update();
            return redirect('/riwayatreservasi')->with('sukses','Data Berhasil diupdate');
        }
}


