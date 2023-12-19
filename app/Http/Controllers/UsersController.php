<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function showAllUsers(Request $request)
    {
        $search = $request->input('search');
        $order = $request->input('order', 'default'); // Adicionando um novo parâmetro para a ordenação
    
        $query = User::query()->where('admin', 0);
    
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        
        if ($order === 'alphabetical') {
            $query->orderBy('name');
        }
        else{
            $query->orderBy('created_at', 'desc');
        }

        $users = $query->paginate(10);
    
        return view('dashboard.usuarios', ['users' => $users, 'search' => $search, 'order' => $order]);
    }
}   
