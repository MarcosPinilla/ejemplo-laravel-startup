<?php

use Illuminate\Database\Seeder;
use App\Cliente;

class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::updateOrCreate([
            "nombre" => "Marcos",
            "apellido" => "Pinilla",
            "telefono" => "987793078",
        ]);
    }
}
