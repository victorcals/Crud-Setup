<?php

use App\Http\Controllers\Api\EstudanteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('estudante', [EstudanteController::class, 'index']);
Route::post('estudante', [EstudanteController::class, 'store']);
Route::get('estudante/{id}', [EstudanteController::class, 'show']);
Route::get('estudante/{id}/editar', [EstudanteController::class, 'editar']);
Route::put('estudante/{id}/editar', [EstudanteController::class, 'update']);
Route::delete('estudante/{id}/delete', [EstudanteController::class, 'delete']);


// dois metodos que dão no mesmo local
// Route::get( /*URL */'/estudante', 'App\Http\Controllers\Api\EstudanteController@index')->name( /* vai ser a ROTA */'estudante');