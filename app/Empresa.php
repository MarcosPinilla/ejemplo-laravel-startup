<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';

    protected $primaryKey = 'id';

    protected $fillable = [
    	'nombre', 'email', 'telefono', 'sitio_web'
    ];

    public function usuarios(){
    	return $this->hasMany(User::class, 'id_empresa');
    }

    public function propiedades(){
    	return $this->hasMany(Propiedad::class, 'id_empresa');
    }
}
