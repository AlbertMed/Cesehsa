@extends('app')
@section('titulo')
  Home
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Inicio</div>

				<div class="panel-body">
				Bienvenido &nbsp;
				@if (Auth::guest())
				   estas accediendo como invitado
				@else
				   {{Auth::user()->nombre}}
				@endif	
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
 