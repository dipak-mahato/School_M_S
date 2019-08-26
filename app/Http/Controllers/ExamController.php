<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\schoolclass;

use App\Exam;
use Session;
use Redirect;
use App\Subject;
use App\Marksdetail;
use App\Student;
use App\section;
use App\shift;
use DB;
use App\student_mark;
class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index()
    {
        $exams=Exam::all();
        $classes=schoolclass::all();
        return view('exam.exam', compact('classes','exams'));
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
    
         $class=$request->class;
          if($class==null){

                 Session::flash('error', "Any Class must Be Selected");
                return Redirect::back();
         }
          else{


         $exam=new Exam;
         $exam->exam=$request->exam;
         $exam->save();

foreach ($class as $key => $value) {
    $exam->schoolclass()->attach($value);
}

                 Session::flash('success', "Successully add");
                return Redirect::back();
                }
 


      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

 
        $classes=$request->class;
        
         $class=schoolclass::all()->where('id',$classes)->first();
         
         $exams=$request->exam;

         $exam=Exam::all()->where('id',$exams)->first();
          
        
 
$subjects=$class->subjects;
// return view('exam.examsubject',compact('class','exam','subjects','marks')); 

 
 
 

    $subs=Marksdetail::where('schoolclass_id',$classes)->where('exam_id',$exams)
 
    ->get();
 

 return view('exam.examsubject',compact('class','exam','subjects','marks','subs')); 

 
 
  
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



   public function mark(Request $request)
   {



  $no= count($request->fm);

 $sub=Marksdetail::where('schoolclass_id',$request->class)->where('exam_id',$request->exam)->get();

 

$su=count($sub);
//dd($su);

  //dd($request->sub);
 //dd($request);
 if ($su==null){
for($i=0;$i<$no;$i++)
{
    $mark=new Marksdetail;
    //$mark->subject_id=$request->sub[$i];
    $mark->schoolclass_id=$request->class;
    $mark->exam_id=$request->exam;
    $mark->subject_id=$request->sub[$i];
    $mark->PM=$request->pm[$i];
    $mark->FM=$request->fm[$i];
    $mark->save();
}
return redirect()->back();
}



else {
    $i=0;
foreach ($sub as $ss) {
 $su=Marksdetail::find($ss->id);

     $su->schoolclass_id=$request->class;
    $su->exam_id=$request->exam;
    $su->subject_id=$request->sub[$i];
    $su->PM=$request->pm[$i];
    $su->FM=$request->fm[$i++];
    $su->save();
   
}
   return redirect()->back();
}    


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
        //
    }

  public function marks_sheet(Request $request){
 

       $students=Student::where('schoolclass_id',$request->class)
                          ->where('shift_id',$request->shift)
                          ->where('section_id',$request->sfd)->get();
      
          $shift=Shift::find($request->shift);
          $section=section::find($request->sfd);
          $cll=schoolclass::find($request->class);
     //     $subjects=Subject::find($request->class);
                         // return($students);
      // $classes= Schoolclass::all();
        $sections=section::all();
        $shifts= Shift::all();

        $exam=Exam::find($request->exam);
        $classes=$exam->schoolclass;


        $test=student_mark::all();
        



        $mark=student_mark::where('exam_id',$request->exam);

        return view('exam.marks',compact('classes','shifts','students','cll','sections','exam','shift','section','mark'));


    }


public function student_mark(Request $request){

   

  $marks=student_mark::where('student_id',$request->student)
                       ->where('exam_id',$request->exam)
                       ->get();
                       $count=count($marks);

        if($count !=null){
            
 
     foreach($marks as $mark){
        $mark->student_id=$request->student;
        $test='subject'.$mark->subject->id;
        $mark->subject_id=$request->$test;
        $mark->exam_id=$request->exam;
          $te='mark'.$mark->subject_id;
        $mark->obtained_mark=$request->$te;
        $mark->save();        
     }

 
    return redirect()->back(); 
        
        }

else{


    $class=schoolclass::find($request->class);
   
    $subjects=$class->subjects;
    
    foreach($subjects as $sub){
        $mark=new student_mark;
 

       $mark->student_id=$request->student;
        $test='subject'.$sub->id;
        $mark->subject_id=$request->$test;
        $mark->exam_id=$request->exam;
          $te='mark'.$sub->id;
        $mark->obtained_mark=$request->$te;
        $mark->save();

    }
    return redirect()->back();


}


}

public function view_result(Request $request)
{
    $exam=$request->exam;
    $marks=DB::table('student_marks as t1')
         ->join('subjects as t2','t2.id','=','t1.subject_id')
           ->join('marksdetails as t3','t1.subject_id','=','t3.subject_id')
           ->where('t3.exam_id',$exam)
           ->where('t1.exam_id',$exam)
           ->where('student_id',$request->student)
           ->get();
           ($marks);
     $student=Student::find($request->student);
   $examm=Exam::find($exam);
   
return view('exam.marksheet',compact('marks','exam','student','examm'));
}

}
