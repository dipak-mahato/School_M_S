@extends('layouts.main')

@section('content')

 <div style="background-color: green;margin-top: -16px;height: 40px;"><h3>Class {{$class->class}} Subjects On {{$exam->exam}} </h3></div>

<table>
    <tr style="background-color: lightblue">
      <th style="padding-left: 20px"><h5>Primary Entry /</h5></th>
      <th ><a href="/exam"><h5>Exam</h5></a></th>
      <th style="padding-right: 20px"><h5>/ SubjectMarks</h5></th>
    </tr>

  </table>
<br>
<table class="table table-dark">
    <thead>
      <tr>
        <th>SN</th>
        <th>Subjects</th>
        <th>Full Mark</th>
        <th>Pass Mark</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
    	@php($no=1)
    	<form method="post" action="/marks/{{$class->class}}">
            <input type="text" name="exam" value="{{$exam->id}}" hidden>
            <input type="text" name="class" value="{{$class->id}}" hidden>
    		
            @csrf
    	@foreach($subjects as $subject)<tr><td>{{$no++}}</td><td>{{$subject->subject}}</td><td>
            <input type="text" name="sub[]" value="{{$subject->id}}" hidden>
     		<input type="text" name="fm[]" placeholder="Enter Full Mark" required></td><td>
    		<input type="text" name="pm[]" placeholder="enter pass mark" required></td></tr>


    		@endforeach



@php($no=1)

<tr><td></td><td></td><td></td><td><button type="submit" class="btn btn-success">Set Mark</button></td></tr></form>
 @foreach($subs as $sub) 

<tr><td>{{$no++}}</td><td>{{$sub->subjects->subject}}</td><td>{{$sub->FM}}</td><td>{{$sub->PM}}</td></tr>


    @endforeach
    </tbody>
  </table>




 @endsection