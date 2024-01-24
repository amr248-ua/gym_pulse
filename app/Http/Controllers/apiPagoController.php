<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class apiPagoController extends Controller
{
    public function llamarAPI()
    {
        // Datos de autenticación y otros datos necesarios
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MTB9.AmfT0rGLx2V1YHI9iBdcPCE6-Y41M6FJ5otw5uJrNd0';  // Reemplaza con tu token JWT
        $concepto = 'Añadir saldo';  // Reemplaza con el concepto deseado
        $cantidad = 100;  // Reemplaza con la cantidad deseada
        // Generar un número aleatorio para receipt_number
        $receiptNumber = rand(100000, 999999);
        // URL de la API
        $url = 'https://ebisu.firstrow2.com/api/transactions';

        // Realizar la solicitud POST a la API con los datos requeridos
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
        ])->post($url, [
            'concept' => $concepto,
            'amount' => $cantidad,
            'receipt_number' => (string)$receiptNumber,
            // Agrega otros datos según sea necesario para la API
        ]);

        // Obtener el HTML desde la respuesta
        $html = $response->body();

        // Retorna la vista con el HTML
        return view('pagos', [
            'html' => $html,
            'receiptNumber' => $receiptNumber,
        ]);
    }

    public function completarTransaccion($idTransaccion)
    {
        // Datos de autenticación y otros datos necesarios
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MTB9.AmfT0rGLx2V1YHI9iBdcPCE6-Y41M6FJ5otw5uJrNd0';  // Reemplaza con tu token JWT

        // URL de la API para completar la transacción
        $url = 'https://ebisu.firstrow2.com/api/transactions/' . $idTransaccion;

        // Realizar la solicitud POST a la API para completar la transacción
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
        ])->post($url, [
            // Agrega los datos necesarios para completar la transacción
            // Puedes necesitar proporcionar información adicional según las especificaciones de la API
        ]);

        // Obtener la respuesta desde la API después de completar la transacción
        $resultado = $response->body();

        // Puedes manejar la respuesta según tus necesidades
        return $resultado;
    }

}
