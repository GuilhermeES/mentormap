<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\RegisterController;

/* ------- Dashboard Controllers ---------- */
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\GerenciarController;
use App\Http\Controllers\PerfilController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',  [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-post', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/cadastro', [RegisterController::class, 'index'])->name('cadastro');
Route::post('/cadastro-user', [RegisterController::class, 'register'])->name('cadastro.user');

Route::prefix('dashboard')->middleware(['auth'])->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::get('/gerenciar', [GerenciarController::class, 'index'])->middleware(['admin'])->name('gerenciar');
    Route::get('/usuarios', [UsersController::class, 'showAllUsers'])->middleware(['admin'])->name('usuarios');

    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');
    Route::post('/alterar-senha', [PerfilController::class, 'changePassword'])->name('senha');
    Route::post('/alterar-dados', [PerfilController::class, 'changeData'])->name('dados');
});

Route::post('/site/{id?}', [GerenciarController::class, 'storeOrUpdate'])->middleware(['admin'])->name('gerenciar.storeOrUpdate');
Route::post('/enviar-email', [ContatoController::class, 'enviarEmail'])->name('enviar.email');