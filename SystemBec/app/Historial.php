<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table="historiales";
    protected $fillable=['name','becario_id'];

      public function becario(){
    	return $this->belongsTo('APP\Becario');
    }

}
