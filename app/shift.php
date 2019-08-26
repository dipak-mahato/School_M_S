<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\schoolclass;
class shift extends Model
{
public function schoolclasses(){
	return $this->belongsToMany(schoolclass::class);
}

     public function students()
    {
        return $this->hasMany(Student::class);
    }

}
