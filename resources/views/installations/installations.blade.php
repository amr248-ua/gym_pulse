@extends('layouts.app')

@auth
@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
        <div class="d-flex justify-content-center mb-4">
                    <h2>Lista de Instalaciones</h2>
                </div> <!-- Cambiado de flex-wrap a justify-content-center -->
            @foreach ($instalaciones as $instalacion)
                <div class="col-md-3 mb-4"> <!-- Ajustado el tamaño de la columna a col-md-4 -->
                    <div class="card text-white bg-dark mx-auto">
                        <img src="{{ asset($instalacion->imagen) }}" class="card-img-top img-fluid" alt="{{ $instalacion->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{ $instalacion->nombre }}</h5>
                            <p class="card-text">{{ $instalacion->descripcion }}</p>
                            <div class="text-center">
                                {{-- <a href="{{ route('horario', $instalacion->id) }}" class="btn btn-primary">Horario</a> --}}
                                {{-- <a href="{{ route('reservar', $instalacion->id) }}" class="btn btn-success">Reservar</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $instalaciones->links() }}
    </div>
@endsection
@endauth