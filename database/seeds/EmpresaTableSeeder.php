<?php

use Illuminate\Database\Seeder;
use App\Empresa;

class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::updateOrCreate([
        	"nombre" => "Empresa 1",
        	"email" => "empresa1@gmail.com",
        	"telefono" => "+569 77665544",
        	"sitio_web" => "https://www.empresa1.cl",
        ]);

        Empresa::updateOrCreate([
        	"nombre" => "Empresa 2",
        	"email" => "empresa2@gmail.com",
        	"telefono" => "+569 44556677",
        	"sitio_web" => "https://www.empresa2.cl",
        ]);
    }
}
