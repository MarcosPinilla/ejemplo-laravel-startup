<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';

    protected $primaryKey = 'id';

    protected $fillable = [
    	'nombre', 'apellido', 'telefono'
    ];

    public function reservaVisita(){
    	return $this->hasMany(ReservaVisita::class, 'id_cliente');
    }

}
