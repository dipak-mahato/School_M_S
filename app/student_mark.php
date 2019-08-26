<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_mark extends Model
{
       public function students(){
   	return $this->belongsTo(Student::class,'student_id');
   }
       public function subject(){
   	return $this->belongsTo(Subject::class,'subject_id');
   }
}
