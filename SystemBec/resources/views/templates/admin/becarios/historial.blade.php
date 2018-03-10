@extends('templates.main')

@section('content')

<!--
        
<link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}">

 Header -->
						

								
@section('subtitle')
Historial de todas las horas
@endsection

        <!-- Search
                            {!! Form::open(['route'=>'proyectos.index', 'method'=>'Get'])!!} -->
                         
                             
                            <!--
                            {!!Form::text('name', null,[ 'id'=>'query','placeholder'=>'Buscar'])!!}

                            {!!Form::close()!!}    
                                </section>
                                -->
       <p style="text-align: center; color: #333333;">
             <font size="4" id="mes" >
              <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Horas Acomuladas  </font >
           </p>
      <br><br>  

	<table class="table table-striped">
     	<thead>
     	<th class="success"  id="letra" style="text-align: center;">Mes</th>
        <th class="success"  id="letra"   style="text-align: center;">Horas</th>
        </thead>
        <tbody>
         </tbody>
    
     </table>

     
   


@endsection