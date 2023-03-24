<div class="form-group">
    <label for="name">Nombre del rol</label>
    {{-- {!! Form::text('name', null, array('class'=>'form-control'))!!} --}}
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
        placeholder="Ingrese nombre del rol">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Permisos para este rol</label>
    @if ($errors->has('permission'))
        <div class="invalid-feedback d-block">{{ $errors->first('permission') }}</div>
    @endif
</div>

<div class="form-group">
    <label>{{ Form::checkbox('select_all', 1, false, ['id' => 'select_all']) }} Seleccionar todo</label>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group checkbox-grid">
            <h3 class="h5 mb-4">Permisos Usuario</h3>
            @foreach ($userPermission as $id => $name)
                <label>
                    {{ Form::checkbox('permission[]', $id, false, ['class' => 'name' . ($errors->has('permission') ? ' is-invalid' : ''), 'name' => 'permission[]']) }}
                    {{ Form::label($name, $name, ['class' => 'form-check-label']) }}
                </label>
                <br>
            @endforeach

        </div>

    </div>
    <div class="col-md-3">
        <div class="form-group checkbox-grid">
            <h3 class="h5 mb-4">Permisos de rol</h3>
            @foreach ($rolPermission as $id => $name)
                <label> {{ Form::checkbox('permission[]', $id, false, ['class' => 'name']) }}
                    {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
            @endforeach
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group checkbox-grid">
            <h3 class="h5 mb-4">Permisos de categoria</h3>
            @foreach ($categoryPermission as $id => $name)
                <label> {{ Form::checkbox('permission[]', $id, false, ['class' => 'name']) }}
                    {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
            @endforeach
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group checkbox-grid">
            <h3 class="h5 mb-4">Permisos de cliente</h3>
            @foreach ($clientPermission as $id => $name)
                <label> {{ Form::checkbox('permission[]', $id, false, ['class' => 'name']) }}
                    {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
            @endforeach
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group checkbox-grid">
            <h3 class="h5 mb-4">Permisos de producto</h3>
            @foreach ($productPermission as $id => $name)
                <label> {{ Form::checkbox('permission[]', $id, false, ['class' => 'name']) }}
                    {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
            @endforeach
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group checkbox-grid">
            <h3 class="h5 mb-4">Permisos de proveedor</h3>
            @foreach ($providerPermission as $id => $name)
                <label> {{ Form::checkbox('permission[]', $id, false, ['class' => 'name']) }}
                    {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
            @endforeach
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group checkbox-grid">
            <h3 class="h5 mb-4">Permisos de compra</h3>
            @foreach ($purchasePermission as $id => $name)
                <label> {{ Form::checkbox('permission[]', $id, false, ['class' => 'name']) }}
                    {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
            @endforeach
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group checkbox-grid">
            <h3 class="h5 mb-4">Permisos de venta</h3>
            @foreach ($salePermission as $id => $name)
                <label> {{ Form::checkbox('permission[]', $id, false, ['class' => 'name']) }}
                    {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
            @endforeach
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group checkbox-grid">
            <h3 class="h5 mb-4">Permisos de reporte</h3>
            @foreach ($reportPermission as $id => $name)
                <label> {{ Form::checkbox('permission[]', $id, false, ['class' => 'name']) }}
                    {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
            @endforeach
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group checkbox-grid">
            <h3 class="h5 mb-4">Permisos de empresa</h3>
            @foreach ($businesPermission as $id => $name)
                <label> {{ Form::checkbox('permission[]', $id, false, ['class' => 'name']) }}
                    {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
            @endforeach
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group checkbox-grid">
            <h3 class="h5 mb-4">Permisos de impresora</h3>
            @foreach ($printerPermission as $id => $name)
                <label> {{ Form::checkbox('permission[]', $id, false, ['class' => 'name']) }}
                    {{ Form::label($name, $name, ['class' => 'form-check-label']) }}</label> <br>
            @endforeach
        </div>
    </div>

</div>
