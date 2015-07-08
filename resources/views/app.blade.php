<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>CESEHSA | @yield('titulo')</title>

    {!! Html::style('css/estilos.css') !!}
 {{--    {!! Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('bower_components/bootstrap-material-design/dist/css/material.min.css') !!}
    {!! Html::style('bower_components/bootstrap-material-design/dist/css/material-fullpalette.min.css') !!}
    {!! Html::style('bower_components/bootstrap-material-design/dist/css/ripples.min.css') !!} --}}
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css') !!} 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">one</a></li>
  <li><a href="#!">two</a></li>
  <li class="divider"></li>
  <li><a href="#!">three</a></li>
</ul>
<nav>
  <div class="nav-wrapper">
    <a href="{!! url('/') !!}" class="brand-logo"><i class="material-icons right">business</i> &nbsp; Cesehsa</a>
    <ul class="right hide-on-med-and-down">
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-button" href="#!" data-activates="dropdown1"> <i class="material-icons left">person_pin</i>Invitado<i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>
   <!--
	<nav>
		<div class="nav-wrapper">
			<div class="navbar-header">
				<button type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<a class="navbar-brand" href="#"><strong>Cesehsa</strong></a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{!! url('/') !!}" class="glyphicon glyphicon-home"></a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest()) 
					<li class="dropdown">
							<a href="#" class="dropdown-toggle  glyphicon glyphicon-user" data-toggle="dropdown" role="button" aria-expanded="false"> Invitado <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{!! url('/auth/login') !!}">Inicio de Sesión</a></li>
						        <li><a href="{!! url('/auth/register') !!}">Registrate</a></li>
							</ul>
						</li>
						
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle  glyphicon glyphicon-user" data-toggle="dropdown" role="button" aria-expanded="false"> {{ Auth::user()->nombre }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{!! url('/auth/logout') !!}">Cerrar Sesión</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
    -->
	@yield('content')

	<!-- Scripts
	{!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
	{!! Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
    {!! Html::script('bower_components/bootstrap-material-design/dist/js/ripples.min.js') !!}
	{!! Html::script('bower_components/bootstrap-material-design/dist/js/material.min.js') !!}
	-->
	<!-- Compiled and minified JavaScript -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js') !!}

     	
	<script>
      
     $(document).on('ready', function(){
    $(".dropdown-button").dropdown();
     });
	</script>
	

</body>
</html>
