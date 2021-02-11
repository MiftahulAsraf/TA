<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'id_pasien';
    protected $fillable = [
        'alamat', 'umur', 'note', 'jenis_kelamin', 'nomor_telp', 'no_rekammedis'
    ];
    protected $keyType = 'string';

    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('App\user', 'id_pasien', 'id_users');
    }
}
