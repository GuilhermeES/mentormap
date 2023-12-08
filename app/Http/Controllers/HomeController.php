<?php

namespace App\Http\Controllers;
use App\Models\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index() {
        $site = Site::all();
        return view('index', ['site' => $site]);
    }
}
