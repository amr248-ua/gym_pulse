<?php

// app/Http/Controllers/TiendaRopaController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TiendaRopaController extends Controller
{
    public function mostrarCatalogo()
    {

        $url = 'http://localhost:8080/tiendaropa/catalogo';
        $html = file_get_contents($url);

        // Retorna la vista con el HTML
        return view('tiendaropa.catalogo', ['html' => $html]);
    }

    public function mostrarDetallesProducto($id)
    {

            // Lógica para obtener detalles del producto desde la API externa
            $url = "http://localhost:8080/tiendaropa/productos/{$id}";
            $html = file_get_contents($url);

            return view('tiendaropa.catalogo', ['html' => $html]);
    }
}
