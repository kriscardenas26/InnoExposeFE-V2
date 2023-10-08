<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedSocial extends Model
{
    static $rules = [
		'nombreRS' => 'required',
        'tipoRS' => 'required',
        'link' => 'required',
        'estado' => 'required',
        'servicio_id' => 'required',
    ];
    protected $fillable = ['nombreRS','tipoRS','link','estado','servicio_id','idUsuario'];

    use HasFactory;
    protected $table = 'redes_sociales';

    public function servicio(){
        return $this->belongsTo(Servicio::class,'servicio_id');
   }
}
