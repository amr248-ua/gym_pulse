<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Installation;
use App\Models\Installation_User;
use App\Models\Calendar;
use Carbon\Carbon;

class InstalacionesController extends Controller
{
    public function showInstalaciones(){
        $instalaciones = Installation::paginate(4);
        return view('installations.installations', compact('instalaciones'));
    }

    public function showInstalacion($id){
       // Obtener la instalación
    $instalacion = Installation::findOrFail($id);

    // Obtener los installation_ids de la tabla installation_users
    $installationUserIds = Installation_User::where('installation_id', $id)->pluck('calendar_id');

    // Obtener los calendarios correspondientes a los installation_ids
    $calendars = Calendar::whereIn('id', $installationUserIds)->where('fecha', Carbon::today())->get();

    // Obtener las horas si la fecha es la de hoy
     // Obtener las horas si la fecha es la de hoy
     $horasHoy = $calendars->filter(function ($calendar) {
        $fecha = Carbon::parse($calendar->fecha);
        return $fecha->isToday();
    })->pluck('hora');

    return view('installations.installation', compact('instalacion', 'horasHoy'));
    }
}
