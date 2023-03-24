<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\PurchaseDetails;
use App\Models\Provider;
use App\Models\Product;
use App\Http\Requests\Purchase\StoreRequest;
use App\Http\Requests\Purchase\UpdateRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-compra|crear-compra|detalle-compra|pdf-compra|imprimir-compra,', ['only' => ['index']]);
        $this->middleware('permission:crear-compra', ['only' => ['create', 'store']]);
        $this->middleware('permission:pdf-compra', ['only' => ['pdf']]);
        $this->middleware('permission:detalle-compra', ['only' => ['show']]);
        $this->middleware('permission:estado-compra', ['only' => ['change_status']]);
    }

    public function index()
    {
        $user = Auth::user();
        if ($user->email == 'admin@gmail.com') {
            // El usuario autenticado es el administrador
            $purchases = Purchase::get();
        } else {
            // El usuario autenticado no es el administrador
            $purchases = Purchase::where('user_id', $user->id)->get();
        }
        return view('admin.purchase.index', compact('purchases'));
    }

    public function create()
    {
        $providers = Provider::get();
        $products = Product::get();
        return view('admin.purchase.create', compact('providers', 'products'));
    }

    public function store(StoreRequest $request)
    {
        $purchase = Purchase::create(
            $request->all() + [
                'user_id' => Auth::user()->id,
                'purchase_date' => Carbon::now('America/La_Paz'),
            ],
        );

        foreach ($request->product_id as $key => $product) {
            $results[] = ['product_id' => $request->product_id[$key], 'quantity' => $request->quantity[$key], 'price' => $request->price[$key]];
        }
        $purchase->purchaseDetails()->createMany($results);

        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $detail) {
            $product = $detail->product;
            $product->stock += $detail->quantity;
            $product->save();
        }

        return redirect()->route('purchases.index');
    }

    public function show(Purchase $purchase)
    {
        $subtotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
        return view('admin.purchase.show', compact('purchase', 'purchaseDetails', 'subtotal'));
    }

    public function edit(Purchase $purchase)
    {
        $providers = Provider::get();
        return view('admin.purchase.show', compact('purchase'));
    }

    public function update(UpdateRequest $request, Purchase $purchase)
    {
        //$purchase->update($request->all());
        //return redirect()->route('purchases.index');
    }

    public function destroy(Purchase $purchase)
    {
        //$purchase->delete();
        //return redirect()->route('purchases.index');
    }

    public function pdf(Purchase $purchase)
    {
        $subtotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
        $pdf = PDF::loadView('admin.purchase.pdf', compact('purchase', 'subtotal', 'purchaseDetails'));

        return $pdf->stream('reporte_de_compra_' . $purchase->id . '.pdf');
    }

    public function upload(Request $request, Purchase $purchase)
    {
    }

    public function change_status($id, $status)
    {
        $purchase = Purchase::findOrFail($id);

        if ($status == 'canceled') {
            // Si el estado de la compra cambió de "valid" a "canceled"
            foreach ($purchase->purchaseDetails as $detail) {
                $product = $detail->product;
                $product->stock -= $detail->quantity;
                $product->save();

                if ($purchase->tax != 0) {
                    $purchase->total -= $detail->price * $detail->quantity + $detail->price * $detail->quantity * ($purchase->tax / 100);
                } else {
                    $purchase->total -= $detail->price * $detail->quantity;
                }
            }
        } elseif ($status == 'valid') {
            // Si el estado de la compra cambió de "canceled" a "valid"
            foreach ($purchase->purchaseDetails as $detail) {
                $product = $detail->product;
                $product->stock += $detail->quantity;
                $product->save();

                if ($purchase->tax != 0) {
                    $purchase->total += $detail->price * $detail->quantity + $detail->price * $detail->quantity * ($purchase->tax / 100);
                } else {
                    $purchase->total += $detail->price * $detail->quantity;
                }
            }
        }

        $purchase->status = $status;
        $purchase->save();

        return redirect()->route('purchases.index');
    }
}
