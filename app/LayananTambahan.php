<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LayananTambahan extends Model
{
    protected $table = 'layanan_tambahan';
    protected $primaryKey = 'id_layanan_tambahan';
    protected $fillable = [
        'nama_layanan_tambahan'
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    public function DetailLayananTambahan()
    {
        return $this->hasMany(DetailLayananTambahan::class);
    }
}
