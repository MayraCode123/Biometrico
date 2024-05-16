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



    //     $datos = DB::table('data')
    //     ->join('data_horario', 'data.id_biometrico', '=', 'data_horario.data_id_biometrico')
    //     ->join('horario', 'horario.id', '=', 'data_horario.horario_id')
    //     ->select(
    //         'horario.name as nombre_de_horario',
    //         'horario.hr_entrada as hora_de_entrada',
    //         'horario.hr_salida as hora_de_salida',
    //         'horario.hr_entrada_min_tolerancia as horario_tolerancia',
    //         'horario.min_hr_entrada as min_antes_entrada',
    //         'horario.hr_min_salida as min_despues_salida',
    //         'data.state as estado',
    //         'data.name as nombre',
    //         DB::raw('TIME(data.time) as hora_biometrica')
    //     )
    //     ->where(function($query) {
    //         $query->where('data.state', '=', 'Entrada')
    //             ->whereRaw('TIME(data.time) >= horario.min_hr_entrada')
    //             ->whereRaw('TIME(data.time) <= horario.hr_entrada');

    //     })
    //     ->orWhere(function($query) {
    //         $query->where('data.state', '=', 'Salida')
    //             ->whereRaw('TIME(data.time) >= horario.hr_salida')
    //             ->whereRaw('TIME(data.time) <= horario.hr_min_salida');
    //     })
    //     ->get();

    // $registros = [];

    // foreach ($datos as $dato) {
    //     $registro = [
    //         'nombre_de_horario' => $dato->nombre_de_horario,
    //         'hora_de_entrada' => $dato->hora_de_entrada,
    //         'hora_de_salida' => $dato->hora_de_salida,
    //         'nombre' => $dato->nombre,
    //         'estado' => $dato->estado,
    //         'hora_biometrica' => $dato->hora_biometrica,
    //         'fecha_entrada' => null,
    //         'fecha_salida' => null
    //     ];

    //     if ($dato->estado == 'Entrada') {
    //         $registro['fecha_entrada'] = $dato->hora_biometrica;
    //     } elseif ($dato->estado == 'Salida') {
    //         $registro['fecha_salida'] = $dato->hora_biometrica;
    //     }

    //     // Buscar la entrada correspondiente para establecer la salida
    //     if ($dato->estado == 'Salida') {
    //         foreach ($registros as $registro_entrada) {
    //             if ($registro_entrada['nombre_de_horario'] === $dato->nombre_de_horario &&
    //                 $registro_entrada['nombre'] === $dato->nombre &&
    //                 $registro_entrada['fecha_entrada'] === null) {
    //                 $registro_entrada['fecha_salida'] = $dato->hora_biometrica;
    //                 break;
    //             }
    //         }
    //     }

    //     $registros[] = $registro;
    // }

    //return view('Horario.index',compact('registros'));
    }
    public function procesoCheck(){

    }
}
