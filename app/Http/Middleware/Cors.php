<?php

namespace App\Http\Middleware;
use Closure;
class Cors
{
  public function handle($request, Closure $next)
  {
    // if(! $request->isMethod('options')){
      return $next($request)
        //Url a la que se le dará acceso en las peticiones
        ->header("Access-Control-Allow-Origin", "*")
        //Métodos que a los que se da acceso
        ->header("Access-Control-Allow-Methods", "GET, POST, PATCH, PUT, DELETE, OPTIONS")
        //Headers de la petición
        ->header("Access-Control-Allow-Headers", "Origin, Content-Type, X-Auth-Token")
        ;
    // }
  }

  
}