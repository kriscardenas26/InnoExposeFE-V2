<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    static $rules = [
		'nombreP' => 'required',
        'apellido1' => 'required',
        'apellido2' => 'required',
        'tipoIdentificacion' => 'required',
        'cedulaP' => 'required',
    ];
    protected $fillable = ['nombreP','apellido1','apellido2','tipoIdentificacion','cedulaP'];

    use HasFactory;
    protected $table = 'personas';
}
