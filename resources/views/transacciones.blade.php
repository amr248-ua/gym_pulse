@extends('layouts.app')

@auth
@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="d-flex justify-content-center mb-4">
            <h2>Transacciones</h2>
        </div>
        @foreach ($transacciones as $transaccion)
            <div class="md-3 mb-4">
                <div class="card text-white bg-dark mx-auto">
                    <img src="{{ asset($transaccion->imagen) }}" class="card-img-top img-fluid" alt="{{ $transaccion->nombre }}">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <p class="mb-0 mr-2" style="padding-right: 10%">Saldo añadido: {{ $transaccion->importe }}</p>
                            <p class="mb-0">Fecha de factura: {{ $transaccion->fecha }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="d-flex justify-content-center mt-4">
    {{ $transacciones->links() }}
</div>
<div style="position: relative; width: 100%; height: 80px; background-color: white; margin-top: 30px;"></div>
@endsection
@endauth
