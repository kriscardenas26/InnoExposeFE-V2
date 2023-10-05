<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    static $rules = [
		'nombreSC' => 'required',
        'categoria_id' => 'required',
    ];
    protected $fillable = ['nombreSC','categoria_id'];

    use HasFactory;
    protected $table = 'subcategorias';

    public function categoria(){
        return $this->belongsTo(Categoria::class,'categoria_id');
   }
}
