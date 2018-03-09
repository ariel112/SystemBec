@extends('templates.main')

@section('content')



<!-- Header -->
								

								
@section('subtitle')
Subir Antecedentes Penales  
@endsection




<div  class="row">
<div class="col-md-6">

      {!! Form::open(['route' => ['empleadosATCPE.store',$empleados->id], 'method'=>'POST', 'files'=>true]) !!}
 
	   <br>
	   <div class="form-group">
	   		{!! Form::label('image','Seleccione la imagen/scanner de los antecedentes penales') !!}
	   		{!! Form::file('image',null,['class'=>'btn btn-primary','required'])!!}
	   		 <input style="visibility: hidden;" type="text" name="empleado_id" value="{{$empleados->id}} ">
	   </div>
	
  
		  
	     <div class="form-group">
	   		{!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
	   </div>

	</div>						
</div>



















@endsection