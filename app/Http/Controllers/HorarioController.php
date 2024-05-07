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
        $data = DB::table('data')
        ->where('data.id_biometrico','=',4)
        ->get();

        dd($data);
        // return view('Horario.index');
    }
}
