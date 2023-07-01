<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apoderado;

class ApoderadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apoderados = Apoderado::all();
        return view('apoderado.index', ['apoderados'=>$apoderados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('apoderado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $data= request()->validate([
            'nombres' => 'required|max:50',
            'apellidos' => 'required|max:50',
            'telefono' => 'required|max:13',
            'correo' => 'required|max:50|email',
            'fecha' => 'required|date'
        ],[
            'nombres.required' => 'Este campo es obligatorio',
            'apellidos.required' => 'Este campo es obligatorio',
            'telefono.required' => 'Este campo es obligatorio',
            'email.required' => 'Este campo es obligatorio',
            'fecha.required' => 'Este campo es obligatorio',
        ]);

        $ap = new Apoderado;
        $ap->nombres = $req->input("nombres");
        $ap->apellidos = $req->input("apellidos");
        $ap->telefono = $req->input("telefono");
        $ap->fechaNacimiento = $req->input("fecha");
        $ap->correo = $req->input("correo");

        $ap->save();
        return redirect()->route('apoderados.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ap = Apoderado::find($id);
        return view('apoderado.edit', ['apoderado'=>$ap]);

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $data= request()->validate([
            'nombres' => 'required|max:50',
            'apellidos' => 'required|max:50',
            'telefono' => 'required|max:13',
            'correo' => 'required|max:50|email',
            'fecha' => 'required|date'
        ],[
            'nombres.required' => 'Este campo es obligatorio',
            'apellidos.required' => 'Este campo es obligatorio',
            'telefono.required' => 'Este campo es obligatorio',
            'email.required' => 'Este campo es obligatorio',
            'fecha.required' => 'Este campo es obligatorio',
        ]);

        $ap = Apoderado::find($id);
        $ap->nombres = $req->input("nombres");
        $ap->apellidos = $req->input("apellidos");
        $ap->telefono = $req->input("telefono");
        $ap->fechaNacimiento = $req->input("fecha");
        $ap->correo = $req->input("correo");

        $ap->save();
        return redirect()->route('apoderados.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Apoderado::destroy($id);
        return redirect()->route('apoderados.index');
    }
}
