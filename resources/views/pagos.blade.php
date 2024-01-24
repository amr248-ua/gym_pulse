<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta de la API</title>
</head>
<body>
    {!! $html !!}

<script>
    // Esta función se ejecutará después de hacer clic en el botón de pago
    function procesarPago() {
        // Obtener el botón por su clase
        var botonPago = document.querySelector('.btn-success');

        // Agregar un evento de clic al botón
        botonPago.addEventListener('click', function() {
            // Llamar a la función para procesar el pago
            obtenerDetallesTransaccion();
        });
    }

    function obtenerDetallesTransaccion(idTransaccion) {
        // URL de la API para obtener detalles de la transacción
        var apiUrl = 'https://ebisu.firstrow2.com/api/transactions/' + idTransaccion;
        var token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MTB9.AmfT0rGLx2V1YHI9iBdcPCE6-Y41M6FJ5otw5uJrNd0';
        // Realizar la solicitud GET a la API con el token de autenticación
        fetch(apiUrl, {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer ' + token,
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            // Extraer el valor de 'amount'
            var cantidadTransaccion = data.amount;

            // Llamar a la función para actualizar el saldo del usuario
            actualizarSaldoUsuario(cantidadTransaccion);
        })
        .catch(error => {
            console.error('Error al obtener detalles de la transacción', error);
        });
    }

    function actualizarSaldoUsuario(cantidadTransaccion) {
        info('Cantidad de transacción: ' . $cantidadTransaccion);
        // Aquí deberías hacer una llamada a tu backend para actualizar el saldo del usuario
        // Puedes usar Ajax, Axios u otras bibliotecas para realizar la solicitud al servidor
        // Por ejemplo, podrías hacer una solicitud POST a tu ruta de backend que maneje la actualización del saldo
    }
</script>
</body>
</html>