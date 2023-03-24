<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Client;
use App\Models\Product;
use App\Http\Requests\Sale\StoreRequest;
use App\Http\Requests\Sale\UpdateRequest;
use Carbon\Carbon;
use CustomCapabilityProfile;
use Illuminate\Support\Facades\Auth;

use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class SaleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-venta|crear-venta|pdf-venta|imprimir-venta|detalle-venta|estado-venta', ['only' => ['index']]);
        $this->middleware('permission:crear-venta', ['only' => ['create', 'store']]);
        $this->middleware('permission:pdf-venta', ['only' => ['pdf']]);
        $this->middleware('permission:imprimir-venta', ['only' => ['print']]);
        $this->middleware('permission:detalle-venta', ['only' => ['show']]);
        $this->middleware('permission:estado-venta', ['only' => ['change_statu']]);
    }

    public function index()
{
    $user = Auth::user();
    if ($user->email == 'admin@gmail.com') {
        // El usuario autenticado es el administrador
        $sales = Sale::get();
    } else {
        // El usuario autenticado no es el administrador
        $sales = Sale::where('user_id', $user->id)->get();
    }
    return view('admin.sale.index', compact('sales'));
}


    public function create()
    {
        $clients = Client::get();
        $products = Product::get();
        return view('admin.sale.create', compact('clients', 'products'));
    }

    public function store(StoreRequest $request)
    {
        $client = $request->input('client') ? $$request->input('client') : 1;

        $sale = Sale::create(
            [
                'client_id' => $client,
                'user_id' => Auth::user()->id,
                'sale_date' => Carbon::now('America/La_Paz'),
            ] + $request->except(['client']),
        );

        foreach ($request->product_id as $key => $product) {
            $results[] = ['product_id' => $request->product_id[$key], 'quantity' => $request->quantity[$key], 'price' => $request->price[$key], 'discount' => $request->discount[$key]];
        }
        $sale->saleDetails()->createMany($results);

        // Actualiza el stock después de crear los detalles de la venta
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $detail) {
            $product = $detail->product;
            $product->stock -= $detail->quantity;
            $product->save();
        }

        return redirect()->route('sales.index');
    }

    public function show(Sale $sale)
    {
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity * $saleDetail->price - ($saleDetail->quantity * $saleDetail->price * $saleDetail->discount) / 100;
        }
        return view('admin.sale.show', compact('sale', 'saleDetails', 'subtotal'));
    }

    public function edit(Sale $sale)
    {
        $clients = Client::get();
        return view('admin.sale.show', compact('sale'));
    }

    public function update(UpdateRequest $request, Sale $sale)
    {
        //$sale->update($request->all());
        //return redirect()->route('sales.index');
    }

    public function destroy(Sale $sale)
    {
        //$sale->delete();
        //return redirect()->route('sales.index');
    }

    public function pdf(Sale $sale)
    {
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity * $saleDetail->price - ($saleDetail->quantity * $saleDetail->price * $saleDetail->discount) / 100;
        }

        $pdf = PDF::loadView('admin.sale.pdf', compact('sale', 'subtotal', 'saleDetails'));

        return $pdf->stream('reporte_de_venta_' . $sale->id . '.pdf');
    }

    public function print(Sale $sale)
    {
        try {
            $subtotal = 0;
            $saleDetails = $sale->saleDetails;
            foreach ($saleDetails as $saleDetail) {
                $subtotal += $saleDetail->quantity * $saleDetail->price - ($saleDetail->quantity * $saleDetail->price * $saleDetail->discount) / 100;
            }

            $printer_name = 'TM20';

            $connector = new WindowsPrintConnector($printer_name);
            $printer = new Printer($connector);
            $printer->text("Bs 10\n");
            $printer->text("Bs 100\n");
            $printer->cut();
            $printer->close();

            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function change_status($id, $status)
    {
        $sale = Sale::findOrFail($id);

        if ($status == 'canceled') {
            // Si el estado de la venta cambió de "valid" a "canceled"
            foreach ($sale->saleDetails as $detail) {
                $product = $detail->product;
                $product->stock += $detail->quantity;
                $product->save();

                if ($sale->tax != 0) {
                    $sale->total -= $detail->price * $detail->quantity - $detail->price * $detail->quantity * ($detail->discount / 100) + ($detail->price * $detail->quantity - $detail->price * $detail->quantity * ($detail->discount / 100)) * ($sale->tax / 100);
                } else {
                    $sale->total -= $detail->price * $detail->quantity;
                }
            }
        } elseif ($status == 'valid') {
            // Si el estado de la vnta cambió de "canceled" a "valid"
            foreach ($sale->saleDetails as $detail) {
                $product = $detail->product;
                $product->stock -= $detail->quantity;
                $product->save();

                if ($sale->tax != 0) {
                    $sale->total += $detail->price * $detail->quantity - $detail->price * $detail->quantity * ($detail->discount / 100) + ($detail->price * $detail->quantity - $detail->price * $detail->quantity * ($detail->discount / 100)) * ($sale->tax / 100);
                } else {
                    $sale->total += $detail->price * $detail->quantity;
                }
            }
        }

        $sale->status = $status;
        $sale->save();

        return redirect()->route('sales.index');
    }
}
