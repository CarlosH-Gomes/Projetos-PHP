@extends('layouts.app')

@section('content')
	
		<div class="container">
			<div class="app-title">
				<h1>
					<i class="fa fa-edit">Consultar Locadores</i>
				</h1>
				<ul class="app-breadcrumb breadcrumb">
					<li class="breadcrumb-item"><i class="fa fa-search fa-lg"></i></li>
				<li class="breadcrumb-item"><a href="{{url('/locador/listar')}}">Pequisa
							de Locadores</a></li>
				</ul>
			</div>
			<div class="tile">
				<div class="tile-body">
					<form action="{{url('/locador/listar')}}"	method="GET" >
						@csrf
							@include('locador.__form')

						<input type="hidden"  id="id">
						<div class="tile-footer">
							<button type="submit" class="btn btn-primary">Listagem</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	
	
@endsection