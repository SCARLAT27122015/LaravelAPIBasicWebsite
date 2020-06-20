<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bolsa extends Model
{
    //
    protected $fillable = ['nombre', 'precioCompra', 'precioVenta','descripcion', 'clave', 'imagen'];
}
