@extends('layouts.main')

@section('content')
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
<div style="background-color: green;margin-top: -16px;height: 40px;"><h3>Section Summary</h3></div>
 

  <table>
    <tr style="background-color: lightblue">
      <th style="padding-left: 20px"><h5>Main Entry /</h5></th>
      <th style="padding-right: 20px"><h4>Section</h4></th>
 
    </tr>

  </table>
<br>
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Add Section
  </button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Section</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="/section" method="post">
            @csrf
         Section:<input type="text" name="section" >
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
        <th>section</th>
        <th>Created on</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
 @php ($no = 1)

       @foreach($sections as $section)
      
     <tr><td>{{$no++}}</td><td>{{$section->section}}</td><td>{{$section->created_at}}</td>

             <td>
       


        
           
        <form action="/section/{{$section->id}}" method="post">
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