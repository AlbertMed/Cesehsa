@extends('app')
@section('titulo')
  Producto
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
					<?php
					   $BOM = new \SimpleXMLElement($datos);				       			        	
						echo "<br>";		
			       ?>

					<div id="content">
						<div id="detalle_producto">
							<h3><?php echo $BOM->BO->Items->row->ItemName; ?></h3>
							<img class =" wp-image-1688   " alt="Sujeción" src="http://cesehsa.com.mx/cesehsa/wp-content/uploads/2013/06/intercambiadores-240x150.jpg" rel="prettyPhoto" width="216" height="135">
							<div id="info_producto">
								<p><strong>Descripción: </strong><?php echo $BOM->BO->Items->row->ItemsGroupCode; ?></p>
								<p><strong>Precio: </strong>$ <?php echo ($BOM->BO->Items_Prices->row[0]->Price)*16; ?></p>
								<p><strong>En Stock: </strong><?php echo $BOM->BO->Items->row->QuantityOnStock; ?></p>
								<div class="row btn-group-justified">
									<div class="col-md-6">
										<button class="btn btn-block btn-info btn-xs glyphicon glyphicon-refresh">&nbsp;disponible</button>
									</div>
									<div class="col-md-6">
									<button class="btn btn-block btn-primary btn-xs glyphicon glyphicon-shopping-cart">&nbsp;Agregar
									</button>
										
									</div>								
								</div>							    
							</div>
						</div>
					</div>
			   </div>
		   </div>
	   </div>
   </div>
</div>
@endsection