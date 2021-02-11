<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';
    protected $primaryKey = 'id_layanan';
    protected $fillable = [
        'nama_layanan'
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    public function WaktuReservasi()
    {
        return $this->hasMany(WaktuReservasi::class);
    }
}
