<?php

namespace App\Http\Controllers;


class Geolocation extends Controller
{
    // Función para calcular la distancia entre dos puntos de latitud/longitud en kilómetros Ecuación de Haversine
    //https://upcommons.upc.edu/bitstream/handle/2117/82817/Annex%205.pdf?sequence=7&isAllowed=y
    function distanciaMedia($latConductor, $lonConductor, $latAeropuerto, $lonAeropuerto)
    {
        $radioTierra = 6371; // Radio de la Tierra en kilómetros
        //Diferencia entre coordenadas en radianes
        $distanciaLat = deg2rad($latAeropuerto - $latConductor);
        $distanciaLon = deg2rad($lonAeropuerto - $lonConductor);

        //: distanciaAprox = sin²(distanciaLat/2) + cos latConductor ⋅ cos latAeropuerto ⋅ sin²(distanciaLon/2)
        $distanciaAprox = sin($distanciaLat / 2) * sin($distanciaLat / 2) +
            cos(deg2rad($latConductor)) * cos(deg2rad($latAeropuerto)) *
            sin($distanciaLon / 2) * sin($distanciaLon / 2);

        //angulosSuperficie = 2 ⋅ atan2( √distanciaAprox, √(1−distanciaAprox) )
        $angulosSuperficie = 2 * atan2(sqrt($distanciaAprox), sqrt(1 - $distanciaAprox));

        //distancia=radioTierra*angulosSuperficie
        $distancia = $radioTierra * $angulosSuperficie;

        return $distancia;
    }
    function validarDistancia(Request $request)
    {

        if ($request->input('gps') == 'True') {
            // Coordenadas del aeropuerto de Ejemplo Palonegro (Bucaramanga)
            $aeropuertoLat = 7.12873;
            $aeropuertoLon = -73.18091;
            $radioTolerancia = 1.5;

            // Calcular la distancia entre la ubicación del cuentac y el aeropuerto
            $distanciaAeropuerto = $this->distanciaMedia($request->input('lat'), $request->input('long'), $aeropuertoLat, $aeropuertoLon);

            if ($distanciaAeropuerto <= $radioTolerancia) {
                // Está dentro del rango del aeropuerto
                $aeropuerto = 1;
                // YOUR LOGIC HERE:👇
                // $servicio->valor = $servicio->valor + 21000;
            } else {
                // No está dentro del rango del aeropuerto
                $message = "¡Debe encontrarse en el Aeropuerto para adicionar la tarifa!";
                return json_encode($message);
            }
        }
    }
}
