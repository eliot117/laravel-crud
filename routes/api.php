<?php

use App\Http\Controllers\Api\ArticulosController;
use App\Http\Controllers\Api\ClientesController;
use App\Http\Controllers\Api\FacturasController;
use App\Http\Controllers\Api\PedidosController;
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


Route::apiResource("articulos", ArticulosController::class);
Route::apiResource("clientes", ClientesController::class);
Route::apiResource("facturas", FacturasController::class);
Route::apiResource("pedidos", PedidosController::class);
