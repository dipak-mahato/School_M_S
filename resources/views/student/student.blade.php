 @extends('layouts.main')

@section('content')
  
   <div style="background-color: green;margin-top: -16px;height: 40px;"><h3>Student Summary</h3>
 


    <form style="float: right;" action="/search" method="get">
      @csrf
<input type="text" placeholder="Search.. .." name="search" required><button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button></form>


   </div>
 

  <table>
    <tr style="background-color: lightblue">
      <th style="padding-left: 20px"><h5>Primary Entry /</h5></th>
      <th style="padding-right: 20px"><h4>Students</h4></th>
 
    </tr>

  </table>
  <br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Add Student
  </button>
  <a href="/student"><button class="btn btn-primary">See All Student</button></a>

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
    <td><input type="text" class="form-control" name="name" required></td>
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
    <td><select name="class" class="form-control" id="class" required><option>--please select--</option> @foreach($classes as $class)<option value="{{$class->id}}" >{{$class->class}}</option>@endforeach</select></td>
    </tr>
 
  <tr>
    <td>Section</td>
    <td><select name="sfd" class="form-control" id="section" required> <option value="">-- select one -- </option></select></td>
    </tr>

  <tr>
    <td>Shift</td>
    <td><select name="shift" id="shift" class="form-control" required><option value="">-- select one -- </option></select></td>
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
  foreach($cl->sections as $sec){ ?> <option value=<?php echo $sec->id; ?>><?php echo $sec->section; ?></option><?php } ?>";

document.getElementById('shift').innerHTML="<?php 
  foreach($cl->shifts as $sh){ ?> <option value=<?php echo $sh->id; ?>><?php echo $sh->shift; ?></option><?php } ?>";
}

<?php }
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












   <table class="table table-dark">
    <thead>
      <tr>
        <th>SN</th>
        <th>Reg.no</th>
        <th>Full Name</th>
        <th>Class</th>
        <th>Shift</th>
        <th>Address</th>
        <th>phone</th>
        <th>Preview</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

 @php ($no = 1)
@foreach($students as $student)
 <tr>
  <td>{{$no++}}</td>
  <td>{{$student->id}}</td>
  <td><a href="student/{{$student->id}}" target="_blank" style="text-decoration: none"> {{$student->name}}</a></td>
  <td>{{$student->schoolclass->class}}</td>
  <td>{{$student->shift->shift}}</td>
  <td>{{$student->address}}</td>
  <td>{{$student->phone}}</td>
  <td style="padding:0px;padding-bottom: 5px;"><img src="{{asset('/uploads/'.$student->file)}}" style="height: 55px;width: 70px;margin-top:0px;padding:0px;"></td>
   

   <td><a href="#"><i class="fa fa-edit" style="font-size: 18px;color :green;"></i></a>
           
        <form action="/student/{{$student->id}}" method="post">
          @csrf
          {{method_field('DELETE')}}
 <button type="submit" class="btn btn-default" style="margin:0px;padding:0px" onclick="conform()"> <i class="fa fa-trash"  style="font-size: 18px;color :red; "></i> </button>

 <script type="text/javascript">function conform(){
  confirm("are u sure to delete");
 }</script>
         
        </form>



      </td> 
 </tr>
@endforeach
       
    </tbody>
  </table>
@endsection