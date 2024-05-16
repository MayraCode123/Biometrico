<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Illuminate\Http\Request;
use App\Models\Personal;
use App\Models\Cargo;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PersonalController extends Controller
{
    public function index(){
        $personal = DB::table('personal')
        ->select('personal.id', 'personal.name as name', 'data.name as data','area.name as area_name','unidad.name as unidad_name')
        ->join('area','area.id','=','personal.area_id')
        ->join('unidad','unidad.id','=','personal.unidad_id')
        ->join('data_personal','data_personal.data_id_biometrico','=','personal.data_personal_id')
        ->join('data','data.id_biometrico','=','data_personal.data_id_biometrico')

        ->distinct('personal.id')
        ->get();
        // return response()->json($personal);

        $data = DB::table('data')->distinct()->get(['id_biometrico', 'name']);
        $area = DB::table('area')->get();
        $unidad = DB::table('unidad')->get();
        $cargo = DB::table('cargo')->get();
        // return response()->json($personal);
        return view('personas.index', compact('area','unidad','personal','data','cargo'));
    }
    // public function index(){
    //     $personal = DB::table('personal')
    //     ->select('personal.id', 'personal.name as name', 'data.name as data','area.name as area_name','unidad.name as unidad_name')
    //     ->join(DB::raw('(SELECT DISTINCT id_biometrico, name FROM data) as data'), 'personal.data_id', '=', 'data.id_biometrico')
    //     ->join('area','area.id','=','personal.area_id')
    //     ->join('unidad','unidad.id','=','personal.unidad_id')
    //     ->get();
    //     $data = DB::table('data')->distinct()->get(['id_biometrico', 'name']);
    //     // dd($data);
    //     $area = DB::table('area')->get();
    //     $unidad = DB::table('unidad')->get();


    public function store(Request $request){

            $personal = new Personal();
            $personal->name = $request->name;
            $personal->data_personal_id = $request->data_personal_id;
            $personal->unidad_id = $request->unidad_id;
            $personal->area_id = $request->area_id;
            $personal->cargo_id = $request->cargo_id;
            $personal->save();
            return redirect()->route('personal');
    }
    public function lista($id){
        $persona = DB::table('personal')
        ->join('cargo','cargo.id','=','personal.cargo_id')
        ->select('personal.id as id','cargo.name as name_cargo','personal.name as name_personal')
        ->where('personal.id', $id)
        ->first();
        // $persona = DB::table('personal')
        // ->join('cargo','cargo.id','=','personal.cargo_id')
        // ->select('personal.name as name','cargo.name as cargo')
        // ->get();
        $registros = DB::table('personal')
        ->join('data_personal', 'data_personal.data_id_biometrico', '=', 'personal.data_personal_id')
        ->join('data', 'data.id_biometrico', '=', 'data_personal.data_id_biometrico')
        ->selectRaw('DATE(data.time) as fecha, data.name as nombre_usuario,
        GROUP_CONCAT(CONCAT(TIME(data.time), " - ", data.state)
        ORDER BY TIME(data.time)) as estados')
        ->where('personal.id', $id)
        ->groupBy('fecha', 'nombre_usuario') // Agregar esta línea
        ->get();
        // $check = DB::table('data')
        // ->join('data_horario','data.id_biometrico','=','data.id')
        // ->join('horario','horario.id','data_horario.horario_id')
        // ->get();

        // $registrosAgrupadosArray = $persona->toArray();
        // return response()->json($registrosAgrupadosArray);
        return view('personas.lista',compact('registros','persona'));
    }
}
