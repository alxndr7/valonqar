<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AndroidWs extends Controller
{
    public function serviceObtenerCanchas(){

        $canchas = \DB::select('call paa_listarCanchas()');
        $canchasNegocio = \DB::select('call paa_listarCanchasNegocio()');
        return response()->json(['canchas'=>$canchas, "canchas_negocio"=>$canchasNegocio]);
    }

    public function serviceObtenerUbicacionCancha(Request $req){

        $canchas = \DB::select('call paa_obtenerUbiCancha(?)',array($req->id));
        return response()->json(['ubicacion'=>$canchas]);
    }

    public function serviceObtenerUbicaciones(Request $req){

        $canchas = \DB::select('call pa_obtener()');
        $distritos = \DB::select('call pa_obtenerdistritos()');

        return response()->json(['ubicaciones'=>$canchas,'distritos'=>$distritos]);

       // return response()->json(['usuario'=>$login,'dnis'=>$dnis]);
    }

    public function serviceObtenerCanchasPorDistrito(Request $req){

        $canchas = \DB::select('call paa_obtenerCanchasPorDistrito(?)',array($req->nCodDist));
        return response()->json(['ubicaciones'=>$canchas]);
    }


    public function serviceObtenerDistritos(Request $req){

        $distritos = \DB::select('call pa_obtenerdistritos()');
        return response()->json(['distritos'=>$distritos]);
    }



    public function servicepgprueba(){

        $canchas = \DB::select(' Select * From musuario ;');
        return response()->json(['canchas'=>$canchas]);
    }



    public function serviceObtenerEventos(Request $req){

        $eventos = \DB::select('call paa_obtenereventos(?)',array($req->nCodNeg));
        return response()->json(['eventos'=>$eventos]);
    }

    public function obtenerEventosWeb(){

        $eventos = \DB::select('call pa_obtenereventos(?)',array(Auth::user()->id));
        //return response()->json(['data'=>$eventos]);
        //return array_values($eventos);
        return response()->json($eventos);
        //return json_decode(json_encode($eventos), true);
    }


    public function validarLogin(Request $req){

       // dd($req->usu);
       $login = \DB::select('call validarLoginAndroid(?,?)',array($req->usu,$req->passw));
       $dnis = \DB::select('call pa_android_obtenerDnisUsuario(?)',array($login[0]->nCodUsu));

        return response()->json(['usuario'=>$login,'dnis'=>$dnis]);
       // return response()->json($ultimosConsumos);
    }

    public function ultimosConsumosPorDni(Request $req){

        // dd($req->usu);
        $ultimosConsumos = \DB::select('call ultimosConsumosPorDniAndroid(?)',array($req->dni));
        $ultimosPagos = \DB::select('call ultimosPagosPorDniAndroid(?)',array($req->dni));
        return response()->json(['ultimosconsumos'=>$ultimosConsumos, 'ultimosPagos'=>$ultimosPagos]);
        // return response()->json($ultimosConsumos);
    }

    public function crearUsuario(Request $req){

        // dd($req->usu);
        $insert = \DB::select('call crearUsuariosAndroid(?,?,?,?)',array($req->cNomUsu,$req->cLoginUsu,$req->cPasswUsu,$req->cDni));
        //$ultimosPagos = \DB::select('call ultimosPagosPorDniAndroid(?)',array($req->dni));
        return response()->json(['respuesta'=>$insert]);
        // return response()->json($ultimosConsumos);
    }

    public function obtenerComensalesPorUsuario(Request $req){
        // dd($req->usu);
        $comensales = \DB::select('call obtenerComensalesPorUsuario(?)',array($req->id));
        //$ultimosPagos = \DB::select('call ultimosPagosPorDniAndroid(?)',array($req->dni));
        return response()->json(['comensales'=>$comensales]);
        // return response()->json($ultimosConsumos);
    }

    public function eliminarComensal(Request $req){
        // dd($req->usu);
        $status = \DB::select('call eliminarComensalAndroid(?,?)',array($req->nCodUsuCom,$req->nCodUsuAnd));
        //$ultimosPagos = \DB::select('call ultimosPagosPorDniAndroid(?)',array($req->dni));
        return response()->json(['respuesta'=>$status]);
        // return response()->json($ultimosConsumos);
    }

    public function buscarComensal(Request $req){
        // dd($req->usu);
        $comensal = \DB::select('call pa_android_buscarComensalPorDni(?)',array($req->dni));
        //$ultimosPagos = \DB::select('call ultimosPagosPorDniAndroid(?)',array($req->dni));
        return response()->json(['comensal'=>$comensal]);
        // return response()->json($ultimosConsumos);
    }

    public function agregarComensal(Request $req){
        // dd($req->usu);
        $status = \DB::select('call pa_android_agregarComensalUsuario(?,?)',array($req->nCodUsuAnd,$req->nCodCom));
        //$ultimosPagos = \DB::select('call ultimosPagosPorDniAndroid(?)',array($req->dni));
        return response()->json(['respuesta'=>$status]);
        // return response()->json($ultimosConsumos);
    }

    public function guardarDefault(Request $req){
        // dd($req->usu);
        $default = \DB::select('call pa_android_guardarComensalDefault(?,?)',array($req->nCodUsuAnd,$req->nCodCom));
        //$ultimosPagos = \DB::select('call ultimosPagosPorDniAndroid(?)',array($req->dni));
        return response()->json(['respuesta'=>$default]);
        // return response()->json($ultimosConsumos);
    }

}
