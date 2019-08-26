<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\shift;
 use App\section;
class schoolclass extends Model
{

 public function shifts(){
 	return $this->belongsToMany(shift::class);
 }
     public function students()
    {
        return $this->hasMany(Student::class);
    }
 public function sections(){
 	return $this->belongsToMany(section::class);
 }

      public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

         public function exam()
    {
        return $this->belongsToMany(Exam::class);
    }
     public function marks()
    {
        return $this->hasMany(Marksdetail::class);
    }
}
