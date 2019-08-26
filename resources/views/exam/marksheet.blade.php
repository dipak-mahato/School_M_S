<!DOCTYPE html>
<html>
<head>
	<title>Student Detail</title>

 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

   


  

  <!-- Custom fonts for this template-->
  <link href="{{asset('css/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{asset('css/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Custom styles for this template-->
  <link href="{{asset('css/css/sb-admin.css')}}" rel="stylesheet">


</head>
<body>
<div class="container"><div class="jumbotron" style="margin-left: 10%;border-bottom: 1px solid black; margin-right: 10%;">
	

	<div style="text-align: center; background-color: black"><h3 style="color: white">Student Marksheet</h3></div>
    <h3 style="text-align: center;">{{$examm->exam}} Examination</h3>
    <table style="margin:0px;padding: 0px"><tr><th>Name:</th><td>{{$student->name}}</td></tr><tr><th>Class:</th><td>{{$student->schoolclass->class}}</td></tr><tr><th>Section:</th><td>{{$student->section->section}}</td></tr><tr><th>Shift:</th><td>{{$student->shift->shift}}</td></tr></table><br>
	<table style="width: 100%;">
        <tr  style="border-bottom: 1px solid lightblue"><th>S.N</th><th>Subject</th><th>Full Mark</th><th>Pass Mark</th><th>Obtaine Mark</th><th>Remark</th></tr>
        @php($count=1)
        @foreach($marks as $mar)
        @if($mar->exam_id==$exam)
        
@php($remark=0)
     	<tr style="border-bottom: 1px solid lightblue"><th>{{$count++}}</th><td>{{$mar->subject}}</td><td>{{$mar->FM}}</td><td>{{$mar->PM}}</td><td>{{$mar->obtained_mark}}</td><td>@if($mar->obtained_mark<$mar->PM)  @php($remark=1)<p style="color: red">F</p> @endif</td></tr>

     	@endif

        @endforeach


@php($var=0)
		<tr style="border-top: 1px solid yellow"><th>Total</th><td></td><th><?php  foreach ($marks as $ma) {
			if($ma->exam_id==$exam){
              $var=$var+$ma->FM;
			}
		}echo $var;   ?>@php($var=0)
			


		</th>

       <td></td>
       <th>
        @if($remark!=1)
       	@php($var=0)
       	<?php  foreach ($marks as $ma) {
       		if($ma->exam_id==$exam){
              $var=$var+$ma->obtained_mark;
              }
		}echo $var;   ?>@endif
       </th>
@php($var=0)

	</tr></table>
 </div>
</body>
</html>