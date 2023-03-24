<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Report\StoreRequest;
use App\Models\Sale;
use Carbon\Carbon;

class ReportController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-reporte-dia|pdf-reporte-dia|imprimir-reporte-dia|detalle-reporte-dia', ["only"=>['reports_day']]);
        $this->middleware('permission:ver-reporte-por-fecha|pdf-reporte-por-fecha|imprimir-reporte-por-fecha|detalle-reporte-por-fecha', ['only'=>['reports_date']]);
        $this->middleware('permission:consultar-fecha', ['only'=>['report_results']]);
    }
    public function reports_day(){

        $sales = Sale::whereDate('sale_date',Carbon::today('America/La_Paz'))->get();
        $total = $sales->sum('total');
        return view('admin.report.reports_day',compact('sales','total'));

    }

    public function reports_date(){

        $sales = Sale::whereDate('sale_date', Carbon::today('America/La_Paz'))->get();
        $total = $sales->sum('total');
        return view('admin.report.reports_date', compact('sales', 'total'));

    }

    public function report_results(StoreRequest $request){
        //dd($request);
        $sales = null;
        $total = 0;
        if ($request->fecha_ini && $request->fecha_fin) {
            $fi = $request->fecha_ini. '-00:00:00';
            $ff = $request->fecha_fin. '-23:59:59';
            $fecha_ini=$request->fecha_ini;
            //dd($fi, $ff);
            $sales = Sale::whereBetween('sale_date', [$fi, $ff])->get();
            $total = $sales->sum('total');
            return view('admin.report.reports_date', compact('sales', 'total', 'fecha_ini'));
        } else {
            return redirect()->route('reports.date')->withErrors(['msg', 'Debe proporcionar fechas válidas.']);
        }
    }
    
    
}
