<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\restaurante;
use App\Models\ciudad;
use App\Models\usuario;
use Auth;

class profileController extends Controller
{
    function main (){
        $restaurante = restaurante::where("idUsu",Auth::user()->idUsu)->get();
        $ciudad = ciudad::all();
        $usuario = usuario::all();
        return view("profile/index",["restaurante"=>$restaurante,"ciudad"=>$ciudad,"usuario"=>$usuario]);
    }

    function changePass (Request $req){
        DB::table("usuario")->where("idUsu",Auth::user()->idUsu)->update(["password"=>Hash::make($req->input("changePass"))]);
        return redirect("profile");
    }
}
