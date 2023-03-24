<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="provider_id">Proveedor</label>
            <select class="form-control selectpicker" data-live-search="true" name="provider_id" id="provider_id">
                <option value="" disabled selected>Seleccione un proveedor</option>
                @foreach ($providers as $provider)
                    <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="product_id">Producto</label>
            <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">
                <option value="" disabled selected>Seleccione un producto</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="price">Precio de compra</label>
            <input type="number" name="price" id="price" class="form-control form-control-sm" aria-describedby="helpId"
                placeholder="">
        </div>
        <div class="form-group row">
            <div class="col">
                <label for="quantity">Cantidad</label>
                <input type="number" name="quantity" id="quantity" class="form-control form-control-sm" aria-describedby="helpId"
                    placeholder="">
            </div>


            <div class="col">
                <label for="tax">Impuesto</label>
                <input type="number" name="tax" id="tax" class="form-control form-control-sm" aria-describedby="helpId"
                    placeholder="10%" value="0">
            </div>
        </div>



    </div>
</div>


<div class="form-group mb-4">
    <button type="button" id="agregar" class="btn btn-primary float-right">Agregar producto</button>
</div>

<div class="form-group">
    <h4 class="card-title">Detalles de Compra</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio</th>
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
                <tr id="dvOcultar">
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
