@extends('templates.main')

@section('content')



<!-- Header -->
								

								
@section('subtitle')
Home Becarios
@endsection                 <section id="search" class="alt">
                                
                              <!-- Search 
							{!! Form::open(['route'=>'empleados.index', 'method'=>'Get'])!!} -->
                            
                            	<section id="search" class="alt">
									<form method="post" action="#">
										<input type="text" name="query" id="query" placeholder="Buscar" />
									</form>
								</section>
                            

                            <!--
                            {!!Form::text('name', null,[ 'id'=>'query','placeholder'=>'Buscar'])!!}

                            {!!Form::close()!!}    
                                -->
                                </section>

       









	<table class="table table-striped">
     	<thead>
     		<th style="text-align: center;"><font size="4" color="deepskyblue"  >Foto</font></th>
     		<th style="text-align: center;"><font size="4" color="deepskyblue"  >Nombre Completo</font></th>
     		<th style="text-align: center;"><font size="4" color="deepskyblue"  >Cargo</font></th>
     		<th style="text-align: center;"><font size="4" color="deepskyblue"  >Identidad</font></th>
     		<th style="text-align: center;"><font size="4" color="deepskyblue"  >Universidad</font></th>
     		<th style="text-align: center;"><font size="4" color="deepskyblue"  >Editar</font></th>
     	</thead>
        <tbody>
         
          @foreach ($becarios as $becario)
              
           

        	<tr> 

                <td style="text-align: center;"> 
        			
                     @if($becario->images==null && $becario->genero=="Masculino" )
                  
                  
                    <a href="{{route('Becarios.perfil',$becario->id)}}"  class="image"><img src="{{asset('images/masculino.jpg')}}" 
                                    style=" 
                                    height: 70px;
                                    width: 70px;
                                    /* los siguientes valores son independientes del tamaño del círculo */
                                    background-repeat: no-repeat;
                                    background-position: 50%;
                                    
                                    background-size: 100% auto;" />
                    </a>
                  @elseif($becario->images==null && $becario->genero=="Femenino" )
                   
                    <a href="{{route('Becarios.perfil',$becario->id)}}"  class="image"><img src="{{asset('images/femenino.jpg')}}" 
                                    style=" 
                                    height: 70px;
                                    width: 70px;
                                    /* los siguientes valores son independientes del tamaño del círculo */
                                    background-repeat: no-repeat;
                                    background-position: 50%;
                                    
                                    background-size: 100% auto;" />
                    </a>
                  @elseif($becario->images!=null)
                    <a href="{{route('Becarios.perfil',$becario->id)}}"  class="image"><img src="" 
                                    style=" 
                                    height: 70px;
                                    width: 70px;
                                    /* los siguientes valores son independientes del tamaño del círculo */
                                    background-repeat: no-repeat;
                                    background-position: 50%;
                                    
                                    background-size: 100% auto;" />
                    </a>
                  @endif 
                    
    			

                </td>


        		
        		  <td style="color: rgb(150, 156, 156  ); text-align: center;"><br><br>{{$becario->nombre}}</td>
        		
                <td style="color: rgb(150, 156, 156  ); text-align: center;">            
                 <!--  @if($becario->cargo=="") -->
                  
                  <!-- @else  -->
                  <span ><br><br>{{$becario->cargo}}</span>
                 <!--  @endif -->
                </td>



        		<td style="color: rgb(150, 156, 156  ); text-align: center;">
                   <span ><br><br>{{$becario->identidad}}</span>
                      
                
              
                </td>

        		<td style="color: rgb(150, 156, 156  ); text-align: center;">
                          
                            <br><br>{{$becario->universidad}}

                         


                </td>

        		<td style="color: rgb(150, 156, 156  ); text-align: center;">
                    <a href="{{route('Becarios.edit',$becario->id)}}" class="image"><br><img src="{{asset('images/editar.png')}}" style="height: 70px; width: 70px;" ></a>
                </td>
        		


               
        	




            </tr>
@endforeach 
        </tbody>           
  
    </table>

    {!!$becarios->render()!!}



     <script  src="{{asset('plugins/js-especiales/mensajes.js')}}"> </script>
@endsection