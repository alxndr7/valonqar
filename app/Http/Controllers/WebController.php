<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function info()
    {
        return view('auth.solicitar-info');
    }

    public function addSolicitud(Request $request){
        $Nombre = \DB::select('call pa_insertarSolicitud(?, ?, ?, ?, ?, ?)',
            array($request->nombres, $request->apellidos, $request->dni,$request->email,$request->telefono,'11001'));

        return view('/layouts/lockInfo')->with([
                'nombre' => $Nombre]
        );

    }
}
