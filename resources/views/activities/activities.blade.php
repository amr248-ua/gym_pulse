@extends('layouts.app')

@auth
@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-center mb-4">
                <h2>Actividades en nuestros centros</h2>
            </div>
            @foreach ($actividades as $actividad)
                <div class="col-md-3 mb-4">
                    <div class="card text-white bg-dark mx-auto">
                        <img src="{{ asset($actividad->imagen) }}" class="card-img-top img-fluid" alt="{{ $actividad->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{ $actividad->nombre }}</h5>
                            <p class="card-text">{{ $actividad->descripcion }}</p>
                            <div class="text-center">
                                <a href="{{ route('actividad', $actividad->id) }}" class="btn btn-success">Apuntarse</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $actividades->links() }}
    </div>
    <div style="position: relative; width: 100%; height: 80px; background-color: white; margin-top: 30px;"></div>
@endsection
@endauth
