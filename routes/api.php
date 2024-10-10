<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ReservasController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

/*Controller das Reservas*/
Route::get ('/reservas/enviarReservas', [ReservasController::class, 'index']); // Rota que manda os dados das reservas
Route::post('/reservas/cadastrarReserva', [ReservasController::class, 'store']); // Rota para cadastrar uma reserva
