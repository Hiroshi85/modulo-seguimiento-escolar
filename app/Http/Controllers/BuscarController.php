<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Alumno;
use App\Models\Asistencia;

class BuscarController extends Controller
{
    public function buscarAsistencia(Request $req){
        $fecha = $req->query('fecha');
        $alumno_id = $req->query('alumno');
        $asistencia = Asistencia::where('alumno_id',$alumno_id)->where('fecha', $fecha)->get();
        error_log($asistencia);
        return ['tipo'=>strtoupper($asistencia[0]->tipo[0]), 'id_asistencia' => $asistencia[0]->id];
    }
}
