<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
