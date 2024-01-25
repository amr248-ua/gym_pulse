@extends('layouts.app')

@auth
@section('content')
    <div class="container-fluid mt-5">
        <div class="d-flex flex-column align-items-start" style="height: 75vh; background-color: #000; color: #fff; margin-bottom: 200px; border-radius: 15px;">
            <div style="margin-top: 20px; margin-left: 20px;">
                <h1>Hola, {{ Auth::user()->usuario }}.</h1>
            </div>

            <div class="d-flex">
                <div style="width: 500px; background-color: #fff; margin-left: 150px; padding: 20px; border-radius: 10px; color: #000;">
                    <h2 style="font-weight: bold;">Información de la cuenta</h2>
                    <br />
                    <p style="display: inline-block; font-weight: bold; font-size: 20px; margin-right: 10px;">Nombre:</p>
                    <span style="display: inline-block; font-size: 20px;">{{ Auth::user()->nombre }}</span>
                    <br />
                    <p style="display: inline-block; font-weight: bold; font-size: 20px; margin-right: 10px;">Apellidos:</p>
                    <span style="display: inline-block; font-size: 20px;">{{ Auth::user()->apellidos }}</span>
                    <br />
                    <p style="display: inline-block; font-weight: bold; font-size: 20px; margin-right: 10px;">Email:</p>
                    <span style="display: inline-block; font-size: 20px;">{{ Auth::user()->email }}</span>
                    <br />
                    <p style="display: inline-block; font-weight: bold; font-size: 20px; margin-right: 10px;">Teléfono:</p>
                    <span style="display: inline-block; font-size: 20px;">{{ Auth::user()->telefono }}</span>
                    <br />
                    <p style="display: inline-block; font-weight: bold; font-size: 20px; margin-right: 10px;">Dirección:</p>
                    <span style="display: inline-block; font-size: 20px;">{{ Auth::user()->direccion }}</span>
                    <br />
                    <p style="display: inline-block; font-weight: bold; font-size: 20px; margin-right: 10px;">Código Postal:</p>
                    <span style="display: inline-block; font-size: 20px;">{{ Auth::user()->codigo_postal }}</span>
                    <br />
                    <a href="{{ route('perfil.actualizarDatos', ['id' => Auth::user()->id]) }}">
                        <button style="background-color: #DE0000; color: white; padding: 15px 30px; font-size: 1.5em; border: 2px solid white; border-radius: 10px; font-weight: bold; cursor: pointer;">
                            Modificar datos
                        </button>
                    </a>
                </div>

                <div style="width: 500px; background-color: #fff; margin-left: 150px; padding: 20px; border-radius: 10px; color: #000;">
                    <h2 style="font-weight: bold;">Saldo disponible</h2>
                    <span style="display: inline-block; font-size: 40px;">{{ Auth::user()->saldo }} €</span> <br /><br /><br />
                    <!--<a href="{{ route('llamar-api') }}">-->
                        <button data-toggle="modal" data-target="#exampleModal" style="background-color: #DE0000; color: white; padding: 15px 30px; font-size: 1.5em; border: 2px solid white; border-radius: 10px; font-weight: bold; cursor: pointer;">Añadir</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="card bg-dark text-white" style="padding:4%">
                                    <h2>Añadir Saldo</h2>
                                    <form action="{{ route('llamar-api') }}" method="post">
                                        @csrf
                                        <label for="paypal">Nombre de PayPal:</label>
                                        <input type="text" name="paypal" class="form-control @error('name') is-invalid @enderror" required>
                                        <br>
                                        <label for="cantidad">Cantidad a añadir:</label>
                                        <input type="number" name="cantidad" class="form-control @error('name') is-invalid @enderror" required>
                                        <br>
                                        <input type="number" name="userID" hidden value="{{Auth::user()->id}}" class="form-control @error('name') is-invalid @enderror">
                                        <button type="submit" class="btn btn-danger">Aceptar</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="boton-enlace" style="margin-top: 10px;">
                            <a href="{{ route('historial_transacciones' , ['id' => Auth::User()->id]) }}">Consultar historial de transacciones</a>
                        </div>
                    <!--</a>-->
                    <br /> <br /><br /><br />
                    <p style = "font-size: 10px;">Si pulsas en el botón "Añadir" serás redirigido a una página externa donde podrás especificar la cantidad de saldo que quieres
                        traspasar a tu cuenta. Una vez rellenados los datos pertinentes se te cargará a tu método de pago especificado y al volver a esta
                        página podrás visualizar la cantidad añadida. <br />
                        Gympulse no se hace responsable de ningún fallo en el funcionamiento ni error en la transacción del pago. Para obtener más
                        información o ayuda contacte con el soporte técnico de la empresa responsable o su entidad bancaria.</p>
                </div>
            </div>
        </div>
    </div> 
@endsection
@endauth
