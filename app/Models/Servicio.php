<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    static $rules = [
		'nombreS' => 'required',
        'cedulaS' => '',
        'descripcionS' => 'required',
        'diaI' => 'required',
        'diaF' => 'required',
        'horaI' => 'required',
        'horaF' => 'required',
        'estado' => 'required',
        'persona_id' => 'required',
        'categoria_id' => 'required',
        'subcategoria_id' => 'required',

    ];
    protected $fillable =
     ['nombreS','cedulaS','descripcionS','diaI','diaF','horaI','horaF','estado','persona_id'
     ,'categoria_id','subcategoria_id','idUsuario'];

    use HasFactory;
    protected $stable="servicios";
   
    public function persona(){
         return $this->belongsTo(Persona::class,'persona_id');
    }
    public function subcategoria(){
     return $this->belongsTo(Subcategoria::class,'subcategoria_id');
    } 
    public function direcciones()
    {
        return $this->hasMany(Direccion::class);
    }
    public function redesSociales()
    {
        return $this->hasMany(RedSocial::class);
    }
    public function imagenes()
    {
        return $this->hasMany(Imagen::class);
    }
}
