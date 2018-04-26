<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\ReservaVisita;

class ReservaVisitaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReservaVisita::updateOrCreate([
            "fecha" => Carbon::now()->addDays(30),
            "comentario" => "la wena cita",
            "id_propiedad" => 1,
            "id_cliente" => 1,
        ]);
        ReservaVisita::updateOrCreate([
            "fecha" => Carbon::now()->addDays(7),
            "comentario" => "la wena cita",
            "id_propiedad" => 2,
            "id_cliente" => 1,
        ]);
        ReservaVisita::updateOrCreate([
            "fecha" => Carbon::now()->addDays(1),
            "comentario" => "la wena cita",
            "id_propiedad" => 2,
            "id_cliente" => 1,
        ]);
    }
}
