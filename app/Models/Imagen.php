<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    static $rules = [
		'fileName' => 'required',
        'urlImage' => 'required|image|mimes:jpeg,png,svg|max: 8388608',
        'estado' => 'required',
        'servicio_id' => 'required',
    ];
    protected $fillable = ['fileName','urlImage','estado','servicio_id','idUsuario'];

    use HasFactory;
    protected $table = 'imagenes';

    public function servicio(){
        return $this->belongsTo(Servicio::class,'servicio_id');
   }
}
