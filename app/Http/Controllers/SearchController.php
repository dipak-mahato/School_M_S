<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use DB;
class SearchController extends Controller
{
   public function search(Request $request){
             $std=DB::table('students')
            ->where('name', 'like', '%' . $request->search . '%')->get();

   dd($std);
   }

   public function store(Request $request)
   {
   	return($request->class);
   }
   
}
