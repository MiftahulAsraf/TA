<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\konsul;

class KonsultasiController extends Controller
{
    public function index()
    {
        $dokters  = User::where('id_role',2)->get();
        $user = User::select('users.*')->whereRaw("id_users in (select from_where from konsul where EXTRACT(MONTH FROM konsul.created_at) = '".date('m')."')")->where('id_role',3)->get();
        // $pasiens = User::select('users.*')->join('konsul', 'konsul.from_where', '=', 'users.id_users')->where('id_role',3)->WhereMonth("created_at", date('m'))
        ->orderBy('konsul.created_at','DESC')->distinct()->get();
        return view('konsultasi.index', compact('dokters','pasiens'));
    }

    public function send_chat($receiverId, Request $request)
    {
        $chat = konsul::create([
            "id_konsul" => "chat".date('Y-m-d h:i:s'),
            "chat"      => $request->message,
            "from_where" => auth()->user()->id_users,
            "to_where" => $receiverId,
        ]);

        return response()->json([
            "message"   => "success",
        ]);
    }

    public function all_chat(Request $request)
    {
        // $chat = konsul::select('konsul.*','from.nama_user as from_nama_user','to.nama_user as to_nama_user')->join('users as from','konsul.from_where','from.id_users')->join('users as to','konsul.to_where','to.id_users')
        // ->where(function($q) use($request){
        //     $q->where('from_where',$request->pasien_id)
        //     ->orWhere('to_where', auth()->user()->id_users);
        // })
        // ->where(function($qs) use ($request){
        //     $qs->where('from_where',auth()->user()->id_users)
        //     ->orWhere('to_where', $request->pasien_id);
        // })->orderBy('created_at','desc')->get();

        $chat = konsul::select('konsul.*','from.nama_user as from_nama_user','to.nama_user as to_nama_user')->join('users as from','konsul.from_where','from.id_users')->join('users as to','konsul.to_where','to.id_users')
        ->where(function($q) use ($request){
            $q->where('from_where',$request->receiver)
            ->where('to_where',auth()->user()->id_users);
        })->orwhere(function($q) use ($request){
            $q->where('from_where',auth()->user()->id_users)
            ->where('to_where',$request->receiver);
        })->orderBy('created_at','asc')->get();

        return response()->json([
            "chat" => $chat
        ]);
    }
}
