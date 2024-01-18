@extends('layouts.app')

@auth
@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
        <div class="d-flex justify-content-center mb-4">
                    <h2>Reserva de instalación</h2>
                </div> <!-- Cambiado de flex-wrap a justify-content-center -->
                <div class="col-md-4 mb-4"> <!-- Ajustado el tamaño de la columna a col-md-4 -->
                    <div class="card text-white bg-dark mx-auto">
                        <img src="{{ asset($instalacion->imagen) }}" class="card-img-top img-fluid" alt="{{ $instalacion->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{ $instalacion->nombre }}</h5>
                            <p class="card-text">Espacio para: {{ $instalacion->plazas }}</p>
                            <p class="card-text">Precio: {{ $horasHoy }}€</p>
                            <div class="text-center">
                                {{-- <a href="{{ route('instalacion', $instalacion->id) }}" class="btn btn-success">Reservar</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
@endauth