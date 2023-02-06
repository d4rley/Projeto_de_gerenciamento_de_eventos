<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\ParticipantesController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('/evento', EventsController::class)->except('update','store','delete'); 
Route::middleware('auth:sanctum')->patch('evento/{$id}',[EventsController::class,'update']);
Route::post('evento',[EventsController::class,'store']);
Route::middleware('auth:sanctum')->delete('evento/{$id}',[EventsController::class,'delete']);

Route::post('/participantes',[ParticipantesController::class,'store']);
Route::resource('/participantes',ParticipantesController::class)->except('store');
