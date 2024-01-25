<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NoUser;
use App\Models\Installation;
use App\Models\Activity;
use App\Models\Fee;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function showDatos($id){
        return view('perfil');
    }

    public function actualizarDatosView($id){
        return view('modPerfil');
    }

    public function showSolicitudes(Request $request){
        $usuariosNoAprobados = User::where('socio', false);

        if ($request->has('nombre_usuario')) {
            $usuariosNoAprobados->where(function ($query) use ($request) {
                $query->where('nombre', 'like', '%' . $request->input('nombre_usuario') . '%')
                    ->orWhere('apellidos', 'like', '%' . $request->input('nombre_usuario') . '%')
                    ->orWhere('usuario', 'like', '%' . $request->input('nombre_usuario') . '%');
            });
        }
    
        $usuariosNoAprobados = $usuariosNoAprobados->paginate(10);
    
        return view('webmaster.solicitudes', compact('usuariosNoAprobados'));
    }

    public function showUsuariosWebmaster(){
        $usuariosWebmaster = User::query();
        $usuarios = null;
        $usuariosWebmaster = $usuariosWebmaster->paginate(10);
    
        return view('webmaster.gestionUsuarios', compact('usuariosWebmaster', 'usuarios'));
    }

    public function recepcionistaView(){
        return view('recepcionist');
    }

    public function recepcionistaInsView(){
        return view('receptionistIns');
    }

    public function recepcionistaInsViewInstalacion(){
        $instalaciones = Installation::all();
        $actividades = Activity::all();
        $tarifas = Fee::all();
        return view('receptionistIns', ['instalaciones' => $instalaciones, 'actividades' => $actividades, 'tarifas' => $tarifas]);
    }
    

    public function actualizarPrecioIns($id, Request $request){
        $instalacion = Installation::findOrFail($id);
        $instalacion->precio = $request->input('precio_socio');
        $instalacion->save();

        return redirect()->back()->with('success', 'Precio actualizado correctamente');
    }

    public function actualizarPrecioAct($id, Request $request){
        $actividad = Activity::findOrFail($id);
        $actividad->precio = $request->input('precio_socio');
        $actividad->save();

        return redirect()->back()->with('success', 'Precio actualizado correctamente');
    }

    public function actualizarPrecioFee($id, Request $request){
        $tarifa = Fee::findOrFail($id);
        $tarifa->tarifa = $request->input('tarifa');
        $tarifa->save();

        return redirect()->back()->with('success', 'Precio actualizado correctamente');
    }

    public function actualizarDatos(Request $request, $id) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'email' => 'required|email',
            'dni' => 'required|string|max:10',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:5',
        ]);

        $usuario = Auth::user();
        $usuario->nombre = $request->input('nombre');
        $usuario->apellidos = $request->input('apellidos');
        $usuario->fecha_nacimiento = $request->input('fecha_nacimiento');
        $usuario->email = $request->input('email');
        $usuario->dni = $request->input('dni');
        $usuario->direccion = $request->input('direccion');
        $usuario->telefono = $request->input('telefono');
        $usuario->codigo_postal = $request->input('codigo_postal');
        $usuario->save();

        return redirect()->route('perfil', ['id' => Auth::user()->id])->with('success', 'Perfil actualizado con éxito');
    }

    public function buscarUsuario(Request $request){
        $usuarios = User::query();

        if ($request->has('nombre_usuario')) {
            $usuarios->where('nombre', 'like', '%' . $request->input('nombre_usuario') . '%')
                ->orWhere('apellidos', 'like', '%' . $request->input('nombre_usuario') . '%')
                ->orWhere('usuario', 'like', '%' . $request->input('nombre_usuario') . '%');
        }

        $usuarios = $usuarios->paginate(10);

        return view('recepcionist', compact('usuarios'));
    }

    public function buscarUsuarioWebmaster(Request $request)
    {
        $nombreUsuario = $request->input('nombre_usuario');
    
        // Obtener todos los usuarios
        $usuarios = User::query();
    
        // Aplicar la búsqueda si se proporciona un nombre de usuario
        if ($nombreUsuario) {
            $usuarios->where(function ($query) use ($nombreUsuario) {
                $query->where('nombre', 'like', '%' . $nombreUsuario . '%')
                    ->orWhere('apellidos', 'like', '%' . $nombreUsuario . '%')
                    ->orWhere('usuario', 'like', '%' . $nombreUsuario . '%');
            });
        }
    
        // Paginar los resultados
        $usuarios = $usuarios->paginate(10);
    
        // Obtener todos los usuarios webmaster (opcional)
        $usuariosWebmaster = $this->showUsuariosWebmaster()['usuariosWebmaster'];
    
        return view('webmaster.gestionUsuarios', compact('usuarios', 'usuariosWebmaster'));
    }
    

    public function actualizarSaldo(Request $request, $id){
        $user = User::findOrFail($id);

        $request->validate([
            'saldo_actual' => 'required|numeric',
        ]);

        $user->saldo = $request->input('saldo_actual');
        $user->save();

        return redirect()->back()->with('success', 'Saldo actualizado correctamente.');
    }

    public function aprobarUsuario($id){
        $usuario = User::findOrFail($id);
        $usuario->update(['socio' => true]);

        return redirect()->back()->with('success', 'Usuario aprobado exitosamente.');
    }

    public function denegarUsuario($id){
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->back()->with('success', 'Usuario denegado y eliminado exitosamente.');
    }

    public function bloquearUsuario($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->socio = false;
        $usuario->save();

        return redirect()->back();
    }

    public function desbloquearUsuario($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->socio = true;
        $usuario->save();

        return redirect()->back();
    }

    public function crearRecepcionista(Request $request)
    {
        $request->validate([
            'usuario' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crea el usuario con el atributo 'recepcionista' establecido en true
        $user = User::create([
            'nombre' => $request['usuario'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'fecha_nacimiento' => "2024-01-01",
            'apellidos' =>"",
            'telefono' => 000000000,
            'dni' => Str::random(9),
            'direccion' => "GymPulse",
            'codigo_postal' => "00000",
            'usuario' => $request['usuario'], 
            'recepcionista'=>true,
            'socio'=>true,
        ]);

        return redirect()->back();
    }

    public function crearSocio(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'birthday' => 'required|date',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:10',
            'email_confirmation' => 'required|string|email|max:255|same:email',
            'password_confirmation' => 'required|string|min:8|same:password',
            'dni' => 'required|string|max:9',
            'address' => 'required|string|max:255',
            'postal_code' => 'required|string|max:5',
            'username' => 'required|string|max:255',                                 
        ]);

        // Crea el usuario con el atributo 'recepcionista' establecido en true
        $user = User::create([
            'nombre' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'fecha_nacimiento' => $request['birthday'],
            'apellidos' => $request['last_name'],
            'telefono' => $request['phone'],
            'dni' => $request['dni'],
            'direccion' => $request['address'],
            'codigo_postal' => $request['postal_code'],
            'usuario' => $request['username'],            
            'socio'=>true,
        ]);

        return redirect()->back();
    }

    public function showTransactions($id){
        $transacciones = Transaction::where("user_id", $id)->paginate(5);
        
        return view('transacciones', compact('transacciones'));
    }
    
}
