@extends('templates.main')

@section('content')



<!-- Header -->
								

								
@section('subtitle')
Forma03
@endsection


<div  class="row">
<div class="col-md-6">

      {!! Form::open(['route' => ['Becarios-forma03.store',$becarios->id], 'method'=>'POST', 'files'=>true]) !!}
   <br>
   
   

	  
	   <div class="form-group">
	   		{!! Form::label('image','Seleccione la imagen/scanner de la forma03') !!}

	   		{!! Form::file('image',null,['class'=>'btn','required'])!!}	   	
	   		 <input style="visibility: hidden;" type="text" name="becario_id" value="{{$becarios->id}} ">
	   		 
	   </div>
	
  
		  
	     <div class="form-group">
	   		{!! Form::submit('Registrar',['class'=>'btn btn-info']) !!}
	   </div>

	</div>						
</div>



















@endsection