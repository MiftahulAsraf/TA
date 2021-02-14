<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    protected $table = 'pemeriksaan';
    protected $primaryKey = 'id_pemeriksaan';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'keluhan','tanggal_pemeriksaan','tekanan_darah', 'total_biaya', 'id_pasien', 'tambahan', 'id_dokter'
    ];

    protected $date = ["tanggal_pemeriksaan"];
    

    public $timestamps = false;

    public function pasien() {
        return $this->belongsTo('App\Pasien', 'id_pasien', 'id_pasien');
    }
    public function dokter() {
        return $this->belongsTo('App\User', 'id_dokter', 'id_users');
    }
    public function TransaksiObat()
    {
        return $this->hasMany( 'App\TransaksiObat' , 'id_pemeriksaan' , 'id_pemeriksaan');
    }

    public function penyakit()
    {
        return $this->belongsToMany('App\penyakit', 'detail_penyakit' , 'id_pemeriksaan', 'id_penyakit');
    }
    public function DetailLayananTambahan()
    {
        return $this->hasMany('App\DetailLayananTambahan', 'id_pemeriksaan', 'id_pemeriksaan');
    }
}

