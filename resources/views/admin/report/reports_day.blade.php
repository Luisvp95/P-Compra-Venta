@extends('layouts.admin')
@section('title', 'Reporte de reporte de ventas')
@section('styles')
@endsection
{{-- @section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('sales.create')}}">
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
                Reporte de ventas
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Panel de administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reporte de ventas</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            {{-- <h4 class="card-title">Reporte de ventas</h4>
                        <div class="btn-group">
                            <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                        </div> --}}
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4 text-center">
                                <span>Fecha de consulta: <b></b></span>
                                <div class="form-group">
                                    <strong>{{ \Carbon\Carbon::now()->format('d/m/y') }}</strong>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 text-center">
                                <span>Cantidad de registros: <b></b></span>
                                <div class="form-group">
                                    <strong>{{ $sales->count() }}</strong>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 text-center">
                                <span>Total Ingresos: <b></b></span>
                                <div class="form-group">
                                    <strong>{{ $total }}</strong>
                                </div>
                            </div>

                        </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        @if (Gate::check('pdf-reporte-dia') && Gate::check('imprimir-reporte-dia') && Gate::check('detalle-reporte-por-dia'))
                                            <th>Acciones</th>
                                        @elseif (Gate::check('pdf-reporte-dia') || Gate::check('imprimir-reporte-dia') || Gate::check('detalle-reporte-por-dia'))
                                            <th>Acciones</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                        <tr>
                                            <th scope="row">
                                                <a href="{{ route('sales.show', $sale) }}">{{ $sale->id }}</a>
                                            </th>
                                            <td>{{ $sale->sale_date }}</td>
                                            <td>{{ $sale->total }}</td>
                                            <td>{{ $sale->status }}</td>

                                            <td style="width: 100px;">
                                                {{-- {!! Form::open(['route'=>['sales.destroy',
                                            $sale], 'method'=>'DELETE']) !!}
                                            {{-- <a class="jsgrid-button jsgrid-edit-button" href="
                                            {{route('sales.edit', $sale)}}" title="Editar">
                                                <i class="far fa-edit"></i>
                                            </a> --}}
                                                {{-- <a class="jsgrid-button jsgrid-delete-button" type="submit" title="eliminar">
                                                <i class="fas fa-trash-alt"></i>
                                            </a> --}}
                                                @can('pdf-reporte-dia')
                                                    <a href="{{ route('sales.pdf', $sale) }}" class="jsgrid-button">
                                                        <i class="far fa-file-pdf"></i>
                                                    </a>
                                                @endcan
                                                @can('imprimir-reporte-dia')
                                                    <a href="{{ route('sales.print', $sale) }}" class="jsgrid-button">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                @endcan
                                                @can('detalle-reporte-por-dia')
                                                    <a href="{{ route('sales.show', $sale) }}"
                                                        class="jsgrid-button jsgrid-edit-button">
                                                        <i class="far fa-eye"></i>
                                                    </a>
                                                @endcan
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/alerts.js') !!}
    {!! Html::script('js/avgrund.js') !!}
@endsection
