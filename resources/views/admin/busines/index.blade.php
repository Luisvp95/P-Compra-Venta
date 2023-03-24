@extends('layouts.admin')
@section('title', 'Datos de la empresa')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Datos de la empresa
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Panel de administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Datos de la empresa</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Datos de la empresa</h4>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>
                                    <i class="fab fa-product-hunt mr-1"></i>
                                    Nombre
                                </strong>
                                <p class="text-muted">
                                    {{ $busine->name }}
                                </p>
                                <hr>
                                <strong>
                                    <i class="fas fa-square"></i>
                                    Descripción
                                </strong>
                                <p class="text-muted">
                                    {{ $busine->description }}
                                </p>
                                <hr>
                                <strong>
                                    <i class="fas fa-map-marked-alt mr-1"></i>
                                    Dirección
                                </strong>
                                <p class="text-muted">
                                    {{ $busine->address }}
                                </p>


                            </div>
                            <div class="form-group col-md-6">
                                <strong>
                                    <i class="fas fa-square"></i>
                                    NIC
                                </strong>
                                <p class="text-muted">
                                    {{ $busine->nic }}
                                </p>
                                <hr>
                                <strong>
                                    <i class="fas fa-envelope mr-1"></i>
                                    Correo
                                </strong>
                                <p class="text-muted">
                                    {{ $busine->email }}
                                </p>
                                <hr>
                                <strong>
                                    <i class="fas fa-image"></i>
                                    Logo
                                </strong>
                                <p class="text-muted">
                                    <img src="{{ asset($busine->logo) }}" alt="profile" class="img-lg mb-3">
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        @can('editar-empresa')
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
                {!! Form::model($busine, ['route' => ['busines.update', $busine], 'method' => 'PUT', 'files' => true]) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" value="{{ $busine->name }}"name="name" id="name"
                                    class="form-control form-control-sm @error('name') is-invalid @enderror"
                                    placeholder="Ingrese nombre del producto">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <input type="text" value="{{ $busine->description }}" name="description" id="description"
                                    class="form-control form-control-sm @error('description') is-invalid @enderror"
                                    placeholder="Ingrese precio de venta">
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Correo</label>
                                <input type="text" value="{{ $busine->email }}" name="email" id="email"
                                    class="form-control form-control-sm @error('email') is-invalid @enderror"
                                    placeholder="Ingrese correo electrónico">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Dirección</label>
                                <input type="text" value="{{ $busine->address }}" name="address" id="address"
                                    class="form-control form-control-sm @error('address') is-invalid @enderror"
                                    placeholder="Ingrese carnet de identidad">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nic">NIC</label>
                                <input type="text" value="{{ $busine->nic }}" name="nic" id="nic"
                                    class="form-control form-control-sm @error('nic') is-invalid @enderror"
                                    placeholder="Ingrese carnet de identidad">
                                @error('nic')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nic">Logo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('logo') is-invalid @enderror"
                                        id="picture" name="picture">
                                    @error('logo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <label class="custom-file-label" for="customFile" id="custom-label">Elegir
                                        archivo</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div style="position: relative; display: inline-block;">
                                    <img src="{{$image_url}}" alt="" id="preview"
                                        style="max-width: 200px; max-height: 200px;">
                                    <button id="delete-button"
                                        style="position: absolute; top: -10px; right: -10px; padding: 5px; margin: 0; display: none; background-color: #f00; border: none; color: #fff; font-size: 18px;">&times;</button>
                                </div>
                            </div>

                        </div>
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
    {!! Html::script('js/previewImg.js') !!}
@endsection
