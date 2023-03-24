@extends('layouts.admin')
@section('title', 'Reporte de reporte por rango de fecha')
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
                Reporte por rango de fecha
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Panel de administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Reporte por rango de fecha</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            {{-- <h4 class="card-title">Reporte por rango de fecha</h4>
                        <div class="btn-group">
                            <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                        </div> --}}
                        </div>
                        {!! Form::open(['route' => 'report.results', 'method' => 'POST']) !!}
                        <div class="row">
                            <div class="col-12 col-md-4 text-center">
                                <span>Fecha inicial</span>
                                <div class="form-group">
                                    <input type="date" class="form-control @error('fecha_ini') is-invalid @enderror"
                                        value="" name="fecha_ini" id="fecha_ini">
                                    @error('fecha_ini')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4 text-center">
                                <span>Fecha final</span>
                                <div class="form-group">
                                    <input type="date" class="form-control @error('fecha_fin') is-invalid @enderror"
                                        value="{{ old('fecha_fin') }}" name="fecha_fin" id="fecha_fin">
                                    @error('fecha_fin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4 text-center mt-4">
                                @can('consultar-fecha')
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-sm">Consultar</button>
                                    </div>
                                @endcan
                            </div>
                            <div class="col-12 col-md-3 text-center">
                                <span>Total Ingresos: <b></b></span>
                                <div class="form-group">
                                    <strong>{{ $total }}</strong>
                                </div>
                            </div>

                        </div>
                        {!! Form::close() !!}
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        @if (Gate::check('pdf-reporte-por-fecha') &&
                                                Gate::check('imprimir-reporte-por-fecha') &&
                                                Gate::check('detalle-reporte-por-fecha'))
                                            <th>Acciones</th>
                                        @elseif (Gate::check('pdf-reporte-por-fecha') ||
                                                Gate::check('imprimir-reporte-por-fecha') ||
                                                Gate::check('detalle-reporte-por-fecha'))
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
                                                @can('pdf-reporte-por-fecha')
                                                    <a href="{{ route('sales.pdf', $sale) }}" class="jsgrid-button">
                                                        <i class="far fa-file-pdf"></i>
                                                    </a>
                                                @endcan
                                                @can('imprimir-reporte-por-fecha')
                                                    <a href="{{ route('sales.print', $sale) }}" class="jsgrid-button">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                @endcan
                                                @can('detalle-reporte-por-fecha')
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
    {!! Html::script('js/fecha-fin.js') !!}
@endsection
