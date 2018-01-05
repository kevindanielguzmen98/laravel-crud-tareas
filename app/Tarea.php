<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
		protected $table = 'tareas';
    protected $fillable = [
    	'titulo', 'descripcion', 'user_id'
    ];
}
