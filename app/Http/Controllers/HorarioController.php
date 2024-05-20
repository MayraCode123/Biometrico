<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Personal;
use App\Models\Date;
use Illuminate\Http\Request;
use App\Models\Horario;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HorarioController extends Controller
{
    public function index(Request $request){

        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        $registros = DB::table('personal')
        ->join('data_personal', 'data_personal.data_id_biometrico', '=', 'personal.data_personal_id')
        ->join('data', 'data.id_biometrico', '=', 'data_personal.data_id_biometrico')
        ->selectRaw('DATE(data.time) as fecha, data.name as nombre_usuario,
        GROUP_CONCAT(CONCAT(TIME(data.time), " - ", data.state)
        ORDER BY TIME(data.time)) as estados')
        ->when($fechaInicio && $fechaFin, function ($query) use ($fechaInicio, $fechaFin) {
            $query->whereBetween(DB::raw('DATE(data.time)'), [$fechaInicio, $fechaFin]);
        })
        ->groupBy(DB::raw('DATE(data.time)'), 'data.name')
        ->get();

        // $registrosAgrupadosArray = $registros->toArray();
        // return response()->json($registrosAgrupadosArray);
        return view('Horario.index',compact('registros'));


        // $registros = DB::table('data')
        // ->join('personal','personal.data_id','=','data.id')
        // ->where('personal.area_id','=',3)
        // ->get();
        // Agrupar los registros por la misma fecha y el mismo nombre
        // $registrosAgrupados = $registros->groupBy(function($registro) {
        //     return $registro->name . '-' . substr($registro->time, 0, 10); // Agrupa por nombre y fecha (sin la parte de la hora)
        // });
        // $registrosAgrupadosArray = $registrosAgrupados->toArray();
        // return response()->json($registrosAgrupadosArray);
    //     $datos = DB::table('data')
    //     ->join('data_horario', 'data.id_biometrico', '=', 'data_horario.data_id_biometrico')
    //     ->join('horario', 'horario.id', '=', 'data_horario.horario_id')
    //     ->select('data.*', 'horario.*')
    //     ->orderBy('data.time')
    //     ->get();

    // $datos_agrupados = $datos->groupBy(function($dato) {
    //     // Convertir la cadena de fecha en un objeto Carbon
    //     $fecha = Carbon::parse($dato->time);
    //     // Ahora puedes usar el método toDateString()
    //     return $fecha->toDateString();
    // });


    // return view('Horario.index', compact('datos_agrupados'));



    //return view('Horario.index',compact('registros'));
    }
    public function procesoCheck(){

    }
}
