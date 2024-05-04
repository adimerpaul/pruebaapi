<?php

namespace App\Http\Controllers;

use App\Models\Activo;
use App\Models\Baja;
use Illuminate\Http\Request;

class ActivoController extends Controller{
    public function index(){
        return Activo::orderBy('id','asc')->get();
    }
    public function store(Request $request){
        return Activo::create($request->all());
    }
    public function darBaja(Request $request){
        $baja = new Baja();
        $baja->cantidad = $request->cantidad;
        $baja->activo_id = $request->activoId;
        $baja->motivo = $request->motivo;
        $baja->fecha = $request->fecha;
        $baja->save();

        $activo = Activo::find($request->activoId);
        $activo->cantidad_inicial -= $request->cantidad;
        $activo->save();

    }
}
