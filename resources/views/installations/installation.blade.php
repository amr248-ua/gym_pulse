@extends('layouts.app')

@auth
@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-center mb-4">
                <h2>Reserva de instalación</h2>
            </div>
            <div class="col-md-5 mb-4">
                <div class="card text-white bg-dark mx-auto">
                    <img src="{{ asset($instalacion->imagen) }}" class="card-img-top img-fluid" alt="{{ $instalacion->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title mb-3">{{ $instalacion->nombre }}</h5>
                        <p class="card-text">Espacio para: {{ $instalacion->plazas }}</p>

                        {{-- Mostrar tabla de horarios --}}
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th>Hora</th>
                                    <th>Precio Socio</th>
                                    <th>Precio No Socio</th>
                                    <th>Reservar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($horasDisponibles as $hora)
                                    <tr>
                                        <td>{{ $hora }}</td>
                                        <td>{{ $precioSocio}}€</td>
                                        <td>{{ $precioNoSocio }}€</td>
                                        <td>
                                            <form action="{{ route('instalacion.reservarInstalacion') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="instalacion_id" value="{{ $instalacion->id }}">
                                                <input type="hidden" name="hora" value="{{ $hora }}">
                                                <input type="hidden" name="precioSocio" value="{{ $precioSocio }}">
                                                <input type="hidden" name="precioNoSocio" value="{{ $precioNoSocio }}">
                                                <input type="hidden" name="usuario" value="{{ auth()->user()->id }}">
                                                <button type="submit" class="btn btn-success">Reservar</button>
                                            </form>
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