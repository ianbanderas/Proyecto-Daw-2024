<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\restaurante;
use App\Models\ciudad;
use App\Models\usuario;
use App\Models\platos;
use Auth;


class apiController extends Controller
{
    function getRes(){return restaurante::all();}
    function getCiu(){return ciudad::all();}
    function getPla(){return platos::all();}
    function getUsu(){return usuario::all();}
    function getUsuByName($name){return usuario::where('nombre', '=', $name)->get()->first();}
    function getResByIdUsu($idUsu){return restaurante::where('idUsu', '=', $idUsu)->get();}
    function deleteResById($idRes){
        $restaurante = restaurante::find($idRes);

        $restaurante->delete();
        }
    function addPla(Request $req){
        DB::table("plato")->insert($req->input());
        return platos::latest('idPla')->first();
    }

    function addRes(Request $req){
        $restaurante = DB::table("restaurante")->insert($req->input());
        return response()->json(['message'=>"Restaurante Creado", "statusCode"=>200]);
    }

    function valPla(Request $req){
        DB::table("plato_restaurante")->insert($req->input());
    }

    function deletePlato($idPla){
        error_log($idPla);
    }


    function getMenu($idRes){
        $platos = restaurante::find($idRes)->menu()->get();
        $idUsu = restaurante::where('idRes', '=', $idRes)->get();
        
        return ['plato'=>$platos,"restaurantes"=>$idUsu];
    
    }

    function getPlato($idPla){
        $plato = platos::find($idPla);
        $val = $plato->menu()->first();
        $valoracion = $val->pivot->valoracion;
        $comentario = $val->pivot->comentario;

        return ["plato"=>$plato,"valoracion"=>$valoracion,"comentario"=>$comentario];
    }

    function getPlatoValorado($idPla, $idRes){
        $plato = platos::find($idPla);

        $valoracion = DB::table("plato_restaurante")
        ->where('idRes', '=', $idRes)
        ->where('idPla', '=', $idPla);
        $val = $valoracion->get()->first();
        $valoracion = $val->valoracion;
        $comentario = $val->comentario;
        

    return ["plato"=>$plato,"valoracion"=>$valoracion,"comentario"=>$comentario];
    }

    function changePassword(Request $req, $idUsu){
        usuario::where('idUsu', '=', $idUsu)->update(["password"=>bcrypt($req->input('password'))]);
        return response()->json(['message'=>"Cambiada contraseña", "statusCode"=>200]);
    }

    function changePlate(Request $req, $idPla){
        platos::where('idPla', '=', $idPla)->update(["nombre"=>$req->input('nombre'), "descripcion"=>$req->input('descripcion')]);
        return response()->json(['message'=>"Plato Actualizado", "statusCode"=>200]);
    }

    function changeRest(Request $req, $idRes, $idPla){
        DB::table("plato_restaurante")
        ->where('idRes', '=', $idRes)
        ->where('idPla', '=', $idPla)
        ->update([
            "valoracion"=>$req->input('valoracion'), 
            "comentario"=>$req->input('comentario'), 
    ]);
        return response()->json(['message'=>"Valoracion Actualizada", "statusCode"=>200]);
    }

    function deletePlatoValorado(Request $req, $idRes, $idPla){
        DB::table("plato_restaurante")
        ->where('idRes', '=', $idRes)
        ->where('idPla', '=', $idPla)
        ->delete();
        return response()->json(['message'=>"Se borró el plato valorado.", "statusCode"=>200]);
    }

}