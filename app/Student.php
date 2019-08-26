<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 
 
class Student extends Model
{
 

   public function schoolclass(){
   	return $this->belongsTo(Schoolclass::class, 'schoolclass_id');
   }

   public function shift(){
   	return $this->belongsTo(shift::class);
   }

   public function section(){
    return $this->belongsTo(section::class);
   }

     public function marks()
    {
        return $this->hasMany(student_mark::class);
    }
}

