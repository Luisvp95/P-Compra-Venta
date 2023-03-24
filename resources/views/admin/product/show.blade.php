@extends('layouts.admin')
@section('title', 'Información del producto')
@section('styles') 

@endsection
@section('create')

@endsection
@section('options')

@endsection
@section('preference')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{$product->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <img src="{{asset($product->image)}}" alt="profile" class="img-lg mb-3">
                                {{--<h3>{{$product->name}}</h3>--}}
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            {{--<div class="border-bottom py-4">
                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        Sobre producto
                                    </button>

                                    <button type="button" class="list-group-item list-group-item-action">
                                        Productos
                                    </button>

                                    <button type="button" class="list-group-item list-group-item-action">
                                        Registrar producto
                                    </button>
                                </div>
                            </div>--}}
                            <div class="py-4">
                                <p class="clearfix">
                                  <span class="float-left">
                                    Estado
                                  </span>
                                  <span class="float-right text-muted">
                                    {{$product->status}}
                                  </span>
                                </p>
                                <p class="clearfix">
                                  <span class="float-left">
                                    Proveedor
                                  </span>
                                  <span class="float-right text-muted">
                                    <a href="{{route('providers.show',$product->provider->id)}}">
                                    {{$product->provider->name}}
                                    </a>
                                  </span>
                                </p>
                                <p class="clearfix">
                                  <span class="float-left">
                                    Categoria
                                  </span>
                                  <span class="float-right text-muted">
                                    <a href="{{route('categories.show',$product->category->id)}}">
                                    {{$product->category->name}}
                                    </a>
                                  </span>
                                </p>
                              </div>
                              @if ($product->status == 'ACTIVE')
                              <button class="btn btn-success btn-block">{{$product->status}}</button>
                              @else
                              <button class="btn btn-warning btn-block">{{$product->status}}</button>
                              @endif
                              
                        </div>
                        <div class="col-lg-8 p1-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información de producto</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                    
                                <div class="d-flex align-items-start profile-feed-item">
                                    <div class="form-group col-md-6">
                                        <strong>
                                            <i class="fab fa-product-hunt mr-1"></i>
                                            Código
                                        </strong>
                                        <p class="text-muted">
                                            {{$product->code}}
                                        </p>
                                        <hr>
                                        <strong>
                                            <i class="fas fa-square"></i>
                                            Stock
                                        </strong>
                                        <p class="text-muted">
                                            {{$product->stock}}
                                        </p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong>
                                            <i class="fas fa-dollar-sign"></i>
                                            Precio de venta
                                        </strong>
                                        <p class="text-muted">
                                            {{$product->sell_price}}
                                        </p>
                                        <hr>
                                        <strong>
                                            <i class="fas fa-image"></i>
                                            Imagen
                                        </strong>
                                        <p class="text-muted">
                                            <img src="{{asset($product->image)}}" alt="profile" class="img-lg mb-3">
                                        </p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('products.index')}}" class="btn btn-primary float-right">Regresar</a>
                </div>
            </div>
        </div>
    </div>    
</div>    
@endsection
@section('scripts')

@endsection