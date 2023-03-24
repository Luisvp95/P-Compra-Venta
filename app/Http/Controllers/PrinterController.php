<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Printer\UpdateRequest;
use App\Models\Printer;

class PrinterController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-impresora|editar-impresora', ["only"=>['index']]);
        $this->middleware('permission:editar-impresora', ['only'=>['edit','update']]);
    }

    public function index(){
    
        $printer = Printer::where('id',1)->firstOrFail();
        return view('admin.printer.index', compact('printer'));

    }

    public function update(UpdateRequest $request, Printer $printer)
    {
        $printer->update($request->all());
        return redirect()->route('printers.index');
    }
}
