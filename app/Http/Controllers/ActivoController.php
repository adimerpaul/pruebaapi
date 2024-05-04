<?php

namespace App\Http\Controllers;

use App\Models\Activo;
use Illuminate\Http\Request;

class ActivoController extends Controller{
    public function index(){
        return Activo::all();
    }
    public function store(Request $request){
        return Activo::create($request->all());
    }
}
