<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conducta;
use App\Models\Comportamiento;
use App\Models\Alumno;
use Carbon\Carbon;

class ComportamientoController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        
        // $this->middleware('role:auxiliar|psicologo')->only(['index']);
        $this->middleware('role:auxiliar');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::select('id','nombres', 'apellidos')->get();
        $demeritos = Conducta::where('puntaje', '<', 0)->get();
        $meritos = Conducta::where('puntaje', '>', 0)->get();
        $today = Carbon::now()->format('Y-m-d');
        $enable = Carbon::now()->isWeekday();
        return view('comportamiento.index', ['meritos' => $meritos, 'demeritos'=> $demeritos, 'hoy'=>$today, 'alumnos'=>$alumnos, 'enable'=>$enable]);
    }

    /**
     * Store
     */
    public function store(Request $req){
        Comportamiento::create([
            'alumno_id'=>$req->input('alumno'),
            'conducta_id'=>$req->input('asunto'),
            'observacion'=>$req->input('observacion'),
            'fecha'=>$req->input('fecha'),
            'bimestre'=>$req->input('bimestre'),
        ]);

        return redirect()->route('comportamientos.index');
    }

    public function show(){
        $alumnos = Alumno::select('nombres', 'apellidos', 'id')->get();
        return view('comportamiento.show',['alumnos'=>$alumnos]);
    }

    /**
     * Delete
     */
    public function destroy(string $id){
        Comportamiento::destroy($id);
        return ["message"=>"ok"];
    }

    public function getByAlumno(Request $req, string $id){
        // $alumno = Alumno::find($id);
        $nota = 20;
        $comportamientos = $this->showComportamientoPorBimestre($id, $req->query('bimestre'));
        error_log($comportamientos);
        foreach($comportamientos as $it){
            $nota += $it['puntaje'];
        }
        if($nota > 20) $nota=20;
        if($nota < 0) $nota=0;
        return ['comportamientos'=>$comportamientos, 'nota'=>$nota];
    }

    private function showComportamientoPorBimestre(string $id, string $bimestre){
        $comportamientos = Comportamiento::join('alumno', 'alumno_conducta.alumno_id', '=', 'alumno.id')
        ->join('conducta', 'alumno_conducta.conducta_id', '=', 'conducta.id')
        ->where('alumno.id', $id)
        ->where('alumno_conducta.bimestre', $bimestre)
        ->select('alumno_conducta.*','conducta.puntaje', 'conducta.nombre')
        ->get();
        return $comportamientos;
    }

    // $comportamientos = Comportamiento::join('alumno', 'alumno_conducta.alumno_id', '=', 'alumno.id')->join('conducta', 'alumno_conducta.conducta_id', '=', 'conducta.id')->where('alumno.id', 6)->where('alumno_conducta.bimestre', 3)->select('alumno_conducta.*','alumno.nombres', 'alumno.apellidos' , 'conducta.puntaje', 'conducta.nombre')->get();
    // private function alumnosConNota($id, $bimestre){
    //     $alumnos = Alumno::join('alumno_conducta', 'alumno.id', '=', 'alumno_conducta.alumno_id')
    //     ->join('conducta', 'alumno_conducta.conducta_id', '=', 'conducta.id')
    //     ->select('alumno.id', 'alumno.nombres', 'alumno.apellidos', 'alumno_conducta.bimestre', DB::raw('SUM(conducta.puntaje) AS total_puntaje'))
    //     ->groupBy('alumno.id','alumno.nombres', 'alumno.apellidos', 'alumno_conducta.bimestre')
    //     ->get();

    //     $alumnos = Alumno::join('alumno_conducta', 'alumno.id', '=', 'alumno_conducta.alumno_id')
    //     ->join('conducta', 'alumno_conducta.conducta_id', '=', 'conducta.id')
    //     ->where('alumno.id', $id)
    //     ->where('alumno_conducta.bimestre', $bimestre)
    //     ->select('alumno.id', 'alumno.nombres', 'alumno.apellidos', 'alumno_conducta.bimestre', DB::raw('SUM(conducta.puntaje) AS total_puntaje'))
    //     ->groupBy('alumno.id','alumno.nombres', 'alumno.apellidos', 'alumno_conducta.bimestre')
    //     ->get();

    //     foreach($alumnos as $item){
    //         $item['nota']= 20 + $alumnos['total_puntaje'];
    //     }
    //     return $alumnos;
    // }
}
