<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    static $rules = [
		'nombreC' => 'required'
    ];
    protected $fillable = ['nombreC'];

    use HasFactory;
    protected $table = 'categorias';
}
