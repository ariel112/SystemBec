@extends('templates.main')

@section('content')



<!-- Header -->
								

								
@section('subtitle')
Forma03
@endsection



<div align="center">
	<!--boton para la forma03-->
	<a id="espaciados" style=" text-decoration: none; text-decoration-line: none;" href="{{route('Becarios.index-forma03-CREATE',$becarios->id)}}"><font  class="glyphicon glyphicon-folder-open" size="4"> Actualizar Forma03 </font></a>
</div>
						

				
	<div >			

@foreach ($becarios->formas03 as $forma03)
   

		<p style="">
			<img title="El Documento fue actualizado: {{$forma03->created_at->diffForHumans()}}" class="img-thumbnail" src="/images/forma03/{{$forma03->name}}" 
			style="height: 600px; width: 400px; overflow: hidden; float: left; margin: 10px 10px 0 0;" >
			
		 
		 </p>

		   
 @endforeach

</div>


@endsection