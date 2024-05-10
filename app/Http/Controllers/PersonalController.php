<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Illuminate\Http\Request;
use App\Models\Personal;
use Illuminate\Support\Facades\DB;

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
        // return response()->json($personal);
        return view('personas.index', compact('area','unidad','personal','data'));
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
            $personal->save();
            return redirect()->route('personal');
    }
}
