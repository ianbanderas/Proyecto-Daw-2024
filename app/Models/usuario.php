<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;




class usuario extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "usuario";
    protected $primaryKey = "idUsu";
    public $timestamps = false;

    protected $fillable = [
        "idUsu","nombre","perfil","password"
    ];
    protected $hidden = [
        'password',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function setPasswordAttribute($value){
        return $this->attributes['password'] = bcrypt($value);
    }
    
}
