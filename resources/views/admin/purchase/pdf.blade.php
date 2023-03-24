<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Compra</title>
    <link rel="stylesheet" href="css/pdf-compra.css">
</head>

<body>
    <header>
        <h1>Boleta de Compra</h1>
        <div>
            <table id="datos">
                <thead>
                    <tr>
                        <th id="proveedor">DATOS DEL PROVEEDOR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <p id="proveedor">Nombre: {{ $purchase->provider->name }}<br>
                                Dirección: {{ $purchase->provider->address }}<br>
                                Teléfono: {{ $purchase->provider->phone }}<br>
                                Email:{{ $purchase->provider->email }}</p>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fact" class="">
            <p>NÚMERO DE COMPRA</p>
            <h3 class="text-center">{{ $purchase->id }}</h3>
        </div>
    </header>
    <br><br>
    <section>
        <div>
            <table id="facomprador">
                <thead>
                    <tr id="fv">
                        <th>COMPRADOR</th>
                        <th>FECHA COMPRA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $purchase->user->name }}</td>
                        <td>{{ $purchase->purchase_date }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    <br>
    <section>
        <div>
            <table id="facproducto">
                <thead>
                    <tr id="fa">
                        <th>Cantidad</th>
                        <th>PRODUCTO</th>
                        <th>PRECIO COMPRA</th>
                        <th>SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchaseDetails as $purchaseDetail)
                        <tr>
                            <td>{{ $purchaseDetail->quantity }}</td>
                            <td>{{ $purchaseDetail->product->name }}</td>
                            <td>Bs. {{ $purchaseDetail->price }}</td>
                            <td>Bs. {{ number_format($purchaseDetail->quantity * $purchaseDetail->price, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">
                            <p align="right">SUBTOTAL:</p>
                        </th>
                        <td>
                            <p align="right">Bs. {{ number_format($subtotal, 2) }}</p>
                        </td>
                    </tr>
                    @if ($purchase->tax == 0)
                    @else
                        <tr>
                            <th colspan="3">
                                <p align="right">TOTAL IMPUESTO {{ $purchase->tax }}%:</p>
                            </th>
                            <td>
                                <p align="right">Bs. {{ number_format(($subtotal * $purchase->tax) / 100, 2) }}</p>
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <th colspan="3">
                            <p align="right">TOTAL PAGAR:</p>
                        </th>
                        <td>
                            <p align="right">Bs. {{ number_format($purchase->total, 2) }}</p>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
    <br><br>
    <footer>
        <div id="datos">
            <p id="encabezado">

            </p>
        </div>
    </footer>
</body>


</html>
