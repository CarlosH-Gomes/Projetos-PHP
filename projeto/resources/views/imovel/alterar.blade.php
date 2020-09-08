@extends('layouts.app')

@section('content')
	
		<div class="container">
			<div class="app-title">
				<h1>
					<i class="fa fa-edit">Alterar Imovel</i>
				</h1>
				<ul class="app-breadcrumb breadcrumb">
					<li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
				<li class="breadcrumb-item"><a href="{{url('/imovel/listar')}}">Pequisa
							de Imoveis</a></li>
				</ul>
			</div>
			<div class="tile">
				<div class="tile-body">
				<form action="{{url('/imovel/save', $registro->id)}}"	method="POST" >
						@csrf
							@include('imovel.__form')

						<input type="hidden"  id="id">
						<div class="tile-footer">
							<button type="submit" class="btn btn-primary">Alterar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	
	
@endsection