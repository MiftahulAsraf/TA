<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaktuReservasi extends Model
{
    protected $table = 'waktu_reservasi';
    protected $primaryKey = 'id_waktu';
    protected $fillable = [
        'waktu_mulai', 'waktu_selesai' ,'id_layanan'
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    public function layanan() {
        return $this->belongsTo('App\layanan', 'id_layanan', 'id_layanan');
    }
}
