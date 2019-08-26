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

<div style="background-color: green;margin-top: -16px;height: 40px;"><h3>Class {{$class->class}}

 Subject Summary</h3></div>


  <table>
    <tr><td><button class="btn" style="background-color:black"><a href="/class" style="color: white">Back</a></button></td></tr>
  </table>
  <br>
 
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Add Subjects
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

          <h4 class="modal-title">Add Subject</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="/subject" method="post">
            @csrf
         Name:<input type="text" name="subject" >
         <input type="text" name="classid" value="{{$class->id}}" hidden>
          
         <input type="submit" name="Add">


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
        <th>Subjects</th>
      
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
      @php($no=1)
     @foreach($class->subjects as $sub) <tr><td>{{$no++}}</td><td>{{$sub->subject}}</td>
               <td>
       


        
           
        <form action="/subject/{{$sub->id}}" method="post">
          @csrf
          {{method_field('DELETE')}}
 <button type="submit" class="btn btn-default" style="margin:0px;padding:0px" onclick="conform()"> <i class="fa fa-trash"  style="font-size: 18px;color :red; "></i> </button>

 <script type="text/javascript">function conform(){
  confirm("are u sure to delete");
 }</script>
         
        </form>



      </td>
   
     </tr>@endforeach
  </tbody>
  </table>

  <!-- Button to Open the Modal -->

@endsection