<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Installation;

class InstalacionesController extends Controller
{
    public function showInstalaciones(){
        $instalaciones = Installation::paginate(4);
        return view('installations.installations', compact('instalaciones'));
    }
}
