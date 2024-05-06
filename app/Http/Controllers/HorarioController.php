<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Date;
use Illuminate\Http\Request;
use App\Models\Horario;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HorarioController extends Controller
{
    public function index(Request $request){

        $now = Carbon::now();
        $end = $now->format('Y-m-d');
        $start = $now->subYear()->format('Y-m-d');

        $data = DB::table('personal')
            ->select('data.name as name', 'data.time as time', 'data.state as state', 'data.type as type')
            ->join('data', 'data.id_biometrico', '=', 'personal.data_id')
            ->join('data_horario', 'data_horario.data_id', '=', 'data.id')
            ->join('horario', 'horario.id', '=', 'data_horario.horario_id')
            ->whereMonth('data.time', 3) // Filtrar por el mes seleccionado
            ->get();


    return view('Horario.index', compact('data','now','start','end'));
    }
}
