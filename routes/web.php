<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Importo Controller
 */
use \App\Http\Controllers\EventController;

/**
 * Passo o EventController como parâmetro e informo o método do controller que será
 * usado nessa rota
 */
Route::get('/', [EventController::class, 'index']);

/**
 * Antes de executar o redirecionamento, verifico se há algum usuário autenticado
 */
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');

/**
 * Para o metodo post crio a rota e passo o método store do controller onde vai ter toda 
 * lógica de adição dos dados
 */
Route::post('/events', [EventController::class, 'store']);

Route::get('events/{id}', [EventController::class, 'show']);

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [EventController::class, 'dashboard'])->name('dashboard');
});
