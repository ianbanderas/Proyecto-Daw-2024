<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\restaurante;
use App\Models\ciudad;
use App\Models\usuario;
use App\Models\platos;
use Auth;

class menuController extends Controller
{
    function main ($idRes,$p=null){
       /* if($p==null){
            $platos = DB::table("plato")->where()->paginate(4);   
            //$restaurante = restaurante::all()->paginate(6);
            }else{
            $platos = $p->paginate(4);
            }*/
           // $platos = restaurante::where("idRes", "=", $idRes )->paginate(3);
        $platos = restaurante::find($idRes)->menu()->paginate(3);
        
        $restaurante = restaurante::find($idRes)->nombre;

        return view("menu/index",["platos"=>$platos,"idRes"=>$idRes,"restaurante"=>$restaurante]);
    }

    function add (Request $req){
        $idRes = intval($req->input("idRes"));
        $max = $this->selectMax();
        $formComentario = $req->input("com");
        $formValoracion = $req->input("val");
       ++$max;
       DB::table("plato")->insert([
        "idPla" => $max,
        "nombre" => $req->input("name"),
        "descripcion" => $req->input("desc"),
       ]);
       $plato = platos::find($max);
       restaurante::find($idRes)->menu()->attach($max,["valoracion"=>$formValoracion
       ,"comentario"=>$formComentario]);
       return redirect()->route("menu",["idRes"=>$idRes]);

    }

    public function selectMax() {
        $maxValue = platos::max('idPla');
        return $maxValue;
    }

    function verPlato (Request $req){
        $plato = platos::find($req->input("idPla"));
        $val = $plato->menu()->first();
        $valoracion = $val->pivot->valoracion;
        $comentario = $val->pivot->comentario;
        
        return view("menu.plato",["plato"=>$plato,"valoracion"=>$valoracion,"comentario"=>$comentario,"idRes"=>$req->input("idRes")]);
    }

}
