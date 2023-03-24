<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Boleta de Compra</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            font-size: 36px;
        }

        td:last-child,
        th:last-child {
            text-align: right;
        }

        td,
        th {
            border-right: 1px solid #ddd;
        }

        td:nth-child(3),
        th:nth-child(3) {
            text-align: center;
        }

        @media screen and (max-width: 600px) {
            h1 {
                font-size: 28px;
            }

            td,
            th {
                border-right: none;
            }

            td:last-child,
            th:last-child {
                text-align: left;
            }
        }
    </style>
    <h1>Boleta de Compra</h1>
    <table>
        <tr>
            <th>N°</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Total</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Producto 1</td>
            <td>2</td>
            <td>$50.00</td>
            <td>$100.00</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Producto 2</td>
            <td>1</td>
            <td>$75.00</td>
            <td>$75.00</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Producto 3</td>
            <td>3</td>
            <td>$20.00</td>
            <td>$60.00</td>
        </tr>
        <tr>
            <td colspan="4">Total:</td>
            <td>$235.00</td>
        </tr>
    </table>
</body>

</html>
