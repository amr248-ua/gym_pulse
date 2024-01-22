@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 style="padding-left:5%">Solicitudes de registro</h1>
        @if ($usuariosNoAprobados->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th class="col-4 text-center">Nombre</th>
                    <th class="col-4 text-center">Fecha de Creación</th>
                    <th class="col-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuariosNoAprobados as $usuario)
                    <tr>
                        <td class="col-4 text-center">
                            <span @if($usuario->bloqueado) style="text-decoration: line-through; color: red;" @endif>
                                {{ $usuario->nombre }}
                            </span>
                        </td>
                        <td class="col-4 text-center">{{ $usuario->created_at->format('Y-m-d H:i:s') }}</td>
                        <td class="col-4 text-center">
                            <!-- Botón de detalles -->
                            <button type="button" style="background-color: transparent; color: grey; border: none; font-size: 120%" data-toggle="modal" data-target="#exampleModal{{ $usuario->id }}">Ver Detalles</button>
                            
                            <!-- Botón de aceptar -->
                            <form action="{{ route('aprobar_usuario', ['id' => $usuario->id]) }}" method="post" class="d-inline">
                                @csrf
                                <button type="submit" style="background-color: transparent; color: green; border: none; font-size: 120%">Aceptar</button>
                            </form>
                            
                            <!-- Botón de denegar -->
                            <form action="{{ route('denegar_usuario', ['id' => $usuario->id]) }}" method="post" class="d-inline">
                                @csrf
                                <button type="submit" style="background-color: transparent; color: red; border: none; font-size: 120%">Denegar</button>
                            </form>

                            <!-- Modal Detalles -->
                            <div class="modal fade" id="exampleModal{{ $usuario->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detalles del usuario</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Detalles del usuario -->
                                            <div class="col-md-12 text-center">
                                            <p><strong>Nombre:</strong> {{ $usuario->nombre }}</p>
                                            <p><strong>Apellidos:</strong> {{ $usuario->apellidos }}</p>
                                            <p><strong>Código Postal:</strong> {{ $usuario->codigo_postal }}</p>
                                            <p><strong>Dirección:</strong> {{ $usuario->direccion }}</p>
                                            <p><strong>Fecha de Nacimiento:</strong> {{ $usuario->fecha_nacimiento }}</p>
                                            <p><strong>Teléfono:</strong> {{ $usuario->telefono }}</p>
                                            <p><strong>DNI:</strong> {{ $usuario->dni }}</p>
                                            <p><strong>Email:</strong> {{ $usuario->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $usuariosNoAprobados->links() }}
        @else
            <p>No existen solicitudes pendientes.</p>
        @endif
    </div>

@endsection

