<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class InfoUserController extends Controller
{
    public function show()
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            $viewAllUsers = User::latest()->paginate(15);
            return view('users', compact('viewAllUsers'));
        } else {
            return abort(403, 'Acesso não autorizado.');
        }  
    }

    public function viewCreateUser()
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            return view('viewCreateUser');
        } else {
            return abort(403, 'Acesso não autorizado.');
        }
    }

    public function criarUsuario(Request $request)
    {
        $usuario = new User;
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->role = 'Usuário';
        $usuario->password = bcrypt($request->input('password'));
        $usuario->save();
        return redirect('/usuarios');
    }
}
