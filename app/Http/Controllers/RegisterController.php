<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('clientViews.userRegister');
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->cep = $request->cep;
        $user->cpf = $request->cpf;
        $user->number = $request->number;
        $user->complement = $request->complement;
        $user->reference = $request->reference;
        $user->city = $request->city;
        $user->neighborhood = $request->neighborhood;
        $user->state = $request->state;
        $user->birthdate = $request->birthdate;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->location = $request->location;
        $user->role = 'usuario'; // Define a role como "usuario" por padrão
        $user->save();

        return redirect('/login')->with('success', 'Cadastro feito com sucesso!');
    }
}
