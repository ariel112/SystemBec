@extends('templates.main')

@section('subtitle')
Subir antecedentes policiales
@endsection


@section('content')



<!-- Header -->
								

								




<div  class="row">
<div class="col-md-6">

      {!! Form::open(['route' => ['empleadosATCPO.store',$empleados->id], 'method'=>'POST', 'files'=>true]) !!}
  
	   <br>
	   <div class="form-group">
	   		{!! Form::label('image','Seleccione la imagen/scanner de los antecedentes policiales') !!}
	   		{!! Form::file('image',null,['class'=>'btn btn-primary','required'])!!}
	   		 <input style="visibility: hidden;" type="text" name="empleado_id" value="{{$empleados->id}} ">
	   </div>
	
		  
	     <div class="form-group">
	   		{!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
	   </div>

	</div>						
</div>



















@endsection