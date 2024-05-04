<?php

namespace App\Http\Controllers;

use App\Models\Activo;
use App\Models\Baja;
use Illuminate\Http\Request;

class ActivoController extends Controller{
    public function index(Request $request){
        $filtro = $request->input('filtro');
        $filtro = Activo::where('nombre','ilike','%'.$filtro.'%')
            ->orWhere('codigo','ilike','%'.$filtro.'%')
            ->orderBy('id','asc')
            ->get();
        return $filtro;
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'stock' => 'required'
        ]);

        $activo = new Activo();
        $activo->codigo = $this->generateCodigo();
        $activo->nombre = $request->nombre;
        $activo->descripcion = $request->descripcion;
        $activo->cantidad_inicial = $request->stock;
        $activo->save();
        return $activo;
    }
    public function generateCodigo(){
        $ultimoActivo = Activo::orderBy('id','desc')->first();
        $codigo = $ultimoActivo->codigo;
        $codigo = str_replace('CM','',$codigo);
        $codigo = intval($codigo);
        $codigo++;
        $codigo = str_pad($codigo, 3, '0', STR_PAD_LEFT);
        $codigo = 'CM'.$codigo;
        return $codigo;
    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        $activo = Activo::find($id);
        $activo->nombre = $request->nombre;
        $activo->descripcion = $request->descripcion;
        $activo->save();
        return $activo;
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
