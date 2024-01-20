<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\activity_User;
use App\Models\Calendar;
use App\Models\Fee;
use App\Models\activity_NoUser;
use App\Models\NoUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class ActividadesController extends Controller
{
    public function showActividades(){
        $actividades = Activity::paginate(4);
        return view('activities.activities', compact('actividades'));
    }


    public function showActividad($id)
    {
                // Obtener la instalación
        $actividad = Activity::findOrFail($id);

        $horasDisponibles = Calendar::where('activity_id', $id)->get();

        // Obtener tarifas como valores escalares
        $tarifaSocio = FEE::where('tipo_tarifa', 'Socio')->value('tarifa');
        $tarifaNoSocio = FEE::where('tipo_tarifa', 'No Socio')->value('tarifa');

        $precioSocio = round($actividad->precio - $actividad->precio * $tarifaSocio, 2);
        $precioNoSocio = round($actividad->precio - $actividad->precio * $tarifaNoSocio, 2);

        return view('activities.activity', compact('actividad', 'horasDisponibles', 'precioSocio', 'precioNoSocio'));
    }

    private function generarHorasTotales()
    {
        $horasTotales = [];
        $horaInicio = Carbon::createFromTime(9, 0, 0);
        $horaFin = Carbon::createFromTime(22, 0, 0);

        while ($horaInicio <= $horaFin) {
            $horasTotales[] = $horaInicio->format('H:i');
            $horaInicio->addHour();
        }

        return collect($horasTotales);
    }

    public function actividadRecepcionista(Request $request){
        DB::beginTransaction();

        try {
            // Obtener los datos del formulario
            $actividadId = $request->input('actividad_id');
            $hora = $request->input('hora');
            $nouserDNI= $request->input('dni');
            $nouserID = NoUser::where('dni', $nouserDNI)->value('id');

            if($nouserID == ""){
                $usuario = new NoUser();
                
                $usuario->nombre = $request->input('nombre');
                $usuario->apellidos = $request->input('apellidos');
                $usuario->dni = $request->input('dni');
                $usuario->email = $request->input('email');
                $usuario->save();
                $nouserID = $usuario->id;
                Log::info('NoUser creado con id: ' . $nouserID);
            }

            

            // Obtener el id del calendario
            $calendario = new Calendar();
            $calendario->fecha = Carbon::today();
            $calendario->hora = $hora;
            $calendario->save();

            // Crear la reserva
            $activityUser = new activity_NoUser();
            $activityUser->activity_id = $actividadId;
            $activityUser->calendar_id = $calendario->id;
            $activityUser->no_user_id = $nouserID;
            $activityUser->duracion = 60;
            $activityUser->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            // Manejar la excepción (por ejemplo, redirigir con un mensaje de error)
            return redirect()->route('actividad', $actividadId)->with('error', $e->getMessage());
        }

        return redirect()->route('actividades.showactividades');

    }

    public function reservaractividad(Request $request)
    {
        DB::beginTransaction();

    try {
        // Obtener los datos del formulario
        $actividadId = $request->input('actividad_id');
        $hora = $request->input('hora');
        $precioSocio = $request->input('precioSocio');
        $precioNoSocio = $request->input('precioNoSocio');
        $usuarioId = $request->input('usuario');
        $usuario = User::findOrFail($usuarioId);

        // No se efectua la reserva si el usuario no tiene saldo suficiente
        if ($usuario->saldo < ($usuario->socio ? $precioSocio : $precioNoSocio)) {
            throw new \Exception('No tienes saldo suficiente para realizar la reserva');
        }

        $usuario->saldo = $usuario->saldo - ($usuario->socio ? $precioSocio : $precioNoSocio);
        $usuario->save();

        // Obtener el id del calendario
        $calendario = new Calendar();
        $calendario->fecha = Carbon::today();
        $calendario->hora = $hora;
        $calendario->save();

        $transaccion = new Transaction();
        $transaccion->user_id = $usuario->id;
        $transaccion->importe = $usuario->socio ? $precioSocio : $precioNoSocio;
        $transaccion->fecha = Carbon::today();
        $transaccion->concepto = "Reserva de instalación con el id: " . $actividadId . " a las " . $hora . " por el usuario: " . $usuario->usuario;
        $transaccion->save();

        // Crear la reserva
        $activityUser = new activity_User();
        $activityUser->activity_id = $actividadId;
        $activityUser->calendar_id = $calendario->id;
        $activityUser->user_id = $usuario->id;
        $activityUser->duracion = 60;
        $activityUser->save();

        DB::commit();
    } catch (\Exception $e) {
        DB::rollBack();

        // Manejar la excepción (por ejemplo, redirigir con un mensaje de error)
        return redirect()->route('actividad', $actividadId)->with('error', $e->getMessage());
    }

    // Redirigir a la página de actividades
    return redirect()->route('actividades.showactividades');
    }
}

