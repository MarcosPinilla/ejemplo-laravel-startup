<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(EmpresaTableSeeder::class);
    	$this->call(PropiedadTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ClienteTableSeeder::class);
        $this->call(ReservaVisitaTableSeeder::class);
    }
}
