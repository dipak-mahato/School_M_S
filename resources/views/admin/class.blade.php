@extends('layouts.main')

@section('content')

@if(Session::has('checkerror'))
<script>
$(function() {
    $('#myModal').modal('show');
});
</script>

@endif
 @if (Session::has('message'))
 <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
{{ Session::get('message') }}
</div>
 @endif
 @if (Session::has('error'))
 <div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
{{ Session::get('error') }}
</div>
 @endif

<div style="background-color: green;margin-top: -16px;height: 40px;"><h3>Class Summary</h3></div>

  <table>
    <tr style="background-color: lightblue">
      <th style="padding-left: 20px"><h5>Main Entry /</h5></th>
      <th style="padding-right: 20px"><h4>Class</h4></th>
 
    </tr>

  </table>


<br>

 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Add Class
  </button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
           @if (Session::has('checkerror'))
 <div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
{{ Session::get('checkerror') }}
</div>
            @endif
          <h4 class="modal-title">Add class</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="/class" method="post">
            @csrf
         Class:<input type="text" name="cllass" required>
          <br><br>
         <b style="margin-right:  15px">Shift:</b>
          @foreach($shifts as $shift)
         {{$shift->shift}}:<input type="checkbox" style="margin-right:  19px;" name="shift[]" value="{{$shift->id}}">
         @endforeach

                 <br><b style="margin-right: 15px"> Section:</b> 
          @foreach($sections as $section)
         {{$section->section}}:<input type="checkbox" style="margin-right:  19px;" name="section[]" value="{{$section->id}}">
         @endforeach    <br>
         <input type="submit" class="btn btn-primary" value="Add" style="margin-bottom: 0px">


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
         <th>Class</th>
         <th>Subjects</th>
         <th>Shift</th>
 <th>Student List</th>
  <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php($no=1)
      @foreach($classes as $cl)
      <tr><td>{{$no++}}</td><td>{{$cl->class}}</td><td><a href="/subject/{{$cl->class}}" style="text-decoration: none">subjects</a></td><td>@foreach($cl->shifts as $shift)<button class="btn btn-primary">{{$shift->shift}}</button> @endforeach</td>
        
        <td><a href="student/{{$cl->class}}/{{$cl->id}}"><button class="btn btn-success">
             {{"student on Class".$cl->class}}
           </button></a>
        </td>

        <td>


          <a href="#"><i class="fa fa-edit" style="font-size: 18px;color :green;"></i></a>
           
        <form action="/class/{{$cl->id}}" method="post">
          @csrf
          {{method_field('DELETE')}}
 <button type="submit" class="btn btn-default" style="margin:0px;padding:0px" onclick="conform()"> <i class="fa fa-trash"  style="font-size: 18px;color :red; "></i> </button>

 <script type="text/javascript">function conform(){
  confirm("are u sure to delete");
 }</script>
         
        </form>



      </td></tr>
       @endforeach
    </tbody>
  </table>

@endsection