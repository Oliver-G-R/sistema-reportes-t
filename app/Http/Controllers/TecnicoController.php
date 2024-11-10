<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\Tecnico;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    //
    public function index()
    {
        $tecnicos = Tecnico::all();
        return compact('tecnicos');
    }

    public function asignarTecnico(Request $request)
    {
        //update Reporte whith id_tecnico 
        $reporte = Reporte::find($request->id_reporte);
        $reporte->id_tecnico = $request->id_tecnico;
        $reporte->save();
        return redirect()->route('dashboard');
    }
}
