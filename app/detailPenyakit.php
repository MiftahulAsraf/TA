<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class detailPenyakit extends Model
{
    protected $table = 'detail_penyakit';
    
    public $incrementing = false;

    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';
    protected $primaryKey = ['id_penyakit', 'id_pemeriksaan'];
    protected $fillable = [
        'id_penyakit', 'id_pemeriksaan'
   
    ];
    public $timestamps = false;

    public function penyakit()
    {
        return $this->belongsTo('App\penyakit', 'id_penyakit', 'id_penyakit');
    }
    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        if(!is_array($keys)){
            return parent::setKeysForSaveQuery($query);
        }

        foreach($keys as $keyName){
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    protected function getKeyForSaveQuery($keyName = null)
    {
        if(is_null($keyName)){
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }
}
