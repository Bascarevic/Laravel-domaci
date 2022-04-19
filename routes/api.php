<?php

use App\Http\Controllers\AuthControler;
use App\Http\Controllers\AutorControler;
use App\Http\Controllers\KnjigaAutorControler;
use App\Http\Controllers\KnjigaControler;
use App\Http\Resources\KnjigaResource;
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

Route::post('/register', [AuthControler::class, 'register']);
Route::post('/login', [AuthControler::class, 'login']);

Route::get('knjige.autor/{id}', [KnjigaAutorControler::class, 'index']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('/knjige', KnjigaAutorControler::class)->only(['store', 'update', 'destroy']);
    Route::resource('/autori', AutorControler::class)->only(['destroy']);
    Route::post('/logout', [AuthControler::class, 'logout']);
});
Route::resource('/knjige', KnjigaControler::class)->only(['index']);
Route::get('knjige/{id}', [KnjigaControler::class, 'show']);
Route::resource('/autori', AutorControler::class)->only(['index']);
