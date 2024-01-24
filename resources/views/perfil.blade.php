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
                    <a href="{{ route('llamar-api') }}">
                        <button style="background-color: #DE0000; color: white; padding: 15px 30px; font-size: 1.5em; border: 2px solid white; border-radius: 10px; font-weight: bold; cursor: pointer;">Añadir</button>
                    </a>
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

    <script>
        function llamarAPI() {
            // URL de la API
            var apiUrl = 'https://ebisu.firstrow2.com/api/transactions';
            var jwtToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MTB9.AmfT0rGLx2V1YHI9iBdcPCE6-Y41M6FJ5otw5uJrNd0';
            // Datos para la solicitud POST
            var postData = {
                "concept": "string",
                "amount": 1000000000,
                "receipt_number": "string",
                "payment": {
                    "type": "paypal",
                    "values": {
                        "paypal_user": "string",
                        "credit_card_number": "string",
                        "credit_card_expiration_month": 12,
                        "credit_card_expiration_year": 9999,
                        "credit_card_csv": 999
                    }
                }
            };
            // Realizar la solicitud POST a la API
            fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + jwtToken
                },
                body: JSON.stringify(postData)
            })
            .then(response => response.json())
            .then(data => {
                // Manejar la respuesta de la API
                console.log(data);

                // Aquí puedes realizar acciones adicionales según la respuesta de la API
            })
            .catch(error => {
                // Manejar errores
                console.error('Error al llamar a la API', error);
            });
        }

        // Llamar a la función al cargar la página
        window.onload = llamarAPI;
    </script>
@endsection
@endauth
