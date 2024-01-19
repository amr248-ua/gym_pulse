<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showDatos($id){
        return view('perfil');
    }

    public function actualizarDatosView($id){
        return view('modPerfil');
    }
    
    public function actualizarDatos(Request $request, $id) {
        // Validar los datos del formulario
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

        // Actualizar el usuario
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
}
