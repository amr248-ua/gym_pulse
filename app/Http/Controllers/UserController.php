<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showDatos($id){
        return view('perfil');
    }

    public function actualizarDatos($id){
        return view('modPerfil');
    }
}
