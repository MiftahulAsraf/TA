<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservasi extends Model
{
    protected $table = 'reservasi';
    protected $primaryKey = 'id_reservasi';
    protected $fillable = [
        'tanggal_reservasi', 'id_pasien', 'id_waktu', 'status'
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    public function pasien() {
        return $this->belongsTo('App\pasien', 'id_pasien', 'id_pasien');
    }
    public function waktu_reservasi() {
        return $this->belongsTo('App\WaktuReservasi', 'id_waktu', 'id_waktu');
    }
}
