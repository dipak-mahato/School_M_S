@extends('layouts.main')

@section('content')
  
   <div style="background-color: green;margin-top: -16px;height: 40px;"><h3>Student Summary</h3></div>
<br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Add Student
  </button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Student</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
 <form action="/student" method="post"  enctype="multipart/form-data">
  @csrf
  <div class="form-group">
 <table>
  <tr>
    <td>name</td>
    <td><input type="text" class="form-control" name="name"></td>
    </tr>

  <tr>
    <td>Address</td>
    <td><input type="text" class="form-control" name="address"></td>
    </tr>
  <tr>
    <td>Date of Birth</td>
    <td><input type="text" class="form-control" name="dob"></td>
    </tr>
  <tr>
    <td>Phone</td>
    <td><input type="text" class="form-control" name="phone"></td>
    </tr>
  <tr>
    <td>Select an Image</td>
    <td><input type="file" class="form-control" name="image" required></td>
    </tr>
  <tr>
    <td>Class</td>
    <td><select name="class" class="form-control" id="class"> @foreach($classes as $class)<option value="{{$class->id}}" >{{$class->class}}</option>@endforeach</select></td>
    </tr>
 
  <tr>
    <td>Section</td>
    <td><select name="sfd" class="form-control" id="section"> <option value="">-- select one -- </option></select></td>
    </tr>

  <tr>
    <td>Shift</td>
    <td><select name="shift" class="form-control">@foreach($shifts as $shift)<option value="{{$shift->id}}">{{$shift->shift}}</option>@endforeach</select></td>
    </tr>
 

</table>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>         </div>
        

<script type="text/javascript">
  
$(document).ready(function () {
    $("#class").change(function () {
        var val = $(this).val();
    


<?php foreach($classes as $cl){ 
  $var=$cl->id;
  ?> var vai='<?php echo $var; ?>'; if (vai==val) {document.getElementById('section').innerHTML="<?php 
  foreach($cl->sections as $sec){ ?> <option><?php echo $sec->section; ?></option><?php } ?>";}<?php }
 ?>


    });
});

</script>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
@endsection