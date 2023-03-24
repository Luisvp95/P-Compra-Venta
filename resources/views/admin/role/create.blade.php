@extends('layouts.admin')
@section('title', 'Registrar roles')
@section('styles')
@endsection
{{--@section('create')
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('roles.create')}}">
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
            Registro de roles
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Panel de administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Roles</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de roles</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de roles</h4>
                    </div>
                    {!! Form::open(['route'=>'roles.store', 'method'=>'POST']) !!}
                    @include('admin.role.form')
                    <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                    <a href="{{route('roles.index')}}" class="btn btn-light">Cancelar</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {!! Html::script('js/select-all.js') !!}
@endsection
    

