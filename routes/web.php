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
use App\Http\Controllers\TestsController;
use App\Http\Controllers\ForgetPassword;

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

Route::get('/recuperar-senha', [ForgetPassword::class, 'index'])->name('recuperar-senha');
Route::post('/recuperar-senha', [ForgetPassword::class, 'forgetPasswordPost'])->name('recuperar-senha.post');

Route::get('/resetar-senha/{token}', [ForgetPassword::class, 'resetPassword'])->name('reset-password');
Route::post('/resetar-senha', [ForgetPassword::class, 'resetPasswordPost'])->name('reset-password.post');

Route::prefix('dashboard')->middleware(['auth'])->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::get('/gerenciar', [GerenciarController::class, 'index'])->middleware(['admin'])->name('gerenciar');
    Route::get('/usuarios', [UsersController::class, 'showAllUsers'])->middleware(['admin'])->name('usuarios');

    Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');
    Route::post('/alterar-senha', [PerfilController::class, 'changePassword'])->name('senha');
    Route::post('/alterar-dados', [PerfilController::class, 'changeData'])->name('dados');

    Route::get('/gerenciar-testes', [TestsController::class, 'index'])->middleware(['admin'])->name('gerenciar-testes');
    Route::get('/gerenciar-testes/novo', [TestsController::class, 'create'])->middleware(['admin'])->name('novo-teste');
    Route::post('/gerenciar-testes/novo', [TestsController::class, 'store'])->middleware(['admin'])->name('salvar-teste');
    Route::get('/gerenciar-testes/editar/{id}', [TestsController::class, 'edit'])->middleware(['admin'])->name('editar-teste');
    Route::post('/gerenciar-testes/{id}/update}', [TestsController::class, 'update'])->middleware(['admin'])->name('update-teste');
    Route::delete('/gerenciar-testes/{id}', [TestsController::class, 'deleteTeste'])->middleware(['admin'])->name('delete-teste');
    
    Route::get('/gerenciar-resultados', [TestsController::class, 'indexResultado'])->middleware(['admin'])->name('gerenciar-resultados');
    Route::get('/gerenciar-resultados/novo', [TestsController::class, 'createResultadoScreen'])->middleware(['admin'])->name('novo-resultado');
    Route::post('/gerenciar-resultados/novo', [TestsController::class, 'createResultado'])->middleware(['admin'])->name('salvar-resultado');
    Route::get('/gerenciar-resultados/editar/{id}', [TestsController::class, 'editResultado'])->middleware(['admin'])->name('editar-resultado');
    Route::delete('/gerenciar-resultados/{id}', [TestsController::class, 'deleteResult'])->middleware(['admin'])->name('delete-resultado');

    Route::get('/testes', [TestsController::class, 'indexUser'])->name('testes');
    Route::get('/testes/realizar/{id}', [TestsController::class, 'realizarTest'])->name('realizar-testes');
    Route::post('/save-respostas', [TestsController::class, 'salvarRespostas'])->name('salvar-respostas');

    Route::get('/resultados', [TestsController::class, 'indexResultados'])->name('resultados');
    Route::get('/resultado', [TestsController::class, 'resultadoScreen'])->name('resultado');

});

Route::post('/site/{id?}', [GerenciarController::class, 'storeOrUpdate'])->middleware(['admin'])->name('gerenciar.storeOrUpdate');
Route::post('/enviar-email', [ContatoController::class, 'enviarEmail'])->name('enviar.email');