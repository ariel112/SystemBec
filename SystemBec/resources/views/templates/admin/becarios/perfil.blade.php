@extends('templates.main')

@section('content')
								

		@section('subtitle')
		
		Perfil Becario    

		@endsection

            <!-- Fichiers CSS -->
			<link rel="stylesheet" href="{{ asset('plugins/cv/sheldon/reset.css')}}">
			<!--[if lt IE 9]> 
				<link rel="stylesheet" href="css/cv.css" media="screen">
			<![endif]-->
			<link rel="stylesheet" media="screen and (max-width:480px)" href="{{ asset('plugins/cv/sheldon/mobile.css')}}">

			<link rel="stylesheet" media="screen and (min-width:481px)" href="{{ asset('plugins/cv/sheldon/cv.css')}}">
			<link rel="stylesheet" media="print" href="{{ asset('plugins/cv/sheldon/print.css')}}">
     




	<header role="banner">
		<div style="background-color: #76a79d;height: 50%; width: 93%; position: absolute;"></div>

		<div class="row" style="padding-top: 150px;">
			<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
				<div class="row well">
					<div class="col-lg-6 col-md-6 col-sm-10 col-xs-12" style="height: 80%; width: 35%;">
		
						<!-- aqui va el codigo de la imagen-->
						@if($becarios->images==null && $becarios->genero=="Masculino" )
							<a href="{{route('Becarios.foto',$becarios->id)}}" class="image"><img src="{{asset('images/masculino.jpg')}}" alt="Maculino" class="img-responsive img-rounded" style="padding-top: 6.5%" /></a>
						@elseif($becarios->images==null && $becarios->genero=="Femenino" )
							<a href="{{route('Becarios.foto',$becarios->id)}}" class="image"><img src="{{asset('images/femenino.jpg')}}" alt="Maculino" class="img-responsive img-rounded" style="padding-top: 6.5%" /></a> 
						@elseif($becarios->images!=null)
							<a href="{{route('Becarios.foto',$becarios->id)}}" class="image">
							<img src="/images/perfiles/{{ $becarios->images->name}}" alt="no encontro la imagen" class="img-responsive img-rounded" style="padding-top: 6.5%" /></a>
						@endif

						<!-- Botones Editar Cargo y Editar Estado-->
						<br><br><br><a  href="{{route('asignar_estado.edit',$becarios->id)}}" class="btn btn-info btn-lg btn-block"><font class="glyphicon glyphicon-upload" size="4" style="color: black;">  Editar Estado</font></a>
	                    <br><br><a  href="{{route('asignar_cargo.edit',$becarios->id)}}" class="btn btn-info btn-lg btn-block"><font class="glyphicon glyphicon-upload" size="4"> Editar Cargo</font></a>

					</div>
					<div class="col-lg-7 col-md-6 col-sm-10 col-xs-12">
						<h1><b>{{$becarios->nombre}}</b></h1>

						<h2 style="color:#b9b1b1;"> {{$becarios->identidad}} </h2>

						<font size="6" style="padding: 8px;margin-top:  4px; color: black;" id="espaciados" class="glyphicon glyphicon-star"> {{$becarios->cargo}} </font>

						@if($becarios->estado=="")
						<div style="margin-top: 8px;">
							<div style="background: rgb(29, 206, 183); height: 40px; width: 154px; border-radius: 10px; padding-top:8px;">
								<font style="padding: 8px;margin-top:  4px; color: white;"  size="6"   > Aspirante</font>
							</div>
						</div>
						@elseif($becarios->estado=="Activo")           
						<div style="margin-top: 8px;">
							<div style="background: rgba(139,197,65,1); height: 40px; width: 100px; border-radius: 10px; padding-top:8px;">
							 	<a  data-toggle="modal" data-target="#myModal_estado" style="color: white; margin-top: 9px; padding-top: 20; ">
								<font style="padding: 8px;margin-top:  8px;" size="6"  > {{$becarios->estado}}</font></a>
							</div>
						</div>     
						@elseif($becarios->estado=="Desactivo")           
						<div style="margin-top: 8px;">
						     <div style="background: rgb(255, 25, 25); height: 40px; width: 165px; border-radius: 10px; padding-top:8px;">
								<a  data-toggle="modal" data-target="#myModal_estado" style="color: white; margin-top: 9px; padding-top: 20; ">
								<font style="padding: 8px;margin-top:  8px;" size="6"  > {{$becarios->estado}}</font></a>
						     </div>
						</div>
						@endif 

						<!--Codigo para ver cuando se vencieron los Historiales-->          
                        <?php 
                        #recorre a becarios para mostrar su historial
                        $datos='No tiene antecedentes Peneales';
                        foreach($becarios->historiales as $historiales){
                        	$datos= $historiales->created_at;
                        }
                                                       
                        #compara el valor obenido del antecedentes penales para hacer una condicion y ver cuando se vencen sus papeles
                        if ($datos=='No tiene antecedentes Peneales') {
							echo "<br><h5 class='glyphicon glyphicon-remove-sign' style='color:red;     word-spacing: -5pt;'> Sin historial</h5>";
						}  
                        else{
							$dato= $datos->diffForHumans(); 
							if($dato=="hace 6 meses"||$dato=="hace 7 meses"||$dato=="hace 8 meses" ||$dato=="hace 9 meses" ||$dato=="hace 10 meses" || $dato=="hace 11 meses"||$dato=="hace 1 año" ||$dato=="hace 2 años"||$dato=="hace 3 años" ||$dato=="hace 4 años" ||$dato=="hace 5 años"||$dato=="hace 6 años"||$dato=="hace 7 años" ||$dato=="hace 8 años"){
								echo "<br><h5 class='glyphicon glyphicon-remove-sign' style='color:red;'> Historial Desactualizados</h5>";
							}
							else{ 
								echo "<br><h6 class='glyphicon glyphicon-ok-sign' style='color:rgba(10,170,20,1);' > Historial Actualizados</h6>";
							}
						}         
						?>

						<!--Codigo para ver cuando se vencio la forma 03-->           
                        <?php 
                        #recorre a becarios para mostrar su forma 03
                        $pol='No tiene antecedentes Policiales';
                        foreach($becarios->formas03 as $forma03){
							$pol= $forma03->created_at;
						}
                                                       
                        #compara el valor obenido del antecedentes penales para hacer una condicion y ver cuando se vencen sus papeles
						if ($pol=='No tiene antecedentes Policiales') {
                        	echo "<br><font id='espaciado' class='glyphicon glyphicon-remove-sign' style='color:red;'> Sin forma 03</font>";
						}  
						else{
                        	$po= $pol->diffForHumans(); 
                            if($po=="hace 6 meses"||$po=="hace 7 meses"||$po=="hace 8 meses" ||$po=="hace 9 meses" ||$po=="hace 10 meses" || $po=="hace 11 meses"||$po=="hace 1 año" ||$po=="hace 2 años"||$po=="hace 3 años" ||$po=="hace 4 años" ||$po=="hace 5 años"||$po=="hace 6 años"||$po=="hace 7 años" ||$po=="hace 8 años"){
                            	echo "<br><h6 id='espaciados' class='glyphicon glyphicon-remove-sign' style='color:red;'> Forma 03</h6>";
                            }
                            else{
                            	echo "<br><h6 class='glyphicon glyphicon-ok-sign' style='color:rgba(10,170,20,1);'> Fotma 03</h6>";
                            }
                        }
                        ?>

                        <!-- Botones de Información de padres -->
                        <!-- Trigger the modal de la referencia -->
						<br><br><a data-toggle="modal" data-target="#myModal" class="btn btn-info btn-lg "><font class="glyphicon glyphicon-user" id="espaciados" size="4" face="arial" style="color: black;"> Datos de la madre</font></a>
						<!-- Trigger the modal del padre-->	
						<br><br><a data-toggle="modal" data-target="#myProyecto" class="btn btn-info btn-lg "><font class="glyphicon glyphicon-user" id="espaciados" size="4" face="arial"> Datos del padre</font></a>

					</div>
				</div>
				<div class="row">
					<div class="btn-group col-lg-11 col-lg-offset-1">
						<!-- Modal de la referencia de los becarios -->
						<div id="myModal"   class="modal fade" role="dialog">
						  <div class="modal-dialog" >
						    <!-- Modal content-->
						    <div class="modal-content" ">
						      <div class="modal-header">
						        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
						        <h4 class="modal-title" align="center" style="color: deepskyblue; ">Madre</h4>
						      </div>
						      <div class="modal-body">
						      	<font><b>Nombre:</b><font style="color: grey;"> {{$becarios->nombre_madre}}</font></font><br>
						      	<font><b>Identidad:</b><font style="color: grey;"> {{$becarios->identidad_madre}}</font></font><br>
						      	<font><b>Telefono:</b><font style="color: grey;"> {{$becarios->telefono_madre}}</font></font><br>
						      	<font><b>Email:</b><font style="color: grey;"> {{$becarios->correo_madre}}</font></font><br>
						      	<font><b>Direccion:</b><font style="color: grey;"> {{$becarios->direccion_madre}}</font></font><br><br>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>

						<!-- Modal del estado de los becarios -->
						<div id="myModal_estado" class="modal fade" role="dialog">
						  <div  class="modal-dialog">
						    <!-- Modal content-->
						    <div  class="modal-content">
						      <div class="modal-header">
						        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
						        <h4 class="modal-title" align="center" style="color:deepskyblue;" >Estado del becario</h4>
						      </div>
						      <div class="modal-body">
						        <font><b>Estado:</b><font style="color: grey;"> {{$becarios->estado}}</font></font><br>
						       	<font><b>Descripcion:</b> <br><font style="color: grey;">{{$becarios->descripcion}}</font></font>
						        <br>
						      </div>
						      <div class="modal-footer">
						      	<div align="left">
						      	    <font >Fecha de Actualizacion: <br><font style="color: grey;">{{$becarios->fecha_estado}}</font></font>
						      	</div>
						        <button type="button" class="btn" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>

						<div id="myProyecto" class="modal fade" role="dialog">
						  <div  class="modal-dialog">
						    <!-- Modal content-->
						    <div  class="modal-content">
						      <div class="modal-header">
						          <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
						        <h4 class="modal-title" align="center" style="color:deepskyblue;" >Padre</h4>
						      </div>
						      <div class="modal-body">
						        <font><b>Nombre:</b><font style="color: grey;"> {{$becarios->nombre_padre}}</font></font><br>
						      	<font><b>Identidad:</b><font style="color: grey;"> {{$becarios->identidad_padre}}</font></font><br>
						      	<font><b>Telefono:</b><font style="color: grey;"> {{$becarios->telefono_padre}}</font></font><br>
						      	<font><b>Email:</b><font style="color: grey;"> {{$becarios->correo_padre}}</font></font><br>
						      	<font><b>Direccion:</b><font style="color: grey;"> {{$becarios->direccion_padre}}</font></font><br>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 well">
						<section class="grafico-barras">
							<ul>
								<div align="center">
								  <font size="3"><b>Horas de Marzo<b></font ><br><br>
								</div>  	
					             <span class="barra-fondo">
					                <li class="barras" data-value="70"></li>
					             </span>				                        
							</ul>
						</section>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<hr style="height: 5px; width: 100%; background-color: #3BB44A;">
					</div><br>
				</div>
				<div class="row hidden-xs well">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<span><h3>Información del Becario</h3></span>
						<section role="main" class="container_16 clearfix">
							<div class="grid_16">
								<!-- Formacion academica -->
								<div align="center" class="grid_8 apropos">
									<h3 >Universidad</h3>				
									<font size="5" id="grids">{{$becarios->universidad}} </font>
								</div>
								<!-- Informacion Adicional -->
								<div align="center" class="grid_8 apropos">
									<h3>Direccion</h3>
									<font size="5" id="grids">{{$becarios->direccion}}</font>
									<br>
									<br>
									<br>
								</div>
									<br>
									<br>
									<br>
								<!-- Formacion Profesional -->
								<div align="center" class="grid_8 apropos">
									<h3>Carrera</h3>				
									<font size="5" id="grids">{{$becarios->carrera}}</font>
									<br>
									<br>
									<br>
								</div>
									
								<!-- Contact -->
								<div align="center" class="grid_8 apropos">
									<h3>Contacto</h3>
									<ul>
										<font size="5" id="grids">{{$becarios->telefono}}</font> <br>
									    <font size="5" id="grids">{{$becarios->correo}}</font>
									</ul>
								</div>
							</div>
						</section>
					</div>
				</div><br><br>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 well">
						<footer class="ariel">
							<div align="center">
								<ul>
									<li><h3>Documentos del Becario</h3></li>
									<font size="5"><li><a id="espaciados" href="{{route('Becarios.index-forma03',$becarios->id)}}"><font face="Comic Sans MS,arial,verdana" class="glyphicon glyphicon-picture" size="5" > Forma 03 </font></a></li></font><br>
									<font size="5"><li><a href="#"><font class="glyphicon glyphicon-book" size="5"> Historiales </font></a></li></font><br><br>
								</ul>
							</div>
							<div align="center">
								<ul>
									<li><h3>Registro de Horas</h3></li>
									<font size="5"><li><a id="espaciados" href="{{route('becarios.indexVoluntariado',$becarios->id)}}"><font face="Comic Sans MS,arial,verdana" class="glyphicon glyphicon-time" size="5"> Horas de Voluntariado </font></a></li></font><br>
									<font size="5"><li><a id="espaciados" href="{{route('Becarios.mostrar_horas',$becarios->id)}}"><font face="Comic Sans MS,arial,verdana" class="glyphicon glyphicon-tasks" size="5"> Historial de Horas </font></a></li></font><br>
									<font size="5"><li><a id="espaciados" href="{{route('voluntariado.show',$becarios->id)}}"><font face="Comic Sans MS,arial,verdana" class="glyphicon glyphicon-dashboard" size="5"> Horas de Actividades </font></a></li></font>
								</ul>
							</div>
						</footer>
					</div>
				</div>
			</div>
		</div>            
	</header>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">

	      <div class="modal-header">
	        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
	        <h4 class="modal-title" style="padding-left: 40%; color: red;">Referencia</h4>
	      </div>

	      <div class="modal-body">
	        <p><b>Nombre:</b> {{$becarios->name_refe}}</p>
	        
	        <p><b>Identidad:</b> {{$becarios->identidad_refe}}</p>
	        <p><b>Telefono:</b> {{$becarios->telefono_refe}}</p>
	        
	        <p><b>Email:</b> {{$becarios->email_refe}}</p>
	      	<p><b>Direccion:</b> <br><p style="color: grey;">{{$becarios->direccion_refe}}</p></p>
	        <br>
	       
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>

@endsection