<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('usuarios/home');
    }

    public function nuevoEvento(Request $request){

        $Nombre = \DB::select('call pa_insertarSolicitud(?, ?, ?, ?, ?, ?)',
            array($request->nombres, $request->apellidos, $request->dni,$request->email,$request->telefono,'11001'));

        return view('/layouts/lockInfo')->with([
                'nombre' => $Nombre]
        );

    }


}
