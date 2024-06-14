<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class restaurante extends Model
{
    use HasFactory;
    protected $table = "restaurante";
    protected $primaryKey = "idRes";
    public $timestamps = false;

    function menu(){
        return $this->belongsToMany('App\Models\platos','plato_restaurante','idRes','idPla');
    }
}
