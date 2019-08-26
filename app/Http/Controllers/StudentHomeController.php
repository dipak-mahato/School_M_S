<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class StudentHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 
        public function __construct()
    {
        $this->middleware('studentauth:student');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        $name=Auth::user()->name;
        $phone=Auth::user()->email;
        
        return view('student.studenthome',compact('name'));
    }
}
