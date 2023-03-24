@extends('layouts.admin')
@section('title', 'Configuración de la impresora')
@section('styles')
@endsection
{{-- @section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('printers.create')}}">
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
                Configuración de la impresora
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Panel de administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Configuración de la impresora</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Configuración de la impresora</h4>
                            <!--<i class="fas fa-ellipsis-v"></i>-->
                            {{-- <div class="btn-group">
                            <a data-toggle="dropdown" aria aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="{{route('printers.create')}}" class="dropdown-item">Agregar</a>
                              {{-- <button class="dropdown-item" type="button">Another action</button>
                              <button class="dropdown-item" type="button">Something else here</button>
                            </div>
                          </div> --}}
                        </div>
                        <div class="form-group col-md-6">
                            <strong>
                                <i class="fab fa-product-hunt mr-1 "></i>
                                Nombre
                            </strong>
                            <p class="text-muted">
                                {{ $printer->name }}
                            </p>

                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        @can('editar-impresora')
                            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                                data-target="#exampleModal-2">Actualizar</button>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
        aria-hidden="true">
        <div class="modal-dialog modal-xs" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel-2">Actualizar datos de empresa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::model($printer, ['route' => ['printers.update', $printer], 'method' => 'PUT', 'files' => true]) !!}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" value="{{ $printer->name }}"name="name" id="name" class="form-control"
                            placeholder="Nombre" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection
