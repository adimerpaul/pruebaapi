<?php

use App\Http\Controllers\ActivoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('activos',[ActivoController::class,'index']);
Route::post('activos',[ActivoController::class,'store']);
Route::put('activos/{id}',[ActivoController::class,'update']);
Route::post('darBaja',[ActivoController::class,'darBaja']);
