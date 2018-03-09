<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Empleado;
use App\Image;
use App\Rtn;
use App\Act_penal;
use App\Act_policial;
use App\Proyecto;
use Laracasts\Flash\Flash;

use Carbon\Carbon;
use DB;

use Session;

use Response;
use Input;



class EmpleadosController extends Controller{



  public function __construct(){
      Carbon::setLocale('es');
  }

	//sirve para asignarle el proyecto al empleado
    public function asignar($id){

	   	   $empleados =Empleado::find($id);
	   	   $empleados->images;
	   	   $proyectos=Proyecto::all();  
   	    return view('templates.admin.empleados.asignar_proyecto')->with('empleados',$empleados)->with('proyectos',$proyectos);
                               }

    public function update_asignar(Request $request,$id){
          $carbon=Carbon::now();  
     	    $empleados=Empleado::find($id);
          $empleados->fecha_proyecto=$carbon;
          $empleados->proyecto_id=$request->proyecto_id;

          $empleados->save();          
        //  Flash::success('El empleado '.$empleados->name.'  a sido Asignado con exito');

        
            Session::flash('message','mi mensaje se envio');


          $notificacion= array(
              'message'=>'Gracias! SU mensaje se a enviado con exito',
              'alert-type'=>'success'
             );
        return redirect()->route('empleados.index');
    													}


    //esta parte edito el estado del empleado                                                    
    public function asignar_estado($id){

  	   	   $empleados =Empleado::find($id);
  	   	   $empleados->estado;
  	   	   $empleados->descripcion;
  	   	   $proyectos=Proyecto::all();  
   	    return view('templates.admin.empleados.agregar_estado')->with('empleados',$empleados);
                               }

    public function update_asignar_estado(Request $request,$id){
          $carbon=Carbon::now();
          $empleados=Empleado::find($id);
          $empleados->estado=$request->estado;
          $empleados->descripcion=$request->descripcion;
          $empleados->fecha_estado=$carbon;
                 
          $empleados->save();          
          Flash::success('El empleado '.$empleados->name.'  a sido editado con exito');
        return redirect()->route('empleados.perfil',$empleados->id);
                                                        }

    //esta parte edito el cargo del empleado                                                    
    public function asignar_cargo($id){

  	   	   $empleados =Empleado::find($id);
  	   	   $empleados->cargo;	   	   
   	    return view('templates.admin.empleados.agregar_cargo')->with('empleados',$empleados);
                               }

    public function update_asignar_cargo(Request $request,$id){
          
     	    $empleados=Empleado::find($id);
          $empleados->cargo=$request->cargo;                
          $empleados->save();          
          Flash::success('El empleado '.$empleados->name.'  a sido editado con exito');
        return redirect()->route('empleados.perfil',$empleados->id);
                                                        }




    public function edit($id){ 
         $empleados =Empleado::find($id); 
         $empleados->images;
	    return view('templates.admin.empleados.editar')->with('empleados',$empleados);;
                           
                             }
       

    public function update(Request $request,$id){
          

          $empleados=Empleado::find($id);
          $empleados->name=$request->name;
          $empleados->identidad=$request->identidad;
          $empleados->fecha_nacimiento=$request->fecha_nacimiento;
          $empleados->genero=$request->genero;
          $empleados->telefono=$request->telefono;
          $empleados->email=$request->email;
          $empleados->cursos=$request->cursos;
          $empleados->estudios=$request->estudios;
          $empleados->direccion=$request->direccion;
          $empleados->experiencia=$request->experiencia;
          $empleados->aptitudes=$request->aptitudes;
          $empleados->name_refe=$request->name_refe;
          $empleados->identidad_refe=$request->identidad_refe;
          $empleados->direccion_refe=$request->direccion_refe;
          $empleados->telefono_refe=$request->telefono_refe;
          $empleados->informacion_refe=$request->informacion_refe;
          $empleados->email_refe=$request->email_refe;
          // $empleados->fill=($request->all());                
          $empleados->save();          
          Flash::success('El empleado '.$empleados->name.'  a sido actualizado con exito');
      return redirect()->route('empleados.index');
        
               
                            }




    public function perfil($id){
    	 
      	  $empleados =Empleado::find($id);
          $empleados->images;	         
       //   $empleados->each(function($empleados){
            $empleados->atc_penales;
        //  });
            $empleados->atc_policiales;
            $empleados->proyecto;
           
            $carbon=Carbon::now();
             
          
      return view('templates.admin.empleados.perfil')->with('empleados',$empleados)->with('carbon',$carbon);

                              }                     





    public function create(){
	        
      return view('templates.admin.empleados.agregar');

          	}



    public function store(Request $request){ 

				$empleados = new Empleado($request->all());
				
        //Manipulacion de imagenes de perfil

				if($request->file('image')) { 

				$file=$request->file('image');
				$name='cassesa_'.time().'.'.$file->getClientOriginalExtension();
				$path = public_path().'/images/perfiles/';
				$file->move($path,$name);
				                              }



			   $image= new Image();
			   $image->name=$name;
			   //no sirve $image->empleado()->associate($empleados);
			   //dd($image->empleado_id);
			   $image->save();
			   $empleados->image_id=$image->id;
			 	//empleados guardados
				
				$empleados->save();
				

                return redirect()->route('empleados.index');
											
	          }
    




      public function index(Request $request){
          
          $carbon=Carbon::now();                
          
          $empleados=Empleado::search($request->name)->orderBy('id','DESC')->paginate(19);
          $images=Image::all();                    
          $empleados->each(function($empleados){
          $empleados->images;                   });

          $proyecto=Proyecto::all();
          $empleados->each(function($empleados){
          $empleados->proyecto;
                                               }); 
        
          
          $empleados->each(function($empleados){
          $empleados->rtn->first();
                                               }); 
          $empleados->each(function($empleados){
            $empleados->atc_penales->first();
          });

            
         
          /*
          $rtnactual=DB::table('empleados')
          
         //consulta con la base de datos para traer la fecha de creacion del rtn del empleado
          
          ->join('rtn_empleados','rtn_empleados.empleado_id','=','empleados.id')
          ->where('empleados.id','=',5)
          ->orderBy('rtn_empleados.created_at', 'asc')
          ->limit('1')
          ->select('rtn_empleados.created_at as fecha')
          ->get('rtn_empleados.created_at');
          dd($rtnactual); 
          $fecha=date($rtnactual);
          
          //dd($fecha);

          */


          return view('templates.admin.empleados.index')->with('empleados',$empleados)->with('carbon',$carbon);                         
                                               }
   

                               


}
