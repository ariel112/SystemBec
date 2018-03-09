<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actividad;
use Laracasts\Flash\Flash;
use Carbon\Carbon;

class ActividadesController extends Controller
{
    public function __construct(){
          Carbon::setLocale('es');
                                    }

    public function create(){
        return view('templates.admin.actividades.agregar');
						}



	public function store(Request $request){ 
		

		  $actividades = new Actividad($request->all());
		  $carbon=Carbon::now();
		  $actividades->save();
		   Flash::success('La actividad '.$actividades->name.'  a sido creado con exito');
		   return redirect()->route('Actividades.index');
							}					
	
	public function index(Request $request){
		//$actividades = actividadesyecto::searchp($request->name)->orderBy('id','DESC')->paginate(10);
              $carbon=Carbon::now();
              $actividades=Actividad::orderBy('id','DESC')->paginate(19);

          //consulta con la base de datos para traer la fecha de creacion del rtn del empleado
          /*
          ->join('rtn_empleados','rtn_empleados.empleado_id','=','empleados.id')
          ->where('empleados.id','=',5)
          ->orderBy('rtn_empleados.created_at', 'asc')
          ->limit('1')
          ->select('rtn_empleados.created_at as fecha')
          ->get('rtn_empleados.created_at');
          */
          
          
         
              

              //});

       
		  return view('templates.admin.actividades.index')->with('actividades',$actividades)->with('carbon',$carbon);
	}

	public function historial(Request $request){
			      $actividades=Actividad::orderBy('id','DESC')->paginate(2);
              

              //});

       
		  return view('templates.admin.actividades.historial')->with('actividades',$actividades);


	}


	public function update(Request $request, $id){
          $actividades =Actividad::find($id);
          $actividades->fill($request->all());
          $actividades->save();
          Flash::success('La actividad '.$actividades->nombre.' a sido actualizado con exito');
          return redirect()->route('Actividades.index');
     }


     public function edit($id){

     	$actividades =Actividad::find($id);

     	return view('templates.admin.actividades.editar')->with('actividades',$actividades);
     }

     public function destroy($id){


     	
     	$actividad= Actividad::find($id);
     	$actividad->delete();
          Flash::error('La actividad '.$actividad->nombre.' a sido borrada con exito');
          return redirect()->route('Actividades.index');	
   
     }
	

}
