 @extends('layouts.main')

@section('content')
  
@if(Session::has('error'))
<script>
$(function() {
    $('#myModal').modal('show');
});
</script>

@endif

@if(Session::has('success'))
<script>
$(function() {
    $('#myModal').modal('show');
});
</script>

@endif



   <div style="background-color: green;margin-top: -16px;height: 40px;"><h3>Exam Summary</h3></div>

  <table>
    <tr style="background-color: lightblue">
      <th style="padding-left: 20px"><h5>Primary Entry /</h5></th>
      <th style="padding-right: 20px"><h4>Exam</h4></th>
 
    </tr>

  </table>
<br>
   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Add Exam
</button>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">


 @if (Session::has('error'))
 <div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
{{ Session::get('error') }}
</div>
            @endif


             @if (Session::has('success'))
 <div class="alert success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
{{ Session::get('success') }}
</div>
            @endif


        <h4 class="modal-title">Add Exam</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="/exam" method="post">
        	@csrf
  <div class="form-group">
  Exam Name:
    <input type="text" class="form-control" id="text" name="exam">
  </div>
 

          @foreach($classes as $cl)
         {{$cl->class}}:<input type="checkbox" style="margin-right:  19px;" name="class[]" value="{{$cl->id}}">
         @endforeach

 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<table class="table table-dark">
    <thead>
      <tr>
        <th>SN</th>
        <th>Exam</th>
        <th>Class</th>
        <th>Created on</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
    	@php($no=1)
    	@foreach($exams as $exam)
    	<tr><td>{{$no++}}</td><td><a href="exam/{{$exam->id}}">{{$exam->exam}}</a></td><td>@foreach($exam->schoolclass as $class)<button class="btn btn-default"><a href='/exam/{{$exam->id}}/{{$class->id}}'>{{$class->class}}</a></button>@endforeach</td><td>{{$exam->created_at}}</td><td>Action</td></tr>@endforeach

     
    </tbody>
  </table>

    
@endsection