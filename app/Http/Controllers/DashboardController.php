<?php

namespace App\Http\Controllers;
use App\Models\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index() {
        return view('dashboard.index');
    }

    public function usuarios() {
        return view('dashboard.usuarios');
    }

    public function gerenciar() {
        $registros = Site::all();
        return view('dashboard.gerenciar', ['registros' => $registros]);
    }
}
