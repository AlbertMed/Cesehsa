@extends('app')
		@section('titulo')
		  Home
		@endsection
		@section('content')
		<div class="container">
			
				<div class="col-md-12">
				  <div class="jumbotron">
				      <h2>Categoria 1</h2>
				  </div>
					<div class="panel panel-default">
						<div class="panel-heading">Productos &nbsp;Página - {{$datos->currentPage()}} </div>
						
		                <div class="panel-body">     
		                
		                @foreach($datos as $dato)
					       	         	    <div class="col-sm-6 col-md-3">
					       	         	      <div class="thumbnail">
					       	         	        <img clas="img-circle" src="http://cesehsa.com.mx/cesehsa/wp-content/uploads/2013/06/Sujeción-240x150.png" alt="...">
					       	         	        
					       	         	        <div class="text-center">
					       	         	          <h4>{{$dato->ItemName}}</h4> 
					       	         	          </div>
					       	         	          <p>
					       	         	          	<h6>Código:&nbsp;  {{$dato->ItemCode}}</h6>
													
					       	         	          </p> 
					       	         	          <div class="text-center">
					       	         	          <p><a href="{!! url('Home/datos/'.$dato->ItemCode) !!}" class="btn btn-primary" role="button">Ver Detalles</a>
					       	         	          </p>
					       	         	          <p><a href="{!! url('addItemCarrito/'.$dato->ItemCode) !!}" class="btn btn-primary" role="button">agregar</a>
					       	         	          </p>
					       	         	        </div>
					       	         	      </div>
					       	         	    </div>
						@endforeach
		                
		                </div> <!-- fin panel-body -->
		                <div class="text-center">{!! $datos->render() !!}</div>
                      
					</div>
				</div>
			
   </div>
@endsection			   