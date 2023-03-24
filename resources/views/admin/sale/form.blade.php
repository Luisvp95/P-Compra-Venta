<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="client_id">Cliente</label>
            <select class="form-control selectpicker" data-live-search="true" name="client_id" id="client_id">
                <option value="" disabled selected>Seleccione un cliente</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="product_id">Producto</label>
            <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">
                <option value="" disabled selected>Seleccione un producto</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}_{{ $product->stock }}_{{ $product->sell_price }}">
                        {{ $product->name }}</option>
                @endforeach
            </select>
        </div>

    </div>

    <div class="col-md-4">

        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input type="number" name="quantity" id="quantity" class="form-control form-control-sm"
                aria-describedby="helpId" placeholder="">
        </div>

        <div class="form-group">
            <label for="tax">Impuesto</label>
            <input type="number" name="tax" id="tax" class="form-control form-control-sm"
                aria-describedby="helpId" placeholder="" value="0">
        </div>
    </div>

    <div class="col-md-4">

        <div class="form-group">
            <label for="discount">Descuento</label>
            <input type="number" name="discount" id="discount" class="form-control form-control-sm"
                aria-describedby="helpId" value="0">
        </div>
        <div class="form-group row">
            <div class="col">
                <label for="price">Precio de venta</label>
                <input type="number" name="price" id="price" class="form-control form-control-sm"
                    aria-describedby="helpId" disabled>
            </div>
            <div class="col">
                <label for="stock">Stock Actual</label>
                <input type="text" name="stock" id="stock" class="form-control form-control-sm" disabled>
            </div>
        </div>

    </div>
</div>



<div class="form-group mb-4">
    <button type="button" id="agregar" class="btn btn-primary float-right">Agregar producto</button>
</div>

<div class="form-group">
    <h4 class="card-title">Detalles de Venta</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio de venta</th>
                    <th>Descuento</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <p align="right">Total:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">Bs. 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">Total impuesto:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">Bs. 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
                        <p align="right">Total pagar:</p>
                    </th>
                    <th>
                        <p align="right"><span align="right" id="total_pagar_html">Bs. 0.00</span>
                            <input type="hidden" name="total" id="total_pagar">
                        </p>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
