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
        'servicio_id' => 'required',
    ];
    protected $fillable = ['nombreRS','tipoRS','link','servicio_id'];

    use HasFactory;
    protected $table = 'redes_sociales';

    public function servicio(){
        return $this->belongsTo(Servicio::class,'servicio_id');
   }
}
