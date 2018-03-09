<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use Laracasts\Flash\Flash;

class ProyectosController extends Controller
{
    


     public function edit($id){

     	$proyectos =Proyecto::find($id);

     	return view('templates.admin.proyectos.editar')->with('proyectos',$proyectos);
     }


     public function update(Request $request, $id){
          $proyectos =Proyecto::find($id);
          $proyectos->fill($request->all());
          $proyectos->save();
          Flash::success('El proyecto  '.$proyectos->name.'  a sido actualizado con exito');
          return redirect()->route('proyectos.index');
     }

    public function create(){
	return view('templates.admin.proyectos.agregar');
						}

	public function index(Request $request){
		$proyectos = Proyecto::searchp($request->name)->orderBy('id','DESC')->paginate(10);

		return view('templates.admin.proyectos.index')->with('proyectos',$proyectos);
	}

	


	public function store(Request $request){ 
		

	   $proyectos = new Proyecto($request->all());
	   $proyectos->save();
	   Flash::success('El proyecto  '.$proyectos->name.'  a sido creado con exito');
	   return redirect()->route('proyectos.index');
							}
				


}
