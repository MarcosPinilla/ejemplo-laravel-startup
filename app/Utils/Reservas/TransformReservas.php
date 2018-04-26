<?php

namespace App\Utils\Reservas;

use App\Utils\Transform;
use Carbon\Carbon;

/**
* Disponibles
*/
class TransformReservas extends Transform
{
    // Utils trae la consulta realizada en el controlador.
    public function transform($item){
   	 
   	    $reserva = [
            'id' => $item['id_reserva'],
            'fecha' => $item['fecha'],
            'dia' => Carbon::parse($item['fecha'])->day,
            'propiedad' => $item['propiedad'],
            'estado' => $item['estado'] ? 'Abierto' : 'Cerrado',
            'nombre' => $item['nombre'] . ' ' . $item['apellido'],
        ];

        $fecha_vencimiento = Carbon::parse($item['fecha']);
   	    $now = Carbon::create(Carbon::now()->year, Carbon::now()->month, Carbon::now()->day);

   	    $dt = Carbon::create($fecha_vencimiento->year, $fecha_vencimiento->month, $fecha_vencimiento->day);
   	    $daysForExtraCoding = $now->diffInDaysFiltered(function(Carbon $date) {
   		    return $date->diffInDays();
   	    }, $dt);

   	    $reserva['vence_en'] = $daysForExtraCoding . ' días';

   	    return $reserva;
    }
}
?>