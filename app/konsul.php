<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class konsul extends Model
{
    protected $table = 'konsul';
    protected $fillable = ['id_konsul','chat','from_where','to_where'];
}
