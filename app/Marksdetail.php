<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marksdetail extends Model
{
       public function subjects(){
   	return $this->belongsTo(Subject::class , 'subject_id');
   }

   public function class(){
   	return $this->belongsTo(Schoolclass::class);
   }

}
