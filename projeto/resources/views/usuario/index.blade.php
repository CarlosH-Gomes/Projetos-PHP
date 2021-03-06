@extends('layouts.app')
@section('content')

<div class="cotainer">
    <div class="app-title">
        <h1>
            <i class="fa fa-edit">Lista de Usuarios</i>
        </h1>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{url('home')}}">Menu
                    Principal</a></li>
        </ul>
    </div>
    <div class="container">
        @include('layouts.alert')
    </div>
    <div class="container">
        <div class="tile">
            <div class="tile-body">
            <form class="form form-inline" method="POST" action="{{url('/usuario/search')}}">
                    @csrf
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label col-sm-1">Nome:</label> <input
                                type="text" class="form-control col-sm-9" id="nome" name="nome"
                                placeholder="Digite um nome para pesquisar" 
                                value="{{$filters['nome'] ?? ''}}"/>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">
                                    Pesquisar <i class="fa fa-search-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="tile">
            <div class="tile-body">
            <div id="no-more-tables"> 
                <table class="table table-stripped table-bordered table-hover cf">
                    <thead class="cf">
                        <tr>
                            <th>Id</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($registros as $registro)
                            
                        
                            <tr >
                            <td data-title="Id" >{{$registro->id}}</td>
                                <td data-title="Nome">{{$registro->name}}</td>
                                <td data-title="Estado">{{$registro->email}}</td>
                    
                                <td data-title="Ação">
                                    <a class="btn btn-info btn-sm"
                                       href="{{route('usuario.alterar', $registro->id)}}"><i class="fa fa-pencil"></i></a> 
                                    <a class="btn btn-danger btn-sm"
                                        href="{{route('usuario.excluir',  $registro->id)}}"><i class="fa fa-trash"></i></a>
                                    <a class="btn btn-info btn-sm"
                                        href="{{route('usuario.consultar',  $registro->id)}}"><i class="fa fa-address-book"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(@isset($filters))
                    {{$registros->appends($filters)->links()}}
                @else 
                    {{$registros->links() }}
                @endisset
                
                <a class="btn btn-success btn-sm" href="{{route('usuario.novo')}}">Incluir
                    <i class="fa fa-plus-circle"></i>
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection