<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Cache;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $primaryKey = 'id_users';
    protected $fillable = [
        'username', 'nama_user', 'password', 'id_role', 'foto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $keyType = 'string';

    public $timestamps = false;

    private $have_role;

    public function role() {
        return $this->belongsTo('App\Role', 'id_role', 'id');
    }
    public function pasien() {
        return $this->hasOne('App\pasien', 'id_pasien', 'id_users');
    }

    public function status(){
        return Cache::has('user-is-online-' . $this->id);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function FileNamefoto()
    {
        $id = $this->id_users ??  "not-found";
        return uniqid("foto-user-".$id."-");
    }

    public function getfoto()
    {
        
        $patlink = rtrim(app()->basePath('public/storage'), '/');
        if($this->foto && is_dir($patlink) && Storage::disk('public')->exists($this->foto)){
            return url("/storage/".$this->foto);
            // return config('app.url')."/storage/".$this->foto;
        }
        return "https://ui-avatars.com/api/?background=0D8ABC&color=fff&name=".urlencode($this->nama_user);
        
    }
}
