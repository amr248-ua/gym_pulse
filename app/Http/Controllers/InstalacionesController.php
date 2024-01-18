<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Installation;
use App\Models\Installation_User;
use App\Models\Calendar;
use App\Models\Fee;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Models\User;

class InstalacionesController extends Controller
{
    public function showInstalaciones()
    {
        $instalaciones = Installation::paginate(4);
        return view('installations.installations', compact('instalaciones'));
    }

    public function showInstalacion($id)
    {
        // Obtener la instalación
        $instalacion = Installation::findOrFail($id);

        // Obtener los installation_ids de la tabla installation_users
        $installationUserIds = Installation_User::where('installation_id', $id)->pluck('calendar_id');

        // Obtener los calendarios correspondientes a los installation_ids
        $calendars = Calendar::whereIn('id', $installationUserIds)->where('fecha', Carbon::today())->get();

        // Obtener todas las horas desde las 9:00 hasta las 22:00
        $horasTotales = $this->generarHorasTotales();

        // Obtener las horas si la fecha es la de hoy
        $horasHoy = $calendars->filter(function ($calendar) {
            $fecha = Carbon::parse($calendar->fecha);
            return $fecha->isToday();
        })->pluck('hora');

        // Ajustar formato de las horas de hoy a 24 horas
        $horasHoy = $horasHoy->map(function ($hora) {
            return Carbon::parse($hora)->format('H:i');
        });

        // Excluir las horas de hoy de las horas totales
        $horasDisponibles = $horasTotales->diff($horasHoy);

        // Obtener tarifas como valores escalares
        $tarifaSocio = FEE::where('tipo_tarifa', 'Socio')->value('tarifa');
        $tarifaNoSocio = FEE::where('tipo_tarifa', 'No Socio')->value('tarifa');

        $precioSocio = round($instalacion->precio - $instalacion->precio * $tarifaSocio, 2);
        $precioNoSocio = round($instalacion->precio - $instalacion->precio * $tarifaNoSocio, 2);

        return view('installations.installation', compact('instalacion', 'horasDisponibles', 'precioSocio', 'precioNoSocio'));
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

    public function reservarInstalacion(Request $request)
    {
        DB::beginTransaction();

    try {
        // Obtener los datos del formulario
        $instalacionId = $request->input('instalacion_id');
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
        $transaccion->concepto = "Reserva de instalación con el id: " . $instalacionId . " a las " . $hora . " por el usuario: " . $usuario->usuario;
        $transaccion->save();

        // Crear la reserva
        $installationUser = new Installation_User();
        $installationUser->installation_id = $instalacionId;
        $installationUser->calendar_id = $calendario->id;
        $installationUser->user_id = $usuario->id;
        $installationUser->duracion = 60;
        $installationUser->save();

        DB::commit();
    } catch (\Exception $e) {
        DB::rollBack();

        // Manejar la excepción (por ejemplo, redirigir con un mensaje de error)
        return redirect()->route('instalacion', $instalacionId)->with('error', $e->getMessage());
    }

    // Redirigir a la página de instalaciones
    return redirect()->route('instalaciones.showInstalaciones');
    }
}
