@extends('templates.main')


@section('content')



<!-- Header -->
								

								
@section('subtitle')
Agregar Actividad
@endsection

<div  class="row">
<div class="col-md-5">

      {!! Form::open(['route' => ['becariosVoluntariado.store','$becarios->id'], 'method'=>'POST', 'files'=>true, 'id'=>'formEmpty','data-smk-icon'=>'glyphicon-remove-sign']) !!}
   <br>
   <br>
	   <div class="form-group" >
	   
	   		{!! Form::label('name','Nombre de la actividad de voluntariado') !!}
	   		{!! Form::text('name',null,['class'=>'form-control','required','placeholder'=>'Nombre del proyecto'])!!}
	   	
	   </div>
       <br>

       <div class="form-group" >
	   		{!! Form::label('name','Horas de la actividad') !!}
	   		<div style="width: 80px;">
	   		    {!! Form::number('horas',null,['class'=>'form-control','min'=>'1','max'=>'12', 'required'])!!}
	   		</div>
	   		<input style="visibility: hidden;" type="text" name="becario_id" value="{{$becarios->id}} ">
	   </div>
	   	     <div align="center">
	   		{!! Form::submit('Registrar',['class'=>'btn btn-info','id'=>'btnEmpty' ]) !!}
	   		</div>
	   </div>

	</div>						



   <!-- Content -->
							       
<script  src="{{asset('plugins/js-especiales/validacion.js')}}"> </script>




@endsection