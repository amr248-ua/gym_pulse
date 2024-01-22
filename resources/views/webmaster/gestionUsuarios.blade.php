@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <!-- Buscador -->
        <div class="col-md-4">
            <form action="{{ route('buscar_usuarios') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar usuarios" name="nombre_usuario">
                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                </div>
            </form>
        </div>

        <!-- Botón Añadir Recepcionista -->
        <div class="col-md-4 text-end">
            <button type="button" class="btn bg-dark text-white" data-toggle="modal" data-target="#crearRecepcionistaModal">Añadir Recepcionista</button>
        </div>

        <!-- Botón Añadir Usuario -->
        <div class="col-md-4 text-end">
            <button type="button" class="btn bg-dark text-white" data-toggle="modal" data-target="#crearUsuarioModal">Añadir Usuario</button>
        </div>
    </div>
    <!-- Tabla de resultados de búsqueda -->
    @if($usuarios !== null && count($usuarios) > 0)
        <div class="row mb-3">
            <div class="col-md-12">
                <h4>Resultados de la búsqueda</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-4 text-center">Nombre</th>
                            <th class="col-4 text-center">Fecha de Creación</th>
                            <th class="col-4 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td class="col-4 text-center">{{ $usuario->nombre }}</td>
                                <td class="col-4 text-center">{{ $usuario->created_at->format('Y-m-d H:i:s') }}</td>
                                <td class="col-4 text-center">
                                    @if($usuario->socio)
                                        <form action="{{ route('bloquear_usuario', ['id' => $usuario->id]) }}" method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm" style="background-color: transparent; color: red; border: none; font-size: 120%">Bloquear</button>
                                        </form>
                                    @else
                                        <form action="{{ route('desbloquear_usuario', ['id' => $usuario->id]) }}" method="post" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm" style="background-color: transparent; color: green; border: none; font-size: 120%">Desbloquear</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif


    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th class="col-4 text-center">Nombre</th>
                        <th class="col-4 text-center">Fecha de Creación</th>
                        <th class="col-4 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuariosWebmaster as $usuario)
                        <tr>
                            <td class="col-4 text-center">{{ $usuario->nombre }}</td>
                            <td class="col-4 text-center">{{ $usuario->created_at->format('Y-m-d H:i:s') }}</td>
                            <td class="col-4 text-center">
                            @if($usuario->socio)
                                <form action="{{ route('bloquear_usuario', ['id' => $usuario->id]) }}" method="post" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm" style="background-color: transparent; color: red; border: none; font-size: 120%">Bloquear</button>
                                </form>
                            @else
                                <form action="{{ route('desbloquear_usuario', ['id' => $usuario->id]) }}" method="post" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm" style="background-color: transparent; color: green; border: none; font-size: 120%">Desbloquear</button>
                                </form>
                            @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Crear Recepcionista -->
<div class="modal fade" id="crearRecepcionistaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Recepcionista</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-dark text-white p-4">
                <form method="post" action="{{ route('crear_recepcionista') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuario:</label>
                        <input type="text" name="usuario" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña:</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Añadir Recepcionista</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Crear Usuario -->
<div class="modal fade" id="crearUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card bg-dark text-white">
                <form method="POST" action="{{ route('crear_socio') }}" class="p-4">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <label for="username" class="col-form-label">{{ __('Usuario') }}</label>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h4>Datos del usuario</h4>
                            <label for="name" class="col-form-label">{{ __('Nombre') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <label for="birthday" class="col-form-label">{{ __('Cumpleaños') }}</label>
                            <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday">

                            <label for="email" class="col-form-label">{{ __('Correo Electrónico') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <label for="password" class="col-form-label">{{ __('Contraseña') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <h4>&nbsp;</h4>
                            <label for="last_name" class="col-form-label">{{ __('Apellidos') }}</label>
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">

                            <label for="phone" class="col-form-label">{{ __('Teléfono') }}</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                            <label for="email_confirmation" class="col-form-label">{{ __('Confirmar Correo Electrónico') }}</label>
                            <input id="email_confirmation" type="email" class="form-control" name="email_confirmation" required autocomplete="email">

                            <label for="password-confirm" class="col-form-label">{{ __('Repetir Contraseña') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h4>Datos del domicilio</h4>
                            <label for="dni" class="col-form-label">{{ __('DNI') }}</label>
                            <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" required autocomplete="dni">
                        </div>

                        <div class="col-md-6">
                            <h4>&nbsp;</h4>
                            <label for="address" class="col-form-label">{{ __('Dirección') }}</label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="postal_code" class="col-form-label">{{ __('Código Postal') }}</label>
                            <input id="postal_code" type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ old('postal_code') }}" required autocomplete="postal_code">
                        </div>

                        <div class="col-md-6">
                            <!-- Agrega aquí el captcha según tus necesidades -->
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-danger">
                                {{ __('Apuntar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
