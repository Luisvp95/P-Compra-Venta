@extends('layouts.admin')
@section('title', 'Registrar ventas')
@section('styles')
{!! Html::style('select/dist/css/bootstrap-select.min.css') !!}
@endsection

@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Registro de ventas
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Panel de administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('sales.index')}}">Ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de ventas</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                {!! Form::open(['route'=>'sales.store', 'method'=>'POST']) !!}
                <div class="card-body">
                    {{--<div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de ventas</h4>
                    </div>--}}
                    @include('admin.sale.form')
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" id="guardar" class="btn btn-primary float-right">Registrar</button>
                    <a href="{{route('sales.index')}}" class="btn btn-light">Cancelar</a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {!! Html::script('js/actionSale.js') !!}
    {!! Html::script('select/dist/js/bootstrap-select.min.js') !!}
@endsection
    

