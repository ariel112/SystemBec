<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;
use App\Rtn;
use Carbon\Carbon;


class RtnController extends Controller
{


	 public function __construct(){
       Carbon::setLocale('es');
                                 }

    


        public function index($id){
        	  $carbon=Carbon::now();
              $empleados=  Empleado::find($id);
              
              $rtn=Rtn::orderBy('id','DESC')->paginate(19);
              
             // $empleados->each(function($empleados){
              	$empleados->rtn;

              	$empleados->orderBy('id','DESC')->paginate(4);
              //});

              

         
          return view('templates.admin.Rtn.index')->with('empleados',$empleados)->with('rtn',$rtn);
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
         return view('templates.admin.Rtn.create')->with('empleados',$empleados); 
        }                                                             


  
    	public function store(Request $request){

    		   
    		    $rtn= new Rtn();
                

                
				if($request->file('image')) { 

				$file=$request->file('image');
				$name='RTN_'.time().'.'.$file->getClientOriginalExtension();
				$path = public_path().'/images/rtn/';
				$file->move($path,$name);
				                              }
				 $rtn->name=$name;
				 $rtn->empleado_id=$request->empleado_id;
				
				 
				 $rtn->save();                             


                return redirect()->route('empleados.indexRTN',$request->empleado_id);
											
	          }
    


}
