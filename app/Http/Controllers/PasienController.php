<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasien;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $data_pasien = Pasien::all();
        return view('pasien.index',['data_pasien' => $data_pasien]);
    }

    public function create(Request  $request)
    {
        $validation = $request->validate([
            'nama_user' => 'required|min:5',
            'umur' => 'required|max:2',
            'nomor_telp' => 'required|max:13',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'username' => 'required|min:5|unique:users',
            'password' => 'required|min:5'
        ],
        [
            'nama_user.required' => 'Harus diisi',
            'nama_user.min' => 'Minimal 5 Karakter',
            'umur.required' => 'Harus diisi',
            'umur.max' => 'Maksimal 99 Tahun',
            'nomor_telp.required' => 'Harus diisi',
            'nomor_telp.max' => 'Maksimal 13 Angka',
            'jenis_kelamin.required' => 'Harus diisi',
            'alamat.required' => 'Harus diisi',
            'username.required' => 'Harus diisi',
            'username.min' => 'Harus diisi',
            'username.unique' => 'Username tidak tersedia',
            'password.required' => 'Harus Diisi',
            'password.min' => 'Minimal 5 Karakter'
        ]
    );
        $user = new User();
        $user->id_users = $request->id_users;
        $user->nama_user = $request->nama_user;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->id_role = "3";
        $user->save();

        $pasien = new Pasien();
        $pasien->id_pasien = $request->id_users;
        $pasien->no_rekammedis = $request->no_rekammedis;
        $pasien->nomor_telp = $request->nomor_telp;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->alamat = $request->alamat;
        $pasien->umur = $request->umur;
        $pasien->note = $request->note;
        $pasien->save();
        
        return redirect('/pasien')->with('sukses','Data Berhasil diinput');
    }


    public function register(Request  $request)
    {
        $validation = $request->validate([
            'nama_user' => 'required|min:5',
            'umur' => 'required|max:2',
            'nomor_telp' => 'required|max:13',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:5'
        ],
        [
            'nama_user.required' => 'Harus diisi',
            'nama_user.min' => 'Minimal 5 Karakter',
            'umur.required' => 'Harus diisi',
            'umur.max' => 'Maksimal 99 Tahun',
            'nomor_telp.required' => 'Harus diisi',
            'nomor_telp.max' => 'Maksimal 13 Angka',
            'jenis_kelamin.required' => 'Harus diisi',
            'alamat.required' => 'Harus diisi',
            'username.required' => 'Harus diisi',
            'username.unique' => 'Username tidak tersedia',
            'password.required' => 'Harus Diisi',
            'password.min' => 'Minimal 5 Karakter'
        ]
    );
        $user = new User();
        $user->id_users = $request->id_users;
        $user->nama_user = $request->nama_user;

        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->id_role = "3";
        if($request->hasFile('foto')){
            $old_foto = $user->foto;
            $fileext = $request->foto->extension();
            $filename = $user->FileNamefoto().'.'.$fileext;
            $user->foto = $request->file('foto')->storeAs('fotos', $filename,'public');
            $user->save();
            if($old_foto){
                Storage::disk('public')->delete($old_foto);
            }
        }
        $user->save();

        $pasien = new Pasien();
        $pasien->id_pasien = $request->id_users;
        $pasien->no_rekammedis = $request->no_rekammedis;
        $pasien->nomor_telp = $request->nomor_telp;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->alamat = $request->alamat;
        $pasien->umur = $request->umur;
        $pasien->note = $request->note;
        $pasien->save();
        return redirect('/login')->with('sukses','Data Berhasil diinput');

    }

    public function edit($id_pasien)
    {
        $pasien = Pasien::find($id_pasien);
        $user = User::find($id_pasien);
        return view('pasien.edit',['pasien' => $pasien, 'user' => $user]);
    }

    public function update(Request $request, $id_pasien)
    {
        $validation = $request->validate([
            'nama_user' => 'required|min:5',
            'umur' => 'required|max:2',
            'nomor_telp' => 'required|max:13',
            'alamat' => 'required|min:10',
        ],
        [
            'nama_user.required' => 'Harus diisi',
            'nama_user.min' => 'Minimal 5 Karakter',
            'umur.required' => 'Harus diisi',
            'umur.max' => 'Maksimal 99 Tahun',
            'nomor_telp.required' => 'Harus diisi',
            'nomor_telp.max' => 'Maksimal 13 Angka',
            'alamat.required' => 'Harus diisi',
            'alamat.min' => 'Masukkan Alamat Lengkap',
        ]
    );

        $pasien = Pasien::find($id_pasien);
        $pasien->umur = $request->umur;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->nomor_telp = $request->nomor_telp;
        $pasien->alamat = $request->alamat;
        $pasien->note = $request->note;
        $pasien->update();

        $user = user::find($id_pasien);
        $user->nama_user = $request->nama_user;
        if($request->hasFile('foto')){
            $old_foto = $user->foto;
            $fileext = $request->foto->extension();
            $filename = $user->FileNamefoto().'.'.$fileext;
            $user->foto = $request->file('foto')->storeAs('fotos', $filename,'public');
            $user->update();
            if($old_foto){
                Storage::disk('public')->delete($old_foto);
            }
        }
        $user->update();
        
        return redirect('/pasien')->with('sukses','Data Berhasil diupdate');
    }

    public function akun()
    {
        $data_pasien = Auth::user()->pasien;
        $data_user =Auth::user();    
        return view('pasien.akun',['data_pasien' => $data_pasien, 'data_user' => $data_user]);
    }

    public function akunedit($id_pasien)
    {
        $pasien = Pasien::find($id_pasien);
        $user = User::find($id_pasien);
        return view('pasien.akunedit',['pasien' => $pasien, 'user' => $user]);
    }

    public function akunupdate(Request $request, $id_pasien)
    {
        $validation = $request->validate([
                'nama_user' => 'required|min:5',
                'umur' => 'required|max:2',
                'nomor_telp' => 'required|max:13',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
            ],
            [
                'nama_user.required' => 'Harus diisi',
                'nama_user.min' => 'Minimal 5 Karakter',
                'umur.required' => 'Harus diisi',
                'umur.max' => 'Maksimal 99 Tahun',
                'nomor_telp.required' => 'Harus diisi',
                'nomor_telp.max' => 'Maksimal 13 Angka',
                'jenis_kelamin.required' => 'Harus diisi',
                'alamat.required' => 'Harus diisi',
                'password.min' => 'Minimal 5 Karakter'

            ]
        );
        $user = User::find($id_pasien);
        $user->nama_user = $request->nama_user;
        $user->foto = $request->foto;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        if($request->hasFile('foto')){
            $old_foto = $user->foto;
            $fileext = $request->foto->extension();
            $filename = $user->FileNamefoto().'.'.$fileext;
            $user->foto = $request->file('foto')->storeAs('fotos', $filename,'public');
            $user->update();
            if($old_foto){
                Storage::disk('public')->delete($old_foto);
            }
        }

        $user->update();
        
        $pasien = Pasien::find($id_pasien);
        $pasien->umur = $request->umur;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->nomor_telp = $request->nomor_telp;
        $pasien->alamat = $request->alamat;
        $pasien->note = $request->note;
        
        $pasien->update();
        
        return redirect('/akun')->with('sukses','Data Berhasil diupdate');
    }

}
