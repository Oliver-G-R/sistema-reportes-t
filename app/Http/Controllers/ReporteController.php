<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Models\Reporte;
use App\Models\Tecnico;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    // public function up(): void
    // {
    //     Schema::create('reportes', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('nombre');
    //         $table->string('descripcion');
    //         $table->string('departamento');
    //         $table->string('telefono');
    //         $table->date('fecha');
    //         $table->time('hora');
    //         $table->foreignId('id_tecnico')
    //         ->nullable()
    //             ->constrained('tecnicos')
    //             ->onUpdate('cascade')
    //             ->onDelete('cascade');

    //         $table->timestamps();
    //     });
    // }
    public function index()
    {
        $reports = Reporte::with('tecnico')->get();
        $allTecnico = Tecnico::all();


        //




        return view('dashboard', compact('reports', 'allTecnico'));
    }


    public function store(ReportRequest $request)
    {
        $report = $request->all();

        $saveReport = Reporte::create($report);


        return redirect()->route('home');
    }

    //FILTER BY FECHA
    public function filterByDate(RequesT $request)
    {
        //show in consdole the request
        $reports = Reporte::where('fecha', $request->fecha)->get();
        $allTecnico = Tecnico::all();

        return  view('dashboard', compact('reports', 'allTecnico'));
    }
}
