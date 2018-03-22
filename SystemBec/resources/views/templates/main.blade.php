<!DOCTYPE html>
<html>
<head>
	<title>@yield('title','Educredito' )</title>

       
		  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		  <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		  <link rel="stylesheet" href="{{ asset('plugins/home/assets/css/main.css')}}" />
          
          <link rel="icon" type="image/png" href="{{asset('images/icon/beca.jpg')}}" />

 
        	<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
	
            
			            
           <link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">
		   <script src="{{ asset('plugins/home/assets/js/jquery.min.js')}}"></script>
  		   <script  src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"> </script>

            {!!Html::style('assets/css/smoke.css') !!}

           <link rel="stylesheet" type="text/css" href="{{asset('assets/css/smoke.css')}}">
           <link rel="stylesheet" type="text/css" href="{{asset('plugins/toastr/build/toastr.min.css')}}">
 
</head>
<body>
   <!--Barra de navegacion del programa 
	@include('templates.partials.nav') -->
     


   

<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main" style="background-color: white;">
						<div class="inner">


                                    <header id="header">
									<strong id="titulos1">@yield('subtitle','Home') <strong style="color: #b7b3b3;">EDUCREDITO</strong></strong>
									<ul class="icons" style="color: #c7ced4">
										<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
										<li><a href="#" class="icon fa-medium"><span class="label">Medium</span></a></li>
									</ul>
                								</header>
                         <br>
                         @include('flash::message') 
                        
				 			@yield('content')
            <!--en esta parte se iran agregando las cosas a mostra asi no afectara al menu de la aplicacion 
               -->



							<!-- Section de la parte de abajo -->
								<section>
									<header class="major">
										
									</header>
									<div class="posts">
										
									</div>
								</section>

						</div>
					</div>


				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Search 								<section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Buscar" />
									</form>
								</section>


							-->

						<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menú</h2>
									</header>
									<ul>
										<li><a id="decoracion" href="index.html">Inicio</a></li>
								
										<li>
											<span class="opener">Actividades</span>
											<ul>
												<li><a id="decoracion" href="{{route('Actividades.create')}}">Agregar Actividad</a></li>
												<li><a id="decoracion" href="{{route('Actividades.store')}}">Buscar Actividad</a></li>
												<li><a id="decoracion" href="{{route('Actividades.historial')}}">Historial de Actividad</a></li>
											</ul>
										</li>
										
										<li>
											<span class="opener">Becarios</span>
											<ul>
												<li><a id="decoracion" href="{{route('Becarios.create')}}">Agregar Becarios</a></li>
												<li><a id="decoracion" href="{{route('Becarios.store')}}">Buscar Becarios</a></li>
											</ul>
										</li>

										
						
										<li><a id="decoracion" href="elements.html">Estadísticas Generales</a></li>

										
									</ul>
								</nav>




								<!-- Section -->
								<section >
									<header class="major">
										<h2>TIPOS DE BECAS</h2>
									</header>
									<div id="piepagina" class="mini-posts">
										<article>
											<a href="#" class="image"><img src="{{asset('images/solidario.jpg')}}" alt="" /></a>
											<p>BECA SOLIDARIA</p>
										</article>
										<article>
											<a href="#" class="image"><img src="{{asset('images/gorro1.jpg')}}" alt="" /></a>
											<p>BECA JUVENTUD 20/20</p>
										</article>
										<article>
											<a href="#" class="image"><img src="{{asset('images/mundo1.jpg')}}" alt="" /></a>
											<p>BECA INTERNACIONAL </p>
										</article>
									</div>
									
								</section>












							<!-- Section -->
								<section >
									<header class="major">
										<h2>EDUCREDITO</h2>
									</header>
									<section id="piepagina">
										<p>El Programa Presidencial de Becas Honduras 20/20 tiene como objetivo brindar oportunidades educativas para un futuro mejor, potenciando al máximo la capacidad de formación de nuestros jóvenes hondureños.</p>
										<ul class="contact">
											<li class="fa-envelope-o"><a href="#">info@becashonduras2020.gob.hn</a></li>
											<li class="fa-phone">(504) 000-0000</li>
											<li class="fa-home">Col. Lomas del Guijarro frente a mueblería Elements,<br />
											Tegucigalpa</li>
										</ul>
									</section>	
								</section>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; EDUCREDITO. All rights reserved. <a href="https://html5up.net"> Corporaciones</a>.</p>
								</footer>

						</div>
					</div>

			</div>














             <!-- Scripts del cv JavaScript -->
			<script src="{{ asset('plugins/cv/sheldon/jquery-1.js')}}"></script>
			<script src="{{ asset('plugins/cv/sheldon/validate.js')}}"></script>
			<!--[if lt IE 9]>
			<script src="scripts/placeholder.js"></script>
			<![endif]-->
			<script src="{{ asset('plugins/cv/sheldon/plugins.js')}}"></script>
		
   

         	<!-- Scripts -->
			<script src="{{ asset('plugins/home/assets/js/jquery.min.js')}}"></script>
			<script src="{{ asset('plugins/home/assets/js/skel.min.js')}}"></script>
			<script src="{{ asset('plugins/home/assets/js/util.js')}}"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js')}}></script><![endif]-->
			<script src="{{ asset('plugins/home/assets/js/main.js')}}"></script>
             
            <script src="{{ asset('assets/js/smoke.js')}}"></script>
            <script src="{{ asset('assets/lang/es.js')}}"></script>

			{!!Html::script('assets/js/smoke.js') !!}
			{!!Html::script('assets/lang/es.js') !!}


			<script  src="{{asset('plugins/toastr/build/toastr.min.js')}}"> </script>

</body>
</html>