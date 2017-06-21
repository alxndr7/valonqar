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

    public function insertarEvento(Request $request){

        $eventos = \DB::select('call pa_insertarEvento(?, ?, ?, ?, ?, ?,?,?,?,?,?)',
            array(1,1,1,$request->anio,$request->mes,$request->dia,$request->hora_ini,$request->min_ini,
                $request->hora_fin,$request->min_fin,'13001'));

        return response()->json(['respuesta'=>$eventos]);
    }


    public function insertarEvento2(Request $request){

        $eventos = \DB::select('call pa_insertarEvento2(?, ?, ?, ?, ?, ?)',
            array(2,1,1,$request->fecha_ini,$request->fecha_fin,'13001'));

        return response()->json(['respuesta'=>$eventos]);
    }


    public function nuevoEvento(Request $request){

        $Nombre = \DB::select('call pa_insertarSolicitud(?, ?, ?, ?, ?, ?)',
            array($request->nombres, $request->apellidos, $request->dni,$request->email,$request->telefono,'11001'));

        return view('/layouts/lockInfo')->with([
                'nombre' => $Nombre]
        );

    }


}
