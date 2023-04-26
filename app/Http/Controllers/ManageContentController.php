<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManageContent;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ManageContentController extends Controller
{
    
    public function index()
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            return view('ManageContent');
        } else {
            return abort(403, 'Acesso não autorizado.');
        }
    }
}
