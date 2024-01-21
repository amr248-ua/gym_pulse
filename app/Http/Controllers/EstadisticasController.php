<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

// app/Http/Controllers/EstadisticasController.php

use App\Models\User;
use App\Models\Activity;
use App\Models\Installation;
use App\Models\Activity_User;
use App\Models\Installation_User;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class EstadisticasController extends Controller
{
    public function index()
    {
        $usersByDay = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
        ->whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)  // Agregamos esta condición para el año actual
        ->groupBy('date')
        ->orderBy('date')
        ->get();

        $totalRegistradosEsteMes = User::whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->count();

        $reservasPorActividad = Activity_User::select('activities.nombre as actividad', DB::raw('COUNT(*) as cantidad'))
        ->join('activities', 'activity__users.activity_id', '=', 'activities.id')
        ->whereMonth('activity__users.created_at', now()->month) // Este mes
        ->groupBy('activity__users.activity_id', 'activities.nombre')
        ->orderBy('actividad')
        ->get();

         $totalReservasEsteMes = Activity_User::whereMonth('created_at', now()->month) // Este mes
        ->count();

        $reservasPorInstalacion = Installation_User::select('installations.nombre as instalacion', DB::raw('COUNT(*) as cantidad'))
        ->join('installations', 'installation__users.installation_id', '=', 'installations.id')
        ->whereMonth('installation__users.created_at', now()->month) // Este mes
        ->groupBy('installation__users.installation_id', 'installations.nombre')
        ->orderBy('instalacion')
        ->get();

        $totalReservasEsteMesI = Installation_User::whereMonth('created_at', now()->month) // Este mes
        ->count();

    return view('estadisticas.index', compact('usersByDay', 'totalRegistradosEsteMes','reservasPorActividad', 'totalReservasEsteMes', 'reservasPorInstalacion', 'totalReservasEsteMesI'));

    }
}
