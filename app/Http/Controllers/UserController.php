<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data_user = User::all();
        return view('admin.index',['data_user' => $data_user]);
    }

    public function edit($id_users)
    {
        $user = User::find($id_users);
        return view('admin.edit',['user' => $user]);
    }
    
    public function update(Request $request, $id_users)
    {
        $validation = $request->validate([
                'nama_user' => 'required|min:5',
                'username' => 'required|min:5',
                'password' => 'required|min:5',
            ],
            [
                'nama_user.required' => 'Harus diisi',
                'nama_user.min' => 'Minimal 5 Karakter',
                'username.required' => 'Harus diisi',
                'username.min' => 'Minimal 5 Karakter',
                'password.required' => 'isi password',
                'password.min' => 'Minimal 5 Karakter',
            ]
        );
        $user = User::find($id_users);
        $user->nama_user = $request->nama_user;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
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

        return redirect('/user')->with('sukses','Data Berhasil diupdate');
    }

    public function delete($id_users)
    {
        $user = User::find($id_users);
        $user->delete($user);
        return redirect('/user')->with('sukses','Data Berhasil dihapus');
    }

}
