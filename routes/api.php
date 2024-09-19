<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TreinoAmistosoController;
use App\Http\Controllers\API\ModalidadeController;
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

/*Controller dos Treinos e Amistosos*/
Route::get ('/treino_amistosos/listarTreinos', [TreinoAmistosoController::class, 'index']); // Rota para exibir
Route::post('/treino_amistosos/cadastrarTreino', [TreinoAmistosoController::class, 'store']); // Rota para cadastrar

Route::get ('/modalidades/ListarModalidades', [ModalidadeController::class, 'index']); // Rota para exibir
Route::post('/modalidades/cadastrarModalidade', [ModalidadeController::class, 'store']); // Rota para cadastrar
