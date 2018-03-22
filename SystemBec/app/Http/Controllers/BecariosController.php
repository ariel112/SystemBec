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
use DB;


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
	       $becarios->images;                 }
	                        );
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
         $becarios->formas03;
         $historiales=Historial::all();
         $becarios->each(function($becarios){
         $becarios->historiales;
 	                                      		});       
         $carbon=Carbon::now();
             
          
  return view('templates.admin.becarios.perfil')->with('becarios',$becarios)->with('carbon',$carbon);
                             }

  /*Muestra las horas por mes del becario*/                      
  public function mostrar($id){
         $becarios=Becario::find($id);
         $carbon=Carbon::now();
       	 $historial_horas=DB::select("
    			SELECT SUM(horast) as resultado, T.TE as TER  FROM(
    			SELECT sum(C.horas) as horast ,  date_format(C.inicio,'%Y  %M ') AS TE
    			FROM becarios A
    			INNER JOIN becarios_actividades B 
    			ON(A.id=B.becario_id)
    			INNER JOIN actividades C 
    			ON(B.actividades_id=C.id)
    			WHERE A.id='$id'
    			GROUP BY C.inicio
    			UNION ALL
    			SELECT SUM(E.horas) as horast, date_format(E.created_at,'%Y  %M ') AS TE
    			FROM becarios D
    			INNER JOIN voluntariados E
    			ON(E.becario_id=D.id)
    			WHERE D.id='$id'
    			GROUP BY E.created_at
    			) T
    			GROUP BY TE
    			order by  TE desc");   	
  return view('templates.admin.becarios.historial')->with('becarios',$becarios)->with('carbon',$carbon)->with('historial_horas',$historial_horas);      
                                     }                                                 
    
  public function mostrar_historico($id){
         $becarios=Becario::find($id);
         $carbon=Carbon::now();
         $historico=DB::SELECT("
			   SELECT date_format(g.fecha,'%W %d %M %Y') as fecha, g.horas as horas, g.nombre as nombre
			   FROM(
			   SELECT E.horas as horas, E.created_at AS fecha, E.name as nombre
			   FROM becarios D
			   INNER JOIN voluntariados E
			   ON(E.becario_id=D.id)
			   WHERE D.id='$id'
			
    			UNION ALL
    			SELECT C.horas , C.inicio AS fecha, c.nombre
    			FROM becarios A
    			INNER JOIN becarios_actividades B 
    			ON(A.id=B.becario_id)
    			INNER JOIN actividades C 
    			ON(B.actividades_id=C.id)
    			WHERE A.id='$id'
    			) G
    			ORDER BY g.fecha desc

			        	 ");   		
       	
  return view('templates.admin.becarios.historico')->with('becarios',$becarios)->with('carbon',$carbon)->with('historico',$historico);      
                                     }                  

            //esta parte edito el estado del becarios                                                    
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



   	 //esta parte edito el cargo del becarios                                                    
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



    //codigo para tomar la foto
    public function foto($id){
         $becarios =Becario::find($id);
    return view('templates.admin.becarios.foto')->with('becarios',$becarios);

    }

    public function tomarfoto(Request $request){
                 
         		$becarios =Becario::find($request->becario_id);
         		
                $base_to_php =explode(',',$request->base64);
                $name='Foto_Perfil_'.time().'.jpg';
                $data= base64_decode($base_to_php[1]);
                $path = public_path().'/images/perfiles/'.$name;
                             
                file_put_contents($path,$data);
	            $image= new Image();
			    $image->name=$name;
			    $image->save();
		        $becarios->image_id=$image->id;
		        $becarios->save();
    return redirect()->route('Becarios.perfil',$becarios->id);
                  
                                           }

    // Abner: recibe el input del usuario y retorna los becarioss filtrados por ese input de manera asíncrona 
  public function becariosFilter($becarios){

  	          $carbon=Carbon::now();
              $becarios=Becario::search($becarios)->orderBy('id','DESC')->paginate(19);
        	    $images=Image::all();                    
	            $becarios->each(function($becarios){
	            $becarios->images;                   });
        

   

    return $becarios->toJson();
   }
  // /Abner
                                       


  


   
}
