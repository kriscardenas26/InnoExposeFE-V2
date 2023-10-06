<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    static $rules = [
		'nota' => 'required',
        'servicio_id' => 'required',
    ];

    protected $fillable = ['nota','servicio_id'];
    
    use HasFactory;
    protected $table = 'calificaciones';

    public function servicio(){
        return $this->belongsTo(Servicio::class,'servicio_id');
   }

}
