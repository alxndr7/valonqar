<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $listadocanchas = \DB::select('call pa_obtenercanchas(?)',
            array(Auth::user()->id));

        return view('usuarios/home')->with([
            'canchas' => $listadocanchas]);
    }

    public function formEditarEvento(Request $req)
    {
        //dd($req->ncodcom);
        $listadocanchas = \DB::select('call pa_obtenercanchas(?)',
            array(Auth::user()->id));

        $evento = \DB::select('call pa_obtenerEventoPorId(?)',array($req->n_cod_event));
        //dd($comensal);
        return view('eventos/editarevento')->with(['evento' => $evento,'canchas' => $listadocanchas]);
    }

    public function insertarEvento(Request $request){

        $eventos = \DB::select('call pa_insertarEvento(?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?)',
            array($request->n_cod_neg,$request->id_cancha,Auth::user()->id,$request->anio,$request->mes,$request->dia,$request->hora_ini,$request->min_ini,
                $request->hora_fin,$request->min_fin,$request->icon,$request->color,'13001'));

        return response()->json(['respuesta'=>$eventos]);
    }


    public function insertarEvento2(Request $request){

        $eventos = \DB::select('call pa_insertarEvento2(?, ?, ?, ?, ?, ?, ?, ?, ?)',
            array($request->n_cod_neg,$request->id_cancha,Auth::user()->id,$request->fecha_ini,$request->fecha_fin,$request->color,$request->icon,'13001',$request->c_des_neg));

        if($eventos != null)
            return response()->json(['response'=>true]);
        else
            return response()->json(['response'=>false]);

    }

    public function editarEvento(Request $request){

        $eventos = \DB::select('call pa_editarEvento(?,?, ?, ?, ?, ?, ?, ?, ?)',
            array($request->n_cod_event, $request->n_cod_neg,$request->id_cancha,Auth::user()->id,$request->fecha_ini,$request->fecha_fin,$request->color,$request->icon,'13001'));

            return response()->json(['response'=>true]);

    }


    public function nuevoEvento(Request $request){

        $Nombre = \DB::select('call pa_insertarSolicitud(?, ?, ?, ?, ?, ?)',
            array($request->nombres, $request->apellidos, $request->dni,$request->email,$request->telefono,'11001'));

        return view('/layouts/lockInfo')->with([
                'nombre' => $Nombre]
        );

    }

    public function listarEventos()
    {
        $eventos = \DB::select('call pa_obtenereventos(?)',array(Auth::user()->id));
        //return response()->json(['data'=>$eventos]);
        return view('eventos/listadoeventos')->with([
            'eventos' => $eventos]);
    }


}
