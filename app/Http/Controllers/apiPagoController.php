<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Transaction;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class apiPagoController extends Controller
{
    public function llamarAPI(Request $request)
    {
        // Datos de autenticación y otros datos necesarios
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MTB9.AmfT0rGLx2V1YHI9iBdcPCE6-Y41M6FJ5otw5uJrNd0';
        $concepto = 'Añadir saldo';
        $cantidad = $request->input('cantidad');
        $cuenta = $request->input('paypal');
        $userID = $request->input('userID');
        // Generar un número aleatorio para receipt_number
        $receiptNumber = rand(100000, 999999);
        // URL de la API
        $url = 'https://ebisu.firstrow2.com/api/transactions';

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json',
        ])->post($url, [
            'concept' => $concepto,
            'amount' => $cantidad,
            'receipt_number' => (string)$receiptNumber,
            'payment' => [
                'type' => 'paypal',
                'values' => [
                    'paypal_user' => $cuenta,
                    'credit_card_number' => 'string',
                    'credit_card_expiration_month' => 12,
                    'credit_card_expiration_year' => 9999,
                    'credit_card_csv' => 999,
                ],
            ],
        ]);

        $html = $response->body();
        $user = User::findOrFail($userID);
        $user->saldo += $cantidad;
        $user->save();

        $transaccion = new Transaction();
        $transaccion->importe = $cantidad;
        $transaccion->concepto = $concepto . " por valor de " . $cantidad . " a fecha de " . Carbon::today() . " al usuario con el id " . $userID;
        $transaccion->user_id = $userID;
        $transaccion->fecha = Carbon::today();
        $transaccion->save();


        return redirect()->route('perfil', ['id' => $userID]);
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

        ]);

        // Obtener la respuesta desde la API después de completar la transacción
        $resultado = $response->body();

        // Puedes manejar la respuesta según tus necesidades
        return $resultado;
    }

}
