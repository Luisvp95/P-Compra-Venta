<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Compra</title>
    <link rel="stylesheet" href="css/pdf-venta.css">

</head>

<body>
    <header>
        <h1>Boleta de Venta</h1>
        <div>
            <table id="datos">
                <thead>
                    <tr>
                        <th id="cliente">DATOS DEL VENDEDOR</th>
                    </tr>

                </thead>

                <tbody>
                    <tr>
                        <th>
                            <p id="cliente">Nombre: {{ $sale->user->name }}
                            </p>
                            <p id="cliente">Email:{{ $sale->user->email }}</p>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fact" class="">
            <p>NÚMERO DE VENTA</p>
            <h3 class="text-center">{{ $sale->id }}</h3>
        </div>
    </header>
    <br><br>
    <section>
        <div>
            <table id="facomprador">
                <thead>
                    <tr id="fv">
                        <th>CLIENTE</th>
                        <th>FECHA VENTA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $sale->client->name }}</td>
                        <td>{{ $sale->sale_date }}</td>
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
                        <th>PRECIO VENTA</th>
                        <th>DESCUENTO (%)</th>
                        <th>SUBTOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saleDetails as $saleDetail)
                        <tr>
                            <td>{{ $saleDetail->quantity }}</td>
                            <td>{{ $saleDetail->product->name }}</td>
                            <td>Bs. {{ $saleDetail->price }}</td>
                            <td>{{ $saleDetail->discount }} %</td>
                            <td>Bs.
                                {{ number_format($saleDetail->quantity * $saleDetail->price - ($saleDetail->quantity * $saleDetail->price * $saleDetail->discount) / 100, 2) }}
                            </td>
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
                    @if ($sale->tax == 0)
                    @else
                        <tr>
                            <th colspan="3">
                                <p align="right">TOTAL IMPUESTO {{ $sale->tax }}%:</p>
                            </th>
                            <td>
                                <p align="right">Bs. {{ number_format(($subtotal * $sale->tax) / 100, 2) }}</p>
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <th colspan="3">
                            <p align="right">TOTAL PAGAR:</p>
                        </th>
                        <td>
                            <p align="right">Bs. {{ number_format($sale->total, 2) }}</p>
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
