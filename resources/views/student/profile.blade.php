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
	

	<div style="text-align: center; background-color: black"><h3 style="color: white">Student Detail</h3></div><br>
<div class="row">
	
   <div class="col-md-4"><img src="{{asset('uploads/'.$student->file)}}" height="199px" width="199px"></div>
   <div class="col-md-8"><h3 style="background-color: #10d609; text-align: center;">{{$student->name}} Detail</h3>
   	 <table>
      <tr><th>Reg.no</th><td>{{$student->id}}</td></tr>
   	 	<tr><th>Student Name:</th><td style="padding-left: 10px">{{$student->name}}</td></tr>
   		<tr><th>Address  :</th><td style="padding-left: 10px">{{$student->address}}</td></tr>
    		<tr><th>DOB:</th><td style="padding-left: 10px">{{$student->dob}}</td></tr>		   		
   		<tr><th>Contact:</th><td style="padding-left: 10px">{{$student->phone}}</td></tr>
   		<tr><th>Class:</th><td style="padding-left: 10px">{{$student->schoolclass->class}}</td></tr>				
   		<tr><th>Section:</th><td style="padding-left: 10px">{{$student->section->section}}</td></tr>
   		<tr><th>Shift:</th><td style="padding-left: 10px">{{$student->shift->shift}}</td></tr> 	 	
   	 </table>





   </div>







</div>


</div></div>
</body>
</html>