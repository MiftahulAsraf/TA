<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat';
    protected $primaryKey = 'id_obat';
    protected $fillable = [
        'nama_obat', 'jenis_obat'
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    public function TransaksiObat()
    {
        return $this->hasMany(TransaksiObat::class);
    }
}
