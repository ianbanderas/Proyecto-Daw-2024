<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\restaurante;
use App\Models\ciudad;
use App\Models\usuario;
use App\Models\platos;
use Auth;



class restauranteController extends Controller
{
    function index(){return restaurante::all();}
    function index2(){return ciudad::all();}
    function index3(){return platos::all();}
    function index4(){return usuario::all();}

    function volver(){
        return Redirect::to("http://localhost:4200/");
    }

    function main ($r=null){
        if($r==null){
        $restaurante = DB::table("restaurante")->paginate(5);   
        //$restaurante = restaurante::all()->paginate(6);
        }else{
        $restaurante = $r->paginate(5);
        }
       // $x = [];
        /*
        foreach($restaurante as $valor){
            //dump($valor->menu()->get()->count());
            if ($valor->menu()->get()->count() > 0){
                array_push($x,$valor);
            }
        }
        */
        $ciudad = ciudad::all();
        $usuario = usuario::all();
        $cat = [];
        $t = restaurante::all();
        foreach ($t as $item){
            array_push($cat,$item->categoria);
        }
        if($restaurante->count() == 0){
            $mensaje = true;
            return view("restaurante/main",["restaurante"=>$restaurante,"ciudad"=>$ciudad,"usuario"=>$usuario,"cat"=>$cat,"mensaje"=>$mensaje]);
        }else{
            return view("restaurante/main",["restaurante"=>$restaurante,"ciudad"=>$ciudad,"usuario"=>$usuario,"cat"=>$cat]);
        }
        }
       
    //borrar restaurante
    function borrar(Request $req,$idTab) {

        $restaurante = restaurante::find($idTab);
        $restaurante->delete();
     
        return redirect('main');
        
    }

    //fucion add restaurante
    function add(Request $req){
       // var_dump($req->all());
       // dd(Auth::id());
       $max = $this->selectMax();
       ++$max;
       DB::table("restaurante")->insert([
        "idRes" => $max,
        "nombre" => $req->input("formRes"),
        "categoria" => $req->input("formResCat"),
        "idCiu" => $req->input("formCiu"),
        "idUsu" => Auth::id()    
       ]);

       return redirect('main');
    }

    public function selectMax() {
        $maxValue = restaurante::max('idRes');
        return $maxValue;
    }
    //funcion filtro categoria
    function cat(Request $req){
       // $restaurante = restaurante::where("categoria",$req->input("cat"));
       $restaurante = DB::table("restaurante")->where("categoria",$req->input("cat")); 
        return $this->main($restaurante);
    }

    //funcion filtro ciudad
    function ciu(Request $req){
       $restaurante = DB::table("restaurante")->where("idCiu",$req->input("ciudad")); 
       //$restaurante = restaurante::where("idCiu",$req->input("ciudad"))->get();
        return $this->main($restaurante);
    }
}
