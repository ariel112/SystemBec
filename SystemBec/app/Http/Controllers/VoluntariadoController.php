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

class VoluntariadoController extends Controller
{
    	 public function create($id){
        	$becarios=  Becario::find($id);
         return view('templates.admin.voluntariado.agregar')->with('becarios',$becarios); 

        }                                                             

         public function store(Request $request){

    		   
    		    $voluntariados= new Voluntariado();
                

                
				                              
				 $voluntariados->name=$request->name;
				 $voluntariados->horas=$request->horas;
				 $voluntariados->becario_id=$request->becario_id;
				
				 
				 $voluntariados->save();                             
 Flash::success(' a sido actualizado con exito');
          return redirect()->route('Becarios.index');			
	          }
                          


}
