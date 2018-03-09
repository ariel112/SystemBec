<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Becario;
use Laracasts\Flash\Flash;
use Carbon\Carbon;
use App\Casa;
use App\Forma03;
use App\Voluntariado;
use App\Historial;
use App\Image;
use App\Actividad;


class BecariosController extends Controller
{
	 public function __construct(){
          Carbon::setLocale('es');
                                    }


    public function create(){

        return view('templates.admin.becarios.agregar');
        
						} 

	public function store(Request $request){ 
		

		  $becarios = new Becario($request->all());
		  $carbon=Carbon::now();
		  $becarios->save();
		   Flash::success('La actividad '.$becarios->nombre.'  a sido creado con exito');
		   return redirect()->route('Becarios.index');
							}						                              

	public function index(){



		      $carbon=Carbon::now();
              $becarios=Becario::orderBy('id','DESC')->paginate(19);
	       	  $images=Image::all();                    
	          $becarios->each(function($becarios){
	          $becarios->images;                   });
          //consulta con la base de datos para traer la fecha de creacion del rtn del empleado
          /*
          ->join('rtn_becarios','rtn_becarios.empleado_id','=','becarios.id')
          ->where('becarios.id','=',5)
          ->orderBy('rtn_becarios.created_at', 'asc')
          ->limit('1')
          ->select('rtn_becarios.created_at as fecha')
          ->get('rtn_becarios.created_at');
          */
        
                           //});

       	  return view('templates.admin.becarios.index')->with('becarios',$becarios)->with('carbon',$carbon);

	}



	public function update(Request $request, $id){
          $becarios=Becario::find($id);
          $becarios->fill($request->all());
          $becarios->save();
          Flash::success('El becario '.$becarios->nombre.' a sido actualizado con exito');
          return redirect()->route('Becarios.index');
     }


     public function edit($id){

     	$becarios =Becario::find($id);

     	return view('templates.admin.becarios.editar')->with('becarios',$becarios);
     }


     public function perfil($id){
    	 
      	  $becarios =Becario::find($id);
          $images=Image::all();
          $becarios->images;

         

          	$voluntariados=Voluntariado::all();
           $becarios->each(function($becarios){
           $becarios->voluntariados;
              });
         
            $forma03=Forma03::all();
         //   $becarios->each(function($becarios){
            $becarios->formas03;
             //});

            $historiales=Historial::all();
             $becarios->each(function($becarios){
             $becarios->historiales;
 			});   

 			      
 
            $carbon=Carbon::now();
             
          
      return view('templates.admin.becarios.perfil')->with('becarios',$becarios)->with('carbon',$carbon);

                              }


            //esta parte edito el estado del empleado                                                    
    public function asignar_estado($id){

  	   	   $becarios =Becario::find($id);
  	   	   $becarios->estado;
  	   	   $becarios->descripcion;
  	   	    
   	    return view('templates.admin.becarios.agregar_estado')->with('becarios',$becarios);
                               }

    public function update_asignar_estado(Request $request,$id){
          $carbon=Carbon::now();
          $becarios=Becario::find($id);
          $becarios->estado=$request->estado;
          $becarios->descripcion=$request->descripcion;
          $becarios->fecha_estado=$carbon;
                 
          $becarios->save();          
          Flash::success('El becario '.$becarios->nombre.'  a sido editado con exito');
        return redirect()->route('Becarios.perfil',$becarios->id);
                                                        }



   	 //esta parte edito el cargo del empleado                                                    
    public function asignar_cargo($id){

  	   	   $becarios =Becario::find($id);
  	   	   $becarios->cargo;	   	   
   	    return view('templates.admin.becarios.agregar_cargo')->with('becarios',$becarios);
                               }

    public function update_asignar_cargo(Request $request,$id){
          
     	    $becarios=Becario::find($id);
          $becarios->cargo=$request->cargo;                
          $becarios->save();          
          Flash::success('El becario '.$becarios->nombre.'  a sido editado con exito');
        return redirect()->route('Becarios.perfil',$becarios->id);
                                                        }


    //asigna la actividad al becario
    //sirve para asignarle el proyecto al empleado
 /*
    public function asignar($id){

	   	   $becarios =Becario::find($id);
	   	   $becarios_actividades=
	   	   $becarios->images;
	   	   $actividades=Actividad::all();  
   	    return view('templates.admin.becarios.asignar_actividades')->with('becarios',$becarios)->with('actividades',$actividades);
                               }


    public function update_asignar(Request $request,$id){
          $carbon=Carbon::now();  
     	  $becarios=Becario::find($id);
          $becarios->fecha_proyecto=$carbon;
          $becarios->becario_id=$request->proyecto_id;

          $becarios->save();          
        //  Flash::success('El empleado '.$becarios->name.'  a sido Asignado con exito');

        
    
        return redirect()->route('becarios.index');
    									
											}

*/






    //codigo para lo del voluntariado												
    public function VoluntariadoIndex($id){
          $becarios =Becario::find($id);

    	return view('templates.admin.voluntariado.agregar')->with('becarios',$becarios);
    }  
    		

    public function voluntariado(Request $request){
    	$becarios=Becario::find($id);
    	$voluntariados= new Voluntariado($request->all());
	    $voluntariados->save();
          Flash::success('El becario '.$becarios->nombre.' a sido actualizado con exito');
          return redirect()->route('Becarios.index');
    }													                                                    












    
}
