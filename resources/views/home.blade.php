@extends('app')
@section('titulo')
  Home
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
		  <div class="jumbotron">
		      <h2>Productos</h2>
		  </div>
			<div class="panel panel-default">
				<div class="panel-heading">Categorias</div>
				
                <div class="panel-body">             
                	<div class="row">

                	  <div class="col s3">
                	      <div class="card">
					           <div class="card-image">
					              <img src="http://www.nocturnar.com/forum/attachments/fondos-de-pantalla/28575d1338158805-paisajes-hermosos-fondo-de-pantalla-paisajes_hermosos_del_mundo2.jpg">
					              <span class="card-title">Grupo 1</span>
					            </div>
					            <div class="card-content">
					            <p>Descripción</p>
					            </div>
					            <div class="card-action">
					              <a href="{!! url('productos/1') !!}">Ver Productos</a>
					            </div>
					        </div>
                	    </div>

	                	   

                	   <div class="col s3">
                	      <div class="card">
					           <div class="card-image">
					              <img src="http://4.bp.blogspot.com/-KTZmIOaD-Hw/ThXbhM8YZ1I/AAAAAAAAAL4/Wg88j-PVX2M/s1600/supertadeo.jpg">
					              
					            </div>
					            <div class="card-content">
					              <h5> Grupo 1 </h5><p>Descripción</p>
					            </div>
					            <div class="card-action">
					              <a href="{!! url('productos/1') !!}">Ver Productos</a>
					            </div>
					        </div>
                	    </div>

                	   <div class="col s3">
                	      <div class="card">
					           <div class="card-image">
					              <img src="http://www.fondosya.com/wallpapers/paisaje_de_nevados-1280x800.jpg">
					              
					            </div>
					            <div class="card-content">
					              <h5> Grupo 1 </h5><p>Descripción</p>
					            </div>
					            <div class="card-action">
					              <a href="{!! url('productos/1') !!}">Ver Productos</a>
					            </div>
					        </div>
                	    </div>

                	    <div class="col s3">
                	      <div class="card">
					           <div class="card-image">
					              <img src="http://www.ueom.com/wp-content/uploads/paisajes-frios-2.jpg">
					              
					            </div>
					            <div class="card-content">
					              <h5> Grupo 1 </h5><p>Descripción</p>
					            </div>
					            <div class="card-action">
					              <a href="{!! url('productos/1') !!}">Ver Productos</a>
					            </div>
					        </div>
                	    </div>



                	</div> <!-- fin row-->
                </div> <!-- fin panel-body -->

			</div>
		</div>
	</div>
</div>
@endsection

 