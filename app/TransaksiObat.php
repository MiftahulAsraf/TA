<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiObat extends Model
{    
    protected $table = 'transaksi_obat';
    protected $fillable = [
        'id_obat', 'id_pemeriksaan', 'jumlah_obat', 'petunjuk'
   
    ];
    public $timestamps = false;

    public function Obat()
    {
        return $this->belongsTo('App\obat', 'id_obat', 'id_obat');
    }
    
}
