<?php

namespace App\Http\Controllers\configuracion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class CanchasController extends Controller
{
    public function index()
    {

        $listadocanchas = \DB::select('call pa_obtenercanchas(?)',
            array(Auth::user()->id));


        return view('configuracion/conf_canchas', compact('listadocanchas'));
    }

    public function modal_cancha_nueva(){
        return view('configuracion/nuevaCancha');
    }

    public function getArancelRustPorAnio(Request $request){
        header('Content-type: application/json');
        //dd($request['id_sect']);

        $totalg = DB::select("select count(id_ara_p_r) as total from catastro.vw_arancel_pred_rust where anio = '". $request->anio ."'");
        $page = $_GET['page'];
        $limit = $_GET['rows'];
        $sidx = $_GET['sidx'];
        $sord = $_GET['sord'];

        $total_pages = 0;
        if (!$sidx) {
            $sidx = 1;
        }
        $count = $totalg[0]->total;
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        }
        if ($page > $total_pages) {
            $page = $total_pages;
        }
        $start = ($limit * $page) - $limit; // do not put $limit*($page - 1)
        if ($start < 0) {
            $start = 0;
        }

       // $sql = DB::select("select * from catastro.vw_arancel_pred_rust where anio = '". $request->anio ."' orderby");

        $sql = DB::table('catastro.vw_arancel_pred_rust')->where('anio',$request->anio)->orderBy($sidx, $sord)->limit($limit)->offset($start)->get();
        //$sql = DB::table('adm_tri.vw_uit')->orderBy($sidx, $sord)->limit($limit)->offset($start)->get();
        $Lista = new \stdClass();
        $Lista->page = $page;
        $Lista->total = $total_pages;
        $Lista->records = $count;

        foreach ($sql as $Index => $Datos) {
            $Lista->rows[$Index]['id'] = $Datos->id_ara_p_r;
            $Lista->rows[$Index]['cell'] = array(
                trim($Datos->id_ara_p_r),
                trim($Datos->anio),
                trim($Datos->id_gpo_tierra),
                trim($Datos->id_gpo_cat),
                trim($Datos->gpo_descrip),
                trim($Datos->categoria),
                trim($Datos->arancel_rustico),
            );
        }

        return response()->json($Lista);
//        echo json_encode($table);
//        dd($table);
    }

    public function show($id)
    {
        return view('configuracion/editarCancha');
    }

    public function getSectores(){
        header('Content-type: application/json');
        $sectores = DB::select('select * from catastro.sectores order by id_sec');
        return response()->json($sectores);
    }

    public function insert_new_pred_rust(Request $request){
        header('Content-type: application/json');
        $data = $request->all();
        $insert=DB::table('catastro.arancel_pred_rust')->insert($data);

        if ($insert) return response()->json($data);
        else return false;
    }

    function update_pred_rust(Request $request) {
        $data = $request->all();
        unset($data['id_ara_p_r']);
        $update=DB::table('catastro.arancel_pred_rust')->where('id_ara_p_r',$request['id_ara_p_r'])->update($data);
        if ($update){
            return response()->json([
                'msg' => 'si',
            ]);
        }else return false;
    }

    function delete_aran_pred_rust(Request $request){
//        $user = DB::table('adm_tri.contribuyentes')->select('usuario')->where('id_pers', '=', $request['id'])->get();
        $delete = DB::table('catastro.arancel_pred_rust')->where('id_ara_p_r', $request['id_ara_p_r'])->delete();

        if ($delete) {
            return response()->json([
                'msg' => 'si',
            ]);
        }
    }


    
}
