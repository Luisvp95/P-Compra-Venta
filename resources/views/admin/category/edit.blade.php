@extends('layouts.admin')
@section('title', 'Editar categoria')
@section('styles')
@endsection
{{--@section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('categories.create')}}">
        <span class="btn btn-primary">+Crear nuevo</span>
    </a>
</li>
@endsection--}}
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Editar categoria
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Panel de administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar categoria</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar categoria</h4>
                    </div>
                    {!! Form::model($category,['route'=>['categories.update',$category], 'method'=>'PUT']) !!}
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Ingrese nombre de la categoria" value="{{$category->name}}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3" placeholder="Ingrese descripción de la categoria">{{$category->description}}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                    <a href="{{route('categories.index')}}" class="btn btn-light">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
    

