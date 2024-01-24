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

        // URL de la API
        $url = 'https://ebisu.firstrow2.com/api/transactions';

        // Realizar la solicitud POST a la API con los datos requeridos
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
        ])->post($url, [
            'concept' => $concepto,
            'amount' => $cantidad,
            // Agrega otros datos según sea necesario para la API
        ]);

        // Obtener el HTML desde la respuesta
        $html = $response->body();

        // Retorna la vista con el HTML
        return view('pagos', ['html' => $html]);
    }

}
