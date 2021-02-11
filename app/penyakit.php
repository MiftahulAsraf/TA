<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penyakit extends Model
{
    protected $table = 'penyakit';
    protected $primaryKey = 'id_penyakit';
    protected $fillable = [
        'nama_penyakit'
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    public function detailPenyakit()
    {
        return $this->hasMany(detailPenyakit::class);
    }
}
