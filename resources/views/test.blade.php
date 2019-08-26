 @extends('layouts.main')

@section('content')

 <div style="background-color: green;margin-top: -16px;height: 40px;"><h3>Students on class {{$classes->class}}</h3>

  <table>
    <tr><td><button class="btn" style="background-color:black"><a href="/class" style="color: white">Back</a></button></td></tr>
  </table>
  <br>
 



<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Add Students
</button>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
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
    <td><input type="text" class="form-control" name="address" required></td>
    </tr>
  <tr>
    <td>Date of Birth</td>
    <td><input type="text" class="form-control" name="dob" required></td>
    </tr>
  <tr>
    <td>Phone</td>
    <td><input type="text" class="form-control" name="phone" required></td>
    </tr>
  <tr>
    <td>Select an Image</td>
    <td><input type="file" class="form-control" name="image" required></td>
    </tr>
  <tr>
    <td>Class</td>
    <td><select name="class" class="form-control" id="class"><option value="{{$classes->id}}"> {{$classes->class}}</option></select></td>
    </tr>
 
  <tr>
    <td>Section</td>
    <td><select name="sfd" class="form-control" id="section" required><option value="">-- Select one--</option>@foreach($sections as $sec) <option value="{{$sec->id}}"> {{$sec->section}}</option>@endforeach</select></td>
    </tr>

  <tr>
    <td>Shift</td>
    <td><select name="shift" id="shift" class="form-control" required><option value="">-- Select one--</option>@foreach($shifts as $sh) <option value="{{$sh->id}}"> {{$sh->shift}}</option>@endforeach</select></td>
    </tr>
 

</table>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>         </div>
        



      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
 


   <table class="table table-dark">
    <thead>
      <tr>
        <th>SN</th>
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
  <td><a href="/student/{{$student->id}}" target="_blank" style="text-decoration: none"> {{$student->name}}</a></td>
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