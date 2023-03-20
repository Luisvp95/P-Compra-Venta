@extends('layouts')
@section('title', 'Gestion de Categorias')
@section('styles')
@endsection
@section('options')
@endsection
@section('preferences')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Categorias
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Panel de administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categorias</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Categorias</h4>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <td>
                                        <a href="{{route('categories.show', $category)}}">
                                        {{$category->name}}</a>
                                    </td>
                                    <th>Descripción</th>
                                    
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category )
                                    <tr>
                                        <th scope="row">{{$category->id}}</th>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description}}</td>
                                    
                                        <td style="width: 50px;">
                                            {!! Form::open(['route'=>['categories.destroy',
                                            $category], 'method'='DELETE']) !!}
                                            <a class="jsgrid-button jsgrid-edit-button" href="
                                            {{route('categories.edit', $category)}}" title="Editar">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach-
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
    {!! Html::scripts('melody/js/data-table.js') !!}
@endsection
    

