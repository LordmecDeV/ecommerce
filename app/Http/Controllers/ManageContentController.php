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
        return view('ManageContent'); 
    }
}
