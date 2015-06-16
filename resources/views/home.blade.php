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



					<?php

					   $BOM = new \SimpleXMLElement($datos);
				       //echo $datos;
			        	$numProductos = (int)$BOM->BO->Items->row->count();
						echo "<br>";
			       ?>
			       <br>
			       <div id="content">
						<div id="productos">
						 <?php for($i=0; $i<$numProductos; $i++){ ?>
			       	         <?php if((!empty($BOM->BO->Items->row[$i]->ItemName ) ) { $valor[$i]= (string)$BOM->BO->Items->row[$i]->ItemCode; ?>
                                  <form class="form-horizontal item" role="form" method="POST" action=<?php echo "Home/datos/".$valor[$i]; ?>>
                                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
					                   
					                     <div class="item">
											<h3><?=$BOM->BO->Items->row[$i]->ItemName;  ?></h3>
											<div class="info">
												<img class =" wp-image-1688   " alt="Sujeción" src="http://cesehsa.com.mx/cesehsa/wp-content/uploads/2013/06/Sujeción-240x150.png" rel="prettyPhoto" width="216" height="135">
												<p><?=$BOM->BO->Items->row[$i]->ItemCode; ?></p>
												
												<INPUT type="submit" value="Ver Detalles" class="btn btn-primary boton1" >
											</div>
										</div>
						           </form>
									   
							<?php } } ?>
						</div>
					</div>
			     
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

 