<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Apoderado;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::with('apoderado')->get();

        return view('alumno.index', ['alumnos' => $alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $apoderados = Apoderado::get(['id', 'nombres', 'apellidos']);
        return view('alumno.create', ['apoderados' => $apoderados]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        

        $al = new Alumno;
        $al->nombres = $req->input("nombres");
        $al->apellidos = $req->input("apellidos");
        $al->fechaNacimiento = $req->input("fecha");
        $al->edad = $req->input("edad");
        $al->genero = $req->input("genero");
        $al->apoderado_id =$req->input("apoderado");
        // $al->correo = $req->input("correo");

        $al->save();
        return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $al = Alumno::find($id);
        $ap = Apoderado::get(['id', 'nombres', 'apellidos']);
        return view('alumno.edit', ['alumno'=>$al, 'apoderados' => $ap]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $al = Alumno::find($id);

        $al->nombres = $req->input("nombres");
        $al->apellidos = $req->input("apellidos");
        $al->fechaNacimiento = $req->input("fecha");
        $al->edad = $req->input("edad");
        $al->genero = $req->input("genero");
        $al->apoderado_id =$req->input("apoderado");
        
        $al->save();
        return redirect()->route('alumnos.index');
        // return view('alumno.edit', ['alumno'=>$al]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Alumno::destroy($id);
        return redirect()->route('alumnos.index');
    }
}
