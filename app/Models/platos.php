<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class platos extends Model
{
    use HasFactory;
    protected $table = "plato";
    protected $primaryKey = "idPla";
    public $timestamps = false;
    
    function menu(){
        return $this->belongsToMany('App\Models\restaurante','plato_restaurante','idPla','idRes')->withPivot(["valoracion","comentario"]);
    }
}


