<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psicologo;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PsicologoController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('role:admin')->except(['index']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $psicologos = Psicologo::all();

        return view('psicologo.index', ['psicologos' => $psicologos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('psicologo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $psico = new Psicologo;
        $psico->nombres = $req->input("nombres");
        $psico->apellidos = $req->input("apellidos");
        $psico->telefono = $req->input("telefono");
        $psico->genero = $req->input("genero");
        $psico->correo = $req->input("correo");

        
        $user = User::create([
            'name' => $psico->nombres,
            'email' => $psico->correo,
            'password' => Hash::make($psico->telefono),
        ]);
        $user->assignRole('psicologo');

        $psico->user_id = $user->id;
        $psico->save();

        return redirect()->route('psicologos.index');
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
        $psico = Psicologo::find($id);
        return view('psicologo.edit', ['psicologo' => $psico]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $psico = Psicologo::find($id);
        $psico->nombres = $req->input("nombres");
        $psico->apellidos = $req->input("apellidos");
        $psico->telefono = $req->input("telefono");
        $psico->genero = $req->input("genero");
        $psico->correo = $req->input("correo");

        $psico->save();
        return redirect()->route('psicologos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $psico = Psicologo::find($id);
        User::destroy($psico->user_id);
        Psicologo::destroy($id);
        return redirect()->route('psicologos.index');
    }
}
