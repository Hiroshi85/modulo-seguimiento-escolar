<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auxiliar extends Model
{
    use HasFactory;
    protected $table ="auxiliar";
    protected $primaryKey ="id";
    public $timestamps = true;
    protected $fillable = ['nombres', 'apellidos', 'telefono', "genero","correo","user_id"];
}
