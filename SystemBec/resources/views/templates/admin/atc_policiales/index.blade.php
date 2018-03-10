@extends('templates.main')

								
@section('subtitle')
Antecedentes policiales
@endsection


@section('content')



<!-- Header -->
								



   <div align="center">

		<!--boton para antecedentes penales-->
		<a style=" text-decoration: none; text-decoration-line: none;" href="{{route('empleados.indexATCPOCREATE',$empleados->id)}}"><font  class="glyphicon glyphicon-folder-open" size="4"> Antecedentes-policiales</font></a> <br>

	</div>
<div>
  @foreach ($empleados->atc_policiales as $atc_policiales)
     

		<p style="">
			<img title="El Documento fue actualizado: {{$atc_policiales->created_at->diffForHumans()}}" class="img-thumbnail" src="/images/policiales/{{$atc_policiales->name}}" 
			style="height: 600px; width: 400px; overflow: hidden; float: left; margin: 10px 10px 0 0;" >
		 
		 </p>


 @endforeach

</div>

@endsection