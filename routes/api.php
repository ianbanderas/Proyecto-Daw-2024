<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\restauranteController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\apiController;
use App\Http\Controllers\menuController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['cors']], function () {
  
    Route::post('plato',[apiController::class, "addPla"]);
    Route::post('valorar',[apiController::class, "valPla"]);
    Route::post('restaurante',[apiController::class, "addRes"]);

    Route::put('password/{idUsu}', [apiController::class, "changePassword"]);
    Route::put('plato/{idPla}', [apiController::class, "changePlate"]);
    Route::put('restaurante/{idRes}/{idPla}', [apiController::class, "changeRest"]);
    
    Route::delete('plato/{idPla}', [apiController::class, "deletePlato"]);
  
    Route::get('restaurante', [apiController::class,'getRes']);
    Route::get('restaurante/{idUsu}', [apiController::class,'getResByIdUsu']);
    Route::get('restaurante/borrar/{idRes}', [apiController::class,'deleteResById']);//deleteResById
    Route::get('ciudad', [apiController::class,'getCiu']);
    Route::get('platos', [apiController::class,'getPla']);
    Route::get('usuario', [apiController::class,'getUsu']);
    Route::get('usuario/{name}', [apiController::class,'getUsuByName']);
  
    Route::get('_menu/{idRes}',[apiController::class,"getMenu"]);
    Route::get('plato/{idPla}/{idRes}',[apiController::class,"getPlatoValorado"]);
    Route::get('plato/{idPla}',[apiController::class,"getPlato"]);
    Route::delete('plato/{idRes}/{idPla}',[apiController::class,"deletePlatoValorado"]);
    
  });

// Route::group(['middleware' => ['auth:api']], function () {

  Route::post('signup',[AuthController::class,'signup']);
  Route::post('login',[AuthController::class,'login']);
// Route::post('loginApi',[AuthController::class,'loginApi']);
// });
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
