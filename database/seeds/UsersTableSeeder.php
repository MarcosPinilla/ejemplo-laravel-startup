<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
        	"name" => "Daniel Coronado Mendoza",
        	"email" => "d.coronado01@ufromail.cl",
        	"password" => bcrypt("1234"),
        	"id_empresa" => "1",
        	"confirmed" => true,
        ]);

        User::updateOrCreate([
        	"name" => "Felipe Acuña Figueroa",
        	"email" => "f.acuna01@ufromail.cl",
        	"password" => bcrypt("1234"),
        	"id_empresa" => "2",
        	"confirmed" => true,
        ]);

        User::updateOrCreate([
        	"name" => "Marcos Pinilla Martinez",
        	"email" => "m.pinilla03@ufromail.cl",
        	"password" => bcrypt("1234"),
        	"id_empresa" => "2",
        	"confirmed" => true,
        ]);
    }
}
