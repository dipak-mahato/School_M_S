<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
        public function schoolclass()
    {
        return $this->belongsToMany(Schoolclass::class);
    }


}
