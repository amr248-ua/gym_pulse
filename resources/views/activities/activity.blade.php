@extends('layouts.app')

@auth
@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-center mb-4">
                <h2>Reserva de actividad</h2>
            </div>
            <div class="col-md-5 mb-4">
                <div class="card text-white bg-dark mx-auto">
                    <img src="{{ asset($actividad->imagen) }}" class="card-img-top img-fluid" alt="{{ $actividad->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title mb-3">{{ $actividad->nombre }}</h5>
                        <p class="card-text">Espacio para: {{ $actividad->plazas }}</p>

                        {{-- Mostrar tabla de horarios --}}
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th>Hora</th>
                                    <th>Precio Socio</th>
                                    <th>Precio No Socio</th>
                                    <th>Apuntarse</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($horasDisponibles as $hora)
                                    <tr>
                                        <td>{{ $hora->fecha }}</td>
                                        <td>{{ $precioSocio}}€</td>
                                        <td>{{ $precioNoSocio }}€</td>
                                        <td>
                                            <form action="{{ route('actividad.reservarActividad') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="actividad_id" value="{{ $actividad->id }}">
                                                <input type="hidden" name="hora" value="{{ $hora }}">
                                                <input type="hidden" name="precioSocio" value="{{ $precioSocio }}">
                                                <input type="hidden" name="precioNoSocio" value="{{ $precioNoSocio }}">
                                                <input type="hidden" name="usuario" value="{{ auth()->user()->id }}">
                                                @if(Auth::user()->socio)
                                                <button type="submit" class="btn btn-danger">Apuntarse</button>
                                                @endif
                                                @if(Auth::user()->recepcionista)
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                                    Apuntar
                                                </button>
                                                @endif
                                            </form>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Datos del solicitante</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Tu formulario aquí -->
                                                            <form method="post" action="{{ route('actividad.actividadRecepcionista') }}">
                                                                @csrf
                                                                <!-- Campos del formulario -->
                                                                <input type="text" name="nombre" placeholder="Nombre" required>
                                                                <input type="text" name="apellidos" placeholder="Apellidos" required>
                                                                <input type="text" name="dni" placeholder="DNI" required>
                                                                <input type="email" name="email" placeholder="Email" required>
                                                                <input type="hidden" name="instalacion_id" value="{{ $actividad->id }}">
                                                                <input type="hidden" name="hora" value="{{ $hora }}">
                                                                <button type="submit" class="btn btn-danger">Reservar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endauth