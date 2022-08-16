<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnderecoController;

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

Route::controller(EnderecoController::class)->group(function () {
    Route::get('enderecos/cep', 'searchByCep');
    Route::get('enderecos/logradouro', 'searchByLogradouro');
    Route::apiResource('enderecos', EnderecoController::class);
});
