<?php
namespace App\Utils;

abstract class Transform
{    
    // Función que transformará nuestras consultas con Query B.
    public function transformCollection(array $items)
    {
   	 return array_values(array_map([$this,'transform'], $items));
    }
    // Función abstracta a utilizar.
    public abstract function transform($item);
}
?>