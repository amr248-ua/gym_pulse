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

    public function listadoActividades()
    {
        $actividades = Activity::paginate(4);
        return view('activities.actividadesWebmaster', compact('actividades'));
    }

    public function nuevaActividad(Request $request)
    {
        $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nombre' => 'required|string|max:255',
            'plazas' => 'required|integer|min:1',
            'descripcion' => 'required|string|max:255',
            'duracion' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
        ]);


        // Obtener el archivo de la solicitud
        $imagen = $request->file('imagen');

        // Generar un nombre único para la imagen
        $nombreImagen = time() . '_' . $imagen->getClientOriginalName();

        // Mover la imagen al directorio
        $imagen->move(public_path('img/actividades'), $nombreImagen);

        $actividad = new Activity();
        $actividad->nombre = $request->input('nombre');
        $actividad->plazas = $request->input('plazas');
        $actividad->descripcion = $request->input('descripcion');
        $actividad->duracion = $request->input('duracion');
        $actividad->precio = $request->input('precio');
        $actividad->imagen = 'img/actividades/' . $nombreImagen;
        $actividad->save();

        return redirect()->back()->with('success', 'Imagen subida exitosamente.');
    }

    public function actualizarActividad(Request $request, $id)
    {
        $request->validate([
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'nombre' => 'required|string|max:255',
            'plazas' => 'required|integer|min:1',
            'descripcion' => 'required|string|max:255',
            'duracion' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
        ]);

        $actividad = Activity::findOrFail($id);

        // Obtener el archivo de la solicitud
        $imagen = $request->file('imagen');

        if ($imagen) {
            // Generar un nombre único para la imagen
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();

            // Mover la imagen al directorio
            $imagen->move(public_path('img/actividades'), $nombreImagen);

            $actividad->imagen = 'img/actividades/' . $nombreImagen;
        }

        $actividad->nombre = $request->input('nombre');
        $actividad->plazas = $request->input('plazas');
        $actividad->descripcion = $request->input('descripcion');
        $actividad->duracion = $request->input('duracion');
        $actividad->precio = $request->input('precio');
        $actividad->save();

        return redirect()->back()->with('success', 'Imagen subida exitosamente.');
    }


    public function showActividad($id)
    {
                // Obtener la instalación
        $actividad = Activity::findOrFail($id);

        $calendars = Calendar::where('activity_id', $id)->get();

        // Obtener los activity_ids de la tabla activity_users
        $activityUserIds = Activity_User::where('activity_id', $id)->pluck('calendar_id');
        $activityNoUserIds = Activity_NoUser::where('activity_id', $id)->pluck('calendar_id');
        $reservas = $activityUserIds->merge($activityNoUserIds);
        Log::info('Reservas: ' . $reservas);

        $minCoincidencias = $actividad->plazas;

        $filteredCalendars = $reservas->countBy(function ($calendarId) {
            return $calendarId;
        })->filter(function ($count) use ($minCoincidencias) {
            return $count >= $minCoincidencias;
        })->keys();

        Log::info('Calendarios filtrados: ' . $filteredCalendars);

        $calendarsFiltrados = Calendar::whereIn('id', $filteredCalendars)->get();
        $calendars = $calendars->diff($calendarsFiltrados);
        // Obtener tarifas como valores escalares
        $tarifaSocio = FEE::where('tipo_tarifa', 'Socio')->value('tarifa');
        $tarifaNoSocio = FEE::where('tipo_tarifa', 'No Socio')->value('tarifa');

        $precioSocio = round($actividad->precio - $actividad->precio * $tarifaSocio, 2);
        $precioNoSocio = round($actividad->precio - $actividad->precio * $tarifaNoSocio, 2);

        return view('activities.activity', compact('actividad', 'calendars', 'precioSocio', 'precioNoSocio'));
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
            $calendario = Calendar::findOrFail($hora);

            // Crear la reserva
            $activityUser = new activity_NoUser();
            $activityUser->activity_id = $actividadId;
            $activityUser->calendar_id = $calendario->id;
            $activityUser->no_user_id = $nouserID;
            $activityUser->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            // Manejar la excepción (por ejemplo, redirigir con un mensaje de error)
            return redirect()->route('actividad', $actividadId)->with('error', $e->getMessage());
        }

        return redirect()->route('actividades.showActividades');

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
        $calendario = Calendar::findOrFail($hora);

        $transaccion = new Transaction();
        $transaccion->user_id = $usuario->id;
        $transaccion->importe = $usuario->socio ? $precioSocio : $precioNoSocio;
        $transaccion->fecha = Carbon::today();
        $transaccion->concepto = "Reserva de la actividad con el id: " . $actividadId . " a las " . $calendario->hora . "del" . $calendario->fecha . " por el usuario: " . $usuario->usuario;
        $transaccion->save();

        // Crear la reserva
        $activityUser = new activity_User();
        $activityUser->activity_id = $actividadId;
        $activityUser->calendar_id = $calendario->id;
        $activityUser->user_id = $usuario->id;
        $activityUser->save();

        DB::commit();
    } catch (\Exception $e) {
        DB::rollBack();

        // Manejar la excepción (por ejemplo, redirigir con un mensaje de error)
        return redirect()->route('actividad', $actividadId)->with('error', $e->getMessage());
    }

    // Redirigir a la página de actividades
    return redirect()->route('actividades.showActividades');
    }

    public function eliminarActividad($id)
    {
        $actividad = Activity::findOrFail($id);
        $actividad->delete();

        return redirect()->route('actividadesWebmaster.showActividadesWebmaster');
    }
}

