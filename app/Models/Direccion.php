<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    static $rules = [
		'nombreD' => 'required',
        'persona_id' => 'required',
        'servicio_id' => 'required',

    ];
    protected $fillable =
     ['nombreD','persona_id','servicio_id'];

    use HasFactory;
    protected $table="direcciones";
   
    public function persona(){
         return $this->belongsTo(Persona::class,'persona_id');
    } 
    public function servicio(){
        return $this->belongsTo(Servicio::class,'servicio_id');
    }
}