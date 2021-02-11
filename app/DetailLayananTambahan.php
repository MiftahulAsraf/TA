<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailLayananTambahan extends Model
{
    protected $table = 'detail_layanan_tambahan';
    protected $fillable = [
        'id_layanan_tambahan', 'id_pemeriksaan', 'nilai'
   
    ];
    public $timestamps = false;

    public function LayananTambahan()
    {
        return $this->belongsTo('App\layanantambahan', 'id_layanan_tambahan', 'id_layanan_tambahan');
    }
}
