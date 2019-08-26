<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\schoolclass;
class section extends Model
{
    public function schoolclasses(){
	return $this->belongsToMany(schoolclass::class);
}
}
