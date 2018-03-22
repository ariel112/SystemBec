@extends('templates.main')


@section('content')

						
@section('subtitle')
Agregar Actividad
@endsection

<div  class="row">
<div class="col-md-5">

      {!! Form::open(['route' => 'Actividades.store', 'method'=>'POST', 'files'=>true, 'id'=>'formEmpty','data-smk-icon'=>'glyphicon-remove-sign']) !!}
   <br>
   <br>
	   <div class="form-group" >
	   
	   		{!! Form::label('name','Nombre de la actividad') !!}
	   		{!! Form::text('nombre',null,['class'=>'form-control','required','placeholder'=>'Nombre de la actividad'])!!}
	   	
	   </div>
       <br>
       	{!! Form::label('name','Horas de la actividad') !!}
	   	
       <div class="form-group" style="width: 110px;" >
	   		<div style="width: 80px;">
	   		    {!! Form::number('horas',null,['class'=>'form-control','min'=>'1','max'=>'12', 'required'])!!}
	   		</div>
	   </div>
	   
	   <br>
	   <div class="form-group" >
	   		{!! Form::label('lugar','Lugar de la actividad') !!}
	   		{!! Form::text('lugar',null,['class'=>'form-control','required','placeholder'=>'Lugar de la actividad'])!!}
	   </div>
       <br>
       <div class="form-group" >
	   		{!! Form::label('inicio','Inicio de la actividad') !!}
	   		<div style="width: 265px;">
	   		{!! Form::date('inicio',null,['class'=>'form-control','required'])!!}
	   	    </div>
	   </div>
       <br>
       <div class="form-group" >
	   		{!! Form::label('final','Fin de la actividad') !!}
	   		<div style="width: 265px;">
	   		{!! Form::date('final',null,['class'=>'form-control','required'])!!}
	   	    </div>
	   </div>
       <br>
	   
	 
	     <div class="form-group">
	     	<div align="center">
	   		{!! Form::submit('Registrar',['class'=>'btn btn-info','id'=>'btnEmpty' ]) !!}
	   		</div>
	   </div>

	</div>						
</div>


   <!-- Content -->
							       
<script  src="{{asset('plugins/js-especiales/validacion.js')}}"> </script>




@endsection