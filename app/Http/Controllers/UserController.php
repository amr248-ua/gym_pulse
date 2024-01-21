<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Installation;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showDatos($id){
        return view('perfil');
    }

    public function actualizarDatosView($id){
        return view('modPerfil');
    }

    public function recepcionistaView(){
        return view('recepcionist');
    }

    public function recepcionistaInsView(){
        return view('receptionistIns');
    }

    public function recepcionistaInsViewInstalacion(){
        $instalaciones = Installation::all();
        return view('receptionistIns', ['instalaciones' => $instalaciones]);
    }

    public function actualizarPrecio($id, Request $request){
        $instalacion = Installation::findOrFail($id);
        $instalacion->precio = $request->input('precio_socio');
        $instalacion->save();

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

    public function actualizarSaldo(Request $request, $id){
        $user = User::findOrFail($id);

        $request->validate([
            'saldo_actual' => 'required|numeric',
        ]);

        $user->saldo = $request->input('saldo_actual');
        $user->save();

        return redirect()->back()->with('success', 'Saldo actualizado correctamente.');
    }
}
