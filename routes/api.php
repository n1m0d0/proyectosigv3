<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\SocietyController;
use App\Http\Controllers\ApiRegisterPersonController;
use App\Http\Controllers\ApiRegisterInstitutionController;

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

Route::post('login', [ApiAuthController::class, "login"]);
Route::post('logout', [ApiAuthController::class, "logout"])->middleware('auth.jwt');

Route::get('persona', [ApiRegisterPersonController::class, "index"]);
Route::post('registro-persona', [ApiRegisterPersonController::class, "store"]);
Route::get('sociedades', [SocietyController::class, "index"]);
Route::post('registro-empresa', [ApiRegisterInstitutionController::class, "store"]);