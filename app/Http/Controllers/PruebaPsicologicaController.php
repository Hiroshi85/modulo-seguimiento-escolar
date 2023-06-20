<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PruebaPsicologica;
use App\Models\Psicologo;

class PruebaPsicologicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pruebaps = PruebaPsicologica::with('psicologo')->get();

        return view('pruebas.index', ['pruebas' => $pruebaps]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $psicologos = Psicologo::get(['id', 'nombres', 'apellidos']);
        return view('pruebas.create', ['psicologos' => $psicologos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $pp = new PruebaPsicologica;
        $pp->nombre = $req->input("nombre");
        $pp->tipo = $req->input("tipo");
        $pp->edad_minima = $req->input("minima");
        $pp->edad_maxima = $req->input("maxima");
        $pp->psicologo_id = $req->input("psicologo");
        // $pp->correo = $req->input("correo");

        $pp->save();
        return redirect()->route('pruebas.index');
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
        $pp = PruebaPsicologica::find($id);
        $psicologos = Psicologo::get(['id', 'nombres', 'apellidos']);
        return view('pruebas.edit', ['prueba'=>$pp, 'psicologos' => $psicologos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $pp = PruebaPsicologica::find($id);
        $pp->nombre = $req->input("nombre");
        $pp->tipo = $req->input("tipo");
        $pp->edad_minima = $req->input("edad_minima");
        $pp->edad_maxima = $req->input("edad_maxima");
        $pp->psicologo_id = $req->input("psicologo_id");
        // $pp->correo = $req->input("correo");

        $pp->save();
        return redirect()->route('pruebas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PruebaPsicologica::destroy($id);
        return redirect()->route('pruebas.index');
    }
}
