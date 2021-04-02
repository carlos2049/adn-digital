<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perrito extends Model
{
    protected $fillable = [
        'nombre',
        'color',
        'raza',

    ];
}
