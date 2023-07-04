<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auxiliar;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuxiliarController extends Controller
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
        $auxiliares = Auxiliar::all();

        return view('auxiliar.index', ['auxiliares' => $auxiliares]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auxiliar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $aux = new Auxiliar;
        $aux->nombres = $req->input("nombres");
        $aux->apellidos = $req->input("apellidos");
        $aux->telefono = $req->input("telefono");
        $aux->genero = $req->input("genero");
        $aux->correo = $req->input("correo");

        $user = User::create([
            'name' => $aux->nombres,
            'email' => $aux->correo,
            'password' => Hash::make($aux->telefono),
        ]);
        $user->assignRole('auxiliar');

        $aux->user_id = $user->id;
        $aux->save();
        return redirect()->route('auxiliares.index');
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
        $aux = Auxiliar::find($id);
        return view('auxiliar.edit', ['auxiliar' => $aux]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $aux = Auxiliar::find($id);
        $aux->nombres = $req->input("nombres");
        $aux->apellidos = $req->input("apellidos");
        $aux->telefono = $req->input("telefono");
        $aux->genero = $req->input("genero");
        $aux->correo = $req->input("correo");

        $aux->save();
        return redirect()->route('auxiliares.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aux = Auxiliar::find($id);
        User::destroy($aux->user_id);
        Auxiliar::destroy($id);
        return redirect()->route('auxiliares.index');
    }
}
