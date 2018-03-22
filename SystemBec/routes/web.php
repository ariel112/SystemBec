<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

    
   /*Ruta para las actividades*/
   Route::resource('Actividades','ActividadesController');
   Route::get('Actividades-historiales',
      [
        'as'=>'Actividades.historial',
        'uses'=>'ActividadesController@historial'
      ]
      );
   Route::get('Actividades/{id}/destroy',
    [
              'uses'=>  'ActividadesController@destroy',
              'as'=> 'Actividades.destroy'
               ]);

  /*-------------------------------------------------------------*/

    /*Ruta para el manejo de becarios*/
  Route::resource('Becarios','BecariosController');
  Route::get('Becarios/{becarios}', 'BecariosController@becariosFilter');

  

     //Ruta para acceder al perfil del becario
     Route::get('becario-perfil/{id}',[ 
        'as'=>'Becarios.perfil',
        'uses'=>'BecariosController@perfil']       
                                );
     //ruta para agregarle el estado al becario
     Route::get('becario/{id}/asignar_estado', [
      'as'=>'asignar_estado.edit',
      'uses'=>'BecariosController@asignar_estado'
                                         ]);
     //Ruta que asigno el estado del becario. practicamente actualiza el estado
     Route::PUT('BecariosE/{id}',[
      'as'=>'Becarios.asignar_estado.update',
      'uses'=>'BecariosController@update_asignar_estado'
                                       ]);
     //este tiene la informacion sobre el cargo del becario
      Route::get('becarios/{id}/asignar_cargo', [
      'as'=>'asignar_cargo.edit',
      'uses'=>'BecariosController@asignar_cargo'
                                         ]);
 //Ruta que asigno el cargo al becario. practicamente actualiza el estado
     Route::PUT('becariosC/{id}',[
      'as'=>'Becarios.asignar_cargo.update',
      'uses'=>'BecariosController@update_asignar_cargo'
                                       ]);

     //Ruta que muestro el total de horas de los becarios
     Route::get('becarios/horas/historiales/{id}',[
      'as'=>'Becarios.mostrar_horas',
      'uses'=>'BecariosController@mostrar'
                                       ]);

     //Muestro el historico de horas detallada de cada becario
     Route::get('becarios/horas/historicos/{id}',[
      'as'=>'Becarios.mostrar_historicos',
      'uses'=>'BecariosController@mostrar_historico'
                                       ]);

     //Ruta que muestro lo de la camara
     Route::get('becarios/fotografia/{id}',[
      'as'=>'Becarios.foto',
      'uses'=>'BecariosController@foto']);
     
     Route::POST('becarios/fotografiaT',[
      'as'=>'Becarios.fotoTomada',
      'uses'=>'BecariosController@tomarfoto'
     ]);
     






      //muestra la pantalla de voluntariado
      Route::get('becario-perfil/voluntariadoindex/{id}',[
      'as'=>'Becarios.voluntariadoIndex',
      'uses'=>'BecariosController@VoluntariadoIndex'
      ]);

      //Ruta para asignarle las horas de voluntariado
      Route::PUT('becario-perfil/voluntariadocreate/{id}',[
      'as'=>'Becarios.voluntariado',
      'uses'=>'BecariosController@voluntariado'
      ]);
      

      //esta es la ruta para el create es una vista de un formulario
     Route::get('becario-perfil/voluntariado/{id}/create',
      [
        'as'=>'becarios.indexVoluntariado',
        'uses'=>'VoluntariadoController@create'
      ]);
     //aqui realiza la operacion de guardado y hace la relacion praticamente guarda
     Route::POST('becario-perfil/crear',
      [
        'as'=>'becariosVoluntariado.store',
        'uses'=>'VoluntariadoController@store'
      ]);

     
     Route::resource('actividades/horas/voluntariado','HorasActividadesController');
     Route::POST('becario-perfil/horas/activdades',[
       'as'=>'actividadesHoras.store',
       'uses'=>'HorasActividadesController@store'
     ]);                                  




 //Ruta para crear la forma03---------------
     //este es la ruta para el index
     Route::get('empleados-forma03/{id}',[ 
        'as'=>'Becarios.index-forma03',
        'uses'=>'Forma03Controller@index']       
                                );
     //esta es la ruta para el create es una vista de un formulario
     Route::get('empleados-forma03/{id}/create',
      [
        'as'=>'Becarios.index-forma03-CREATE',
        'uses'=>'Forma03Controller@create'
      ]);
     //aqui realiza la operacion de guardado y hace la relacion praticamente guarda
     Route::POST('forma03/crear',
      [
        'as'=>'Becarios-forma03.store',
        'uses'=>'Forma03Controller@store'
      ]);
      //-------------------------------------

     //asigno las actividades a el becario
     Route::get('empleados/{id}/asignar', [
      'as'=>'asignar.edit',
      'uses'=>'BecariosController@asignar'
                                         ]);

     Route::PUT('empleados/{id}/asignar',[
      'as'=>'Becarios.asignar.update',
      'uses'=>'BecariosController@update_asignar'
                                      ]);

    //Abner: retorna en un json los empleados filtrador por el nombre
    //Route::get('empleados/{empleados}', 'BecariosController@becariosFilter');

     //Route::get('empleados/{empleados}', ['middleware'=>'cors','BecariosController@becariosFilter']);













     /*Rutas se creo un grupo de rutas con el prefijo admin*/
     Route::group(['prefix'=>'admin'], function(){
    
     //Ruta para acceder al perfil del empleado
     Route::get('empleadosPerfil/{id}',[ 
        'as'=>'empleados.perfil',
        'uses'=>'EmpleadosController@perfil']       
                                
                                );


     //Ruta para crear los RTN---------------
     //este es la ruta para el index
     Route::get('empleadosRtn/{id}',[ 
        'as'=>'empleados.indexRTN',
        'uses'=>'RtnController@index']       
                                );
     //esta es la ruta para el create es una vista de un formulario
     Route::get('empleadosRTN/{id}/create',
      [
        'as'=>'empleados.indexRTNCREATE',
        'uses'=>'RtnController@create'
      ]);
     //aqui realiza la operacion de guardado y hace la relacion praticamente guarda
     Route::POST('empleados/crear',
      [
        'as'=>'empleadosRTN.store',
        'uses'=>'RtnController@store'
      ]);
      //-------------------------------------

       //Ruta para crear los antecedentes penales---------------
     //este es la ruta para el index
     Route::get('empleadosATCPE/{id}',[ 
        'as'=>'empleados.indexATCPE',
        'uses'=>'PenalesController@index']       
                                );
     //esta es la ruta para el create es una vista de un formulario
     Route::get('empleadosATCPE/{id}/create',
      [
        'as'=>'empleados.indexATCPECREATE',
        'uses'=>'PenalesController@create'
      ]);
     //aqui realiza la operacion de guardado y hace la relacion praticamente guarda
     Route::POST('empleados/crearPE',
      [
        'as'=>'empleadosATCPE.store',
        'uses'=>'PenalesController@store'
      ]);
      //-------------------------------------

       


  

   


          
     //Ruta que me lleva a todos los accesos de empleadocontroller edit,create,show
    Route::resource('empleados','EmpleadosController');

                                           });



    //Ruta que me lleva ala parte de creacion de los proyectos accedos a todas las rutas
   Route::group(['prefix'=>'proyect'], function(){
   Route::resource('proyectos','ProyectosController'); 
                                                  });

