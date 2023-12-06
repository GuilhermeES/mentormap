<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('home.index');
});

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    // Rota para /dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // Rota para /dashboard/gerenciar
    Route::get('/gerenciar', [DashboardController::class, 'gerenciar'])->name('gerenciar');
});

/*
Route::middleware(['auth'])->group(function () {
    // Rota para /dashboard
    Route::get('/dashboard', 'DashboardController@index');

    // Rota para /dashboard/gerenciar
    Route::get('/dashboard/gerenciar', 'DashboardController@gerenciar')->middleware('admin');
});

// app/Http/Middleware/AdminMiddleware.php
public function handle($request, Closure $next)
{
    if (auth()->check() && auth()->user()->isAdmin()) {
        return $next($request);
    }

    abort(403, 'Acesso não autorizado');
}

*/