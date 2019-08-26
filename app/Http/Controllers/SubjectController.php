<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schoolclass;
use DB;
use App\Subject;
use Redirect;
use Session;
class SubjectController extends Controller
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

 

    public function index($subject)
    {
 
         $class=Schoolclass::all()->where('class', $subject)->first();
 
     
         return view('subject.subject',compact('class'));
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
 
        $check=schoolclass::find($request->classid);
        $checks=$check->subjects;
      
        foreach ($checks as $ch) {
            if($request->subject==$ch->subject){
 
          Session::flash('checkerror', "Already Exit");
return Redirect::back(); 
             }
        }

        $subject=new subject;
        $subject->subject=$request->subject;
        $subject->save();
        $subject->schoolclass()->attach($request->classid);
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
        //
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
    public function destroy(Request $request)
    {
       $subject=Subject::find($request->subject);
       $subject->schoolclass()->detach();
       $subject->marks()->delete();
       $subject->student_marks()->delete();
       $subject->delete();
       return redirect()->back();
    }
}
