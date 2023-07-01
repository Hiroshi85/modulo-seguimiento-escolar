<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Apoderado extends Model
{
    use HasFactory;
    protected $table ="apoderado";
    protected $primaryKey ="id";
    public $timestamps = true;
    protected $fillable = ['nombres', 'apellidos', 'telefono', 'correo', 'fechaNacimiento'];
    

    public function alumno()
    {
        return $this->hasMany(Alumno::class);
    }

    public function edad()
    {
        return Carbon::parse($this->attributes['fechaNacimiento'])->age;
    }
}
