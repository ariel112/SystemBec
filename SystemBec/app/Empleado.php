<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;


class Empleado extends Model
{
    
    protected $table ="Empleados";

    protected $fillable = [
      'name','identidad','fecha_nacimiento','genero','telefono','email','cursos','estudios','direccion','name_refe', 'identidad_refe','direccion_refe', 'telefono_refe','informacion_refe','email_refe', 'estado', 'descripcion','cargo','proyecto_id','image_id','aptitudes','experiencia','codigo_carnet','fecha_estado' ,'fecha_proyecto'];


    public function images(){
    	//return $this->hasMany(Image::class,'id');
      return $this->belongsTo(Image::class,'image_id');
                        }

   public function atc_penales()
   {
   	return $this->hasMany('App\Act_penal');
   }

   public function atc_policiales()
   {
   	return $this->hasMany('App\Act_policial');
   }

   public function rtn(){
   	return $this->hasMany(Rtn::class,'empleado_id');
   }


   public function proyecto(){

	//return $this->belongsTo('App\Proyecto');
    return $this->belongsTo(Proyecto::class,'proyecto_id');
    }




    public function scopeSearch($query,$name){

      if($name!=""){
      return $query->where('name',"LIKE","%$name%");
          }

    }



} 
