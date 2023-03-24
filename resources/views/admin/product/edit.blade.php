@extends('layouts.admin')
@section('title', 'Editar producto')
@section('styles')
@endsection
{{-- @section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('products.create')}}">
        <span class="btn btn-primary">+Crear nuevo</span>
    </a>
</li>
@endsection --}}
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Editar producto
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Panel de administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Producto</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar producto</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Editar producto</h4>
                        </div>
                        {!! Form::model($product, ['route' => ['products.update', $product], 'method' => 'PUT', 'files' => true]) !!}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" id="name" value="{{ $product->name }}"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        placeholder="Ingrese nombre del producto">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sell_price">Precio de Venta</label>
                                    <input type="number" name="sell_price" id="sell_price"
                                        value="{{ $product->sell_price }}"
                                        class="form-control form-control-sm @error('sell_price') is-invalid @enderror"
                                        placeholder="Ingrese precio de venta">
                                    @error('sell_price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id">Categoria</label>
                                    <select name="category_id" id="category_id"
                                        class="form-control selectpicker @error('category_id') is-invalid @enderror"
                                        data-live-search="true">
                                        <option value="" disabled selected>Seleccione una categoria</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if ($category->id == $product->category_id) selected @endif>{{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="provider_id">Proveedor</label>
                                    <select name="provider_id" id="provider_id"
                                        class="form-control selectpicker @error('provider_id') is-invalid @enderror"
                                        data-live-search="true">
                                        <option value="" disabled selected>Seleccione un proveedor</option>
                                        @foreach ($providers as $provider)
                                            <option value="{{ $provider->id }}"
                                                @if ($provider->id == $product->provider_id) selected @endif>{{ $provider->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('provider_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nic">Imagen del producto</label>
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input @error('imagen') is-invalid @enderror" id="picture"
                                            name="picture">
                                        @error('imagen')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <label class="custom-file-label" for="customFile" id="custom-label">Elegir
                                            archivo</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div style="position: relative; display: inline-block;">
                                        <img src="{{ $image_url }}" alt="" id="preview"
                                            style="max-width: 200px; max-height: 200px;">
                                        <button id="delete-button"
                                            style="position: absolute; top: -10px; right: -10px; padding: 5px; margin: 0; display: none; background-color: #f00; border: none; color: #fff; font-size: 18px;">&times;</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{ route('products.index') }}" class="btn btn-light">Cancelar</a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/previewImg.js') !!}
@endsection
