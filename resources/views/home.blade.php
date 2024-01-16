@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-white">
                <div class="card-header text-center">
                    <h2>GymPulse</h2>
                </div>

                <div class="card-body bg-white text-dark">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                        En cuanto uno de nuestros trabajadores confirme los datos de tu cuenta,
                        se te enviará un correo para informarte de que ya puedes disfrutar de tus ventajas de socio.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
