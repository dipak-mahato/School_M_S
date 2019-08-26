<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shift;
use App\schoolclass;
use DB;
use App\schoolclass_shift;
use Redirect;
 use Session;
 use App\section;
class ClassController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  $classes=schoolclass::all();
 

$shifts = DB::table('shifts')
          ->orderBy('created_at','ASC')
          ->get();


 $sections=section::all();
 


       return view('admin.class',compact('shifts','classes','sections')); 
    }

      //  $shift=new shift;
      //  $Shifts=$shift->all();
      //  return view('admin.class',compact('shifts'));
    //}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 

    public function storee(Request $request)
    { 
    
  $shifts=$request->shift;
  $sections=$request->section;
  if($shifts==null || $sections==null){
Session::flash('checkerror', "Shifts and Section must checked");
return Redirect::back();
  }
  else{
      $classes=new schoolclass;
      $classes->class=$request->cllass;
      $classes->save();  
   
  //return($shifts);
 
 foreach ($sections as $key => $value) {
 

  $classes->sections()->attach($value);


  
  }

 foreach ($shifts as $key => $value) {
 

  $classes->shifts()->attach($value);


  
  }

 }
 return Redirect::back();
 
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      foreach ($variable as $key => $value) {
          # code...
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $class=schoolclass::find($id);
      $class->shifts()->detach();
      $class->sections()->detach();
      $class->subjects()->detach();

      $class->exam()->detach();
      //$class->students()->detach();
      $class->students()->delete();
      $class->marks()->delete(); 
      $class->sections()->delete(); 
      $class->delete();

      return Redirect::back();
    }
 
  
}
