<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActividadesController extends Controller
{
    public function showActividades(){
        $actividades = Activity::paginate(4);
        return view('activities.activities', compact('actividades'));
    }
}
