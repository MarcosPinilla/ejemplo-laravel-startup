<?php

use Illuminate\Database\Seeder;
use App\Propiedad;

class PropiedadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Propiedad::updateOrCreate([
        	"nombre" => "Propiedad 1",
        	"codigo" => "00001",
        	"descripcion" => "Propiedad 1, Temuco",
        	"id_empresa" => "1",
        ]);

        Propiedad::updateOrCreate([
        	"nombre" => "Propiedad 2",
        	"codigo" => "00002",
        	"descripcion" => "Propiedad 2, Lautaro",
        	"id_empresa" => "2",
        ]);
    }
}
