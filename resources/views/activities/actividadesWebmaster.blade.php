@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(Auth::user()->webmaster)
                <button type="button" style="background-color: transparent; color: green; border: none; font-size: 120%" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Añadir actividad</button>
            @endif
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nueva actividad</h5>
                            <button type="button" style="background-color: transparent; color: red; border: none; font-size: 120%" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Tu formulario aquí -->
                            <form method="post" action="{{route('nueva_actividad')}}" enctype="multipart/form-data">
                                @csrf
                                <!-- Campos del formulario -->
                                <input type="text" name="nombre" placeholder="Nombre" required>
                                                    <input type="number" min=1 name="plazas" placeholder="Plazas" required>
                                                    <input type="text" name="descripcion" placeholder="Descripcion" required>
                                                    <input type="hidden" name="duracion" value=60>
                                                    <input type="number" id="precio" name="precio" step="0.01" min="0" placeholder="Ingrese el precio" required>
                                                    <input type="file" name="imagen" accept="image/*" required>
                                <button type="submit" style="background-color: transparent; color: red; border: none; font-size: 120%" class="btn btn-success">Añadir</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($actividades as $actividad)
                        <tr>
                            <td>
                                <span>
                                    {{ $actividad->nombre }}
                                </span>
                            </td>
                            <td class="text-right">
                                @csrf
                                <button type="button" style="background-color: transparent; color: gray; border: none; font-size: 120%" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal{{ $actividad->id }}">Ver Detalles</button>
                                <button type="button" style="background-color: transparent; color: blue; border: none; font-size: 120%" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{ $actividad->id }}">Modificar</button>

                                <form action="{{ route('eliminar_actividad', ['id' => $actividad->id]) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                    <button style="background-color: transparent; color: red; border: none; font-size: 120%" type="submit" class="btn btn-danger btn-sm">
                                        <span>Eliminar</span>
                                    </button>
                                </form>

                                <!-- Modal Detalles -->
                                <div class="modal fade" id="editModal{{ $actividad->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detalles de la actividad</h5>
                                                <button type="button" style="background-color: transparent; color: gray; border: none; font-size: 120%" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <form method="post" action="{{route('actualizar_actividad', ['id' => $actividad->id])}}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <!-- Campos del formulario -->
                                                    <input type="text" name="nombre" placeholder="Nombre" value="{{$actividad->nombre}}">
                                                    <input type="number" min=1 name="plazas" placeholder="Plazas" value="{{$actividad->plazas}}">
                                                    <input type="text" name="descripcion" value="{{$actividad->descripcion}}">
                                                    <input type="hidden" name="duracion" value=60>
                                                    <input type="number" id="precio" name="precio" step="0.01" min="0" placeholder="Ingrese el precio" value="{{$actividad->precio}}">
                                                    <input type="file" name="imagen" accept="image/*">
                                                    <button type="submit" style="background-color: transparent; color: red; border: none; font-size: 120%" class="btn btn-success">Editar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Editar -->
                                <div class="modal fade" id="exampleModal{{ $actividad->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detalles de la actividad</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Tu formulario aquí -->
                                                <div class="col-md-12 text-center">
                                                    <div class="card text-white bg-dark mx-auto">
                                                        <img src="{{ asset($actividad->imagen) }}" class="card-img-top img-fluid" alt="{{ $actividad->nombre }}">
                                                        <div class="card-body">
                                                            <h5 class="card-title mb-3">{{ $actividad->nombre }}</h5>
                                                            <p class="card-text">{{ $actividad->descripcion }}</p>
                                                        </div>
                                                    </div>
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
            <div class="d-flex justify-content-center">
                {{ $actividades->links() }}
            </div>
        </div>
    </div>
</div>
@endsection