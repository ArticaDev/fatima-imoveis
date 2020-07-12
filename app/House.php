<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{  
   protected $table = 'house';
   public function address()
   {
       return $this->hasMany('App\Address');
   }
   public function image()
   {
       return $this->hasMany('App\Image');
   }

}
