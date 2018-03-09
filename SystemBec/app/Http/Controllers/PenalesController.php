<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Act_penal;
use Carbon\Carbon;
use App\Empleado;

class PenalesController extends Controller
{
    


    public function __construct(){
       Carbon::setLocale('es');
                                 }

    


        public function index($id){
        	  $carbon=Carbon::now();
              $empleados=  Empleado::find($id);
              $atc_penales=Act_penal::orderBy('id','DESC')->paginate(19);        
              
             // $empleados->each(function($empleados){
              	$empleados->atc_penales;

              	$empleados->orderBy('id','DESC')->paginate(4);        
              	      //});             
        
        return view('templates.admin.atc_penales.index')->with('empleados',$empleados)->with('atc_penales',$atc_penales);
               
         

                            } 
/*
 public function index(Request $request){
          
          $carbon=Carbon::now();                
           //dd($request->name);
          $empleados=Empleado::search($request->name)->orderBy('id','DESC')->paginate(19);
          $images=Image::all();                    
          $empleados->each(function($empleados){
          $empleados->images;                   });

          $proyecto=Proyecto::all();
          $empleados->each(function($empleados){
          $empleados->proyecto;
                                               }); 
                    

          return view('templates.admin.empleados.index')->with('empleados',$empleados)->with('carbon',$carbon);                         
                                               }
  



*/

        public function create($id){
        	$empleados=  Empleado::find($id);
         return view('templates.admin.atc_penales.create')->with('empleados',$empleados); 
        }                                                             


  
    	public function store(Request $request){

    		    
    		    $atc_penales= new Act_penal();
                

                
				if($request->file('image')) { 

				$file=$request->file('image');
				$name='ATCPE_'.time().'.'.$file->getClientOriginalExtension();
				$path = public_path().'/images/penales/';
				$file->move($path,$name);
				                              }
				 $atc_penales->name=$name;
				 $atc_penales->empleado_id=$request->empleado_id;
				
				 $atc_penales->save();                             


                return redirect()->route('empleados.indexATCPE',$request->empleado_id);

               
											
	          }
    

}
