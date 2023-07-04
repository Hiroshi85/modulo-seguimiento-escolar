<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Alumno;
use App\Models\Asistencia;

class AsistenciaController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('role:auxiliar');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        $today = Carbon::now()->format('d-m-Y');
        $today_f = Carbon::now()->format('Y-m-d');
        $day = now()->dayName;
        $enable = Carbon::now()->isWeekday();
        $num = Asistencia::whereDate('fecha', Carbon::today())->get()->count();
        if($num <= 0 && $enable){
            foreach($alumnos as $it){
                Asistencia::create([
                    'fecha' => $today_f,
                    'alumno_id' => $it->id,
                    'tipo' => 'falta',
                ]);
            }
        }
        return view('asistencia.index', ['today'=>$today, 'day'=>$day, 'enable'=>$enable, 'alumnos'=>$alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alumnos = Alumno::all();
        $today = Carbon::now()->format('Y-m-d');
        error_log("estoy aqui");
        return view('asistencia.edit', ['today'=>$today, 'alumnos'=>$alumnos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $tipo = '';
        switch ($req->input('tipo')) {
            case 'F':
                $tipo="falta";
                break;
            case 'P':
                $tipo="presente";
                break;
            case 'T':
                $tipo="tarde";
                break;
            case 'J':
                $tipo="justificado";
                break;
            default:
                # code...
                break;
        }
        
        Asistencia::where('alumno_id',$req->input("alumno"))
                    ->where('fecha', Carbon::parse($req->input("fecha"))->format('Y-m-d'))
                    ->update(['tipo'=>$tipo]);
        
        return redirect()->route('asistencias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $tipo = '';
        switch ($req->input('tipo')) {
            case 'F':
                $tipo="falta";
                break;
            case 'P':
                $tipo="presente";
                break;
            case 'T':
                $tipo="tarde";
                break;
            case 'J':
                $tipo="justificado";
                break;
            default:
                # code...
                break;
        }
        
        $as = Asistencia::find($id);
        $as->tipo=$tipo;
        $as->save();
        
        return redirect()->route('asistencias.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
