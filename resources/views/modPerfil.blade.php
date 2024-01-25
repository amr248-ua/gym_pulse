@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="height: 75vh; background-color: #000; color: #fff; margin-bottom: 200px; border-radius: 15px; padding: 20px;">
            <div style="margin-bottom: 20px;">
                <h1>Modificar datos personales</h1>
            </div>

            <form method="POST" action="{{ route('perfil.actualizarDatos', ['id' => Auth::user()->id]) }}" style="background-color: #fff; padding: 20px; border-radius: 10px; color: #000;">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Columna izquierda -->
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input style="width: 150%;" type="text" class="form-control" id="nombre" name="nombre" value="{{ Auth::user()->nombre }} ">
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input style="width: 150%;" type="text" class="form-control" id="apellidos" name="apellidos" value="{{ Auth::user()->apellidos }}">
                        </div>
                        <div class="mb-3">
                            <label for="fecha_nacimiento" class="form-label">Fecha nacimiento</label>
                            <input style="width: 150%;" type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ Auth::user()->fecha_nacimiento }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input style="width: 150%;" type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email}}">
                        </div>
                    </div>

                    <!-- Columna derecha -->
                    <div class="col-md-4" style="margin-left: 100px;">
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input style="width: 150%;" type="text" class="form-control" id="telefono" name="telefono" value="{{ Auth::user()->telefono }}">
                        </div>
                        <div class="mb-3">
                            <label for="dni" class="form-label">DNI</label>
                            <input style="width: 150%;" type="text" class="form-control" id="dni" name="dni" value="{{ Auth::user()->dni }}">
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input style="width: 150%;" type="direccion" class="form-control" id="direccion" name="direccion" value="{{ Auth::user()->direccion }}">
                        </div>
                        <div class="mb-3">
                            <label for="codigo_postal" class="form-label">Código Postal</label>
                            <input style="width: 150%;" type="codigo_postal" class="form-control" id="codigo_postal" name="codigo_postal" value="{{ Auth::user()->codigo_postal }}">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </form>
        </div>
    </div>
@endsection
