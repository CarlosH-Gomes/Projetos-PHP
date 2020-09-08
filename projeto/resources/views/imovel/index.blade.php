@extends('layouts.app')
@section('content')

<div class="cotainer">
    <div class="app-title">
        <h1>
            <i class="fa fa-edit">Lista de Usuários</i>
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
            <form class="form form-inline" method="POST" action="{{url('/imovel/search')}}">
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
                            <th>Rua</th>
                            <th>Bairro</th>
                            <th>Cidade</th>
                            <th>CEP</th>
                            <th>Proprietario</th>
                            <th>Modalidade</th>
                            <th>Valor</th>
                            <th>Tipo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($registros as $registro)
                            
                        
                            <tr >
                            <td data-title="Id" >{{$registro->id}}</td>
                                <td data-title="Rua">{{$registro->Rua}}</td>
                                <td data-title="Bairro">{{$registro->Bairro}}</td>
                                <td data-title="locador">{{$registro->cidade->Nome}}</td>
                                <td data-title="CEP" >{{$registro->CEP}}</td>
                                <td data-title="locador"><a href="{{route('locador.consultar', $registro->id)}}">{{$registro->locador->nome}}</a></td>
                                <td data-title="Estilo">{{$registro->Estilo}}</td>
                                <td data-title="Valor">{{$registro->Valor}}</td>
                                <td data-title="Tipo">{{$registro->Tipo}}</td>
                                <td data-title="Ação">
                                    <a class="btn btn-info btn-sm"
                                       href="{{route('imovel.alterar', $registro->id)}}"><i class="fa fa-pencil"></i></a> 
                                    <a class="btn btn-danger btn-sm"
                                        href="{{route('imovel.excluir',  $registro->id)}}"><i class="fa fa-trash"></i></a>
                                    <a class="btn btn-info btn-sm"
                                        href="{{route('imovel.consultar',  $registro->id)}}"><i class="fa fa-address-book"></i></a>
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
                
                <a class="btn btn-success btn-sm" href="{{route('imovel.novo')}}">Incluir
                    <i class="fa fa-plus-circle"></i>
                </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection