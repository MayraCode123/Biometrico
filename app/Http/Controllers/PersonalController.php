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
        ->join(DB::raw('(SELECT DISTINCT id_biometrico, name FROM data) as data'), 'personal.data_id', '=', 'data.id_biometrico')
        ->join('area','area.id','=','personal.area_id')
        ->join('unidad','unidad.id','=','personal.unidad_id')
        ->get();
        $data = DB::table('data')->distinct()->get(['id_biometrico', 'name']);
        // dd($data);
        $area = DB::table('area')->get();
        $unidad = DB::table('unidad')->get();
        return view('personas.index', compact('data','area','unidad','personal'));

    }
    public function store(Request $request){

            $personal = new Personal();
            $personal->name = $request->name;
            $personal->data_id = $request->data_id;
            $personal->area_id = $request->area_id;
            $personal->unidad_id = $request->unidad_id;
            $personal->save();
            return redirect()->route('personal');
    }
}
