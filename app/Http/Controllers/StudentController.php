<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schoolclass;
use App\shift;
use App\Student;
use Storage;
use File;
use App\section;
use DB;
use Redirect;
use App\Student_login;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
           $search=$request->search;
           if($search != null){
             $students=Student::where('name', 'like', '%' . $request->search . '%')->orwhere('id',$request->search)

             ->get();
           
          

        $classes=Schoolclass::all();
        $sections=section::all();
        $shifts=Shift::all();



        return view('student.student',compact('classes','shifts','students','sections'));

           }
else{

        $students=Student::all();
        $classes=Schoolclass::all();
        $sections=section::all();
        $shifts=Shift::all();



        return view('student.student',compact('classes','shifts','students','sections'));
    }
    }

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
    public function store(Request $request)
    {



$img = $request->file('image');
$imgs=$img->getClientOriginalName();
$imgs=time()."_".$imgs;
 
$img->move(public_path("/uploads"), $imgs);
        $student=new Student;
$student->file = $imgs; 



   $student->name=$request->name;
    $student->address=$request->address;
    $student->phone=$request->phone;
    $student->dob=$request->dob;
    $student->Schoolclass_id=$request->class;
    $student->shift_id=$request->shift;
     $student->section_id=$request->sfd;

     $student->save();
     $Student_login=new Student_login;
 $Student_login->name=$student->name;
 $Student_login->email=$student->address;
 $Student_login->password=bcrypt($student->phone);
$Student_login->save();
      return Redirect::back()->with('msg', 'Student Created Successfully with name :'.$request->name);
    
 }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student=Student::find($id);
        return view('student.profile',compact('student'));
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
              $student=Student::find($id);
              $student->delete();
  
        return Redirect::back();
    }


    public function class_student(Request $request){
      
      $classes=Schoolclass::find($request->class);
      $students=$classes->students;
       $shifts=$classes->shifts;
       $sections=$classes->sections;


       
      return view('test',compact('students','classes','sections','shifts'));
      
    }




}
