<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(){
        $data = Data::all();
        return view('Listado.index',compact('data'));
    }
}
