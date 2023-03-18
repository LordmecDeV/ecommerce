<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class InfoUserController extends Controller
{

    public function create()
    {
        return view('laravel-examples/user-profile');
    }

    public function show()
    {
        $viewAllUsers = User::latest()->paginate(15);
        return view('users', compact('viewAllUsers'));
    }

    public function viewCreateUser()
    {
        return view('viewCreateUser');
    }

    public function criarUsuario(Request $request)
    {
    $usuario = new User;
    $usuario->name = $request->input('name');
    $usuario->email = $request->input('email');
    $usuario->role = $request->input('role');
    $usuario->password = bcrypt($request->input('password'));
    $usuario->save();
    return redirect('/usuarios');
    }
}
