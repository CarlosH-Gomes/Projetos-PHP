@extends('layouts.app')

@section('content')
	
		<div class="container">
			<div class="app-title">
				<h1>
					<i class="fa fa-edit">Cadastro de Imoveis</i>
				</h1>
				<ul class="app-breadcrumb breadcrumb">
					<li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
				<li class="breadcrumb-item"><a href="{{url('/cidade/listar')}}">Pequisa
							de Cidades</a></li>
				</ul>
			</div>
			<div class="tile">
				<div class="tile-body">
				<form action="{{url('/cidade/salvar')}}"	method="POST" >
						@csrf
							@include('cidade.__form')

						<input type="hidden"  id="id">
						<div class="tile-footer">
							<button type="submit" class="btn btn-primary">Salvar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	
	
@endsection