 @extends('layouts.main')
@section('content')

   <div style="background-color: green;margin-top: -16px;height: 40px;">
   	    <h3>Student Summary</h3>
   </div>
 

  <table>
    <tr style="background-color: lightblue">
       <th style="padding-left: 20px"><h5>Primary Entry /</h5></th>
       <th style="padding-right: 20px"><h4>Students</h4></th>
 
    </tr>
  </table>
  
  <br>
  
 <form action="/exam/{{$exam->id}}" method="get" >
  @csrf
     <div class="form-group">
	       <table style="width: 100%;">
	 
			  <tr style="width: 100%">
			    <td style="text-align: right;">Class</td>
			    <td style="text-align: left">
			    	<select name="class" class="form-control" id="class"style="width:200px">
			    		<option>--select class--</option> 
			    		  @foreach($classes as $class)
			    		 <option value="{{$class->id}}" >{{$class->class}}</option>
			    		   @endforeach
			    	</select>
			    </td>
			    			  
			    <td style="text-align: right;">Section</td>
			    <td style="text-align: left">
			    	<select name="sfd" class="form-control" id="section" style="width:200px">
			    	 <option value="">-- select one -- </option>
			    	</select>
			    </td>
			  

			  
			    <td style="text-align: right;">Shift</td>
			    <td style="text-align: left">
			    	<select name="shift" id="shift" class="form-control" style="width:200px">
			    		<option value="">-- select one -- </option>
			    	</select>
			    </td>
			    <td>  <button type="submit" class="btn btn-primary">Search</button></td>
			    </tr>
	
	        </table>
      </div>

</form>        
        

<script type="text/javascript">
  
	$(document).ready(function () {
	    $("#class").change(function () {
	        var val = $(this).val();
	    


			<?php foreach($classes as $cl){ 
				$var=$cl->id;
			?> 
			var vai='<?php echo $var; ?>';
			 if (vai==val) {document.getElementById('section').innerHTML="<?php 
			  foreach($cl->sections as $sec){ ?> <option value=<?php echo $sec->id; ?>><?php echo $sec->section; ?></option><?php } ?>";

			document.getElementById('shift').innerHTML="<?php 
			  foreach($cl->shifts as $sh){ ?> <option value=<?php echo $sh->id; ?>><?php echo $sh->shift; ?></option><?php } ?>";
			}

			<?php }
			 ?>


			    });
			});

</script>
 

  @if(count($students)!=null)
<tr><td>class:{{$cll->class}}/</td><td>shift:{{$shift->shift}}/</td><td>section:{{$section->section}}</td></tr>
@endif

   <table class="table table-dark">
    <thead>
      <tr>
        <th>SN</th>
        <th>Full Name</th>
 
        <th>Address</th>
 
        <th>Set Marks</th>
         <th>View Result</th>
      </tr>
    </thead>
    <tbody>
 @php($no=0)
 @foreach($students as $std)
       <tr>
	       	<td>{{$no++}}</td>
	       	<td>{{$std->name}}</td>
	       	<td>{{$std->address}}</td>
	       	<td>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$std->id}}">
				  Set Marks
				</button>

				<!-- The Modal -->
				<div class="modal" id="myModal{{$std->id}}">
				  <div class="modal-dialog">
				    <div class="modal-content">

				      <!-- Modal Header -->
				      <div class="modal-header">
				        <h4  style="background-color: black; width:100%;text-align: center;">{{$std->name}}</h4>
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				      </div>

				      <!-- Modal body -->
				      <div class="modal-body">
							 <form action="/exam/{{$exam->id}}/{{$std->id}}" method="post" >
							 	@csrf
							 	<input type="text" name="test" value="student{{$std->id}}" hidden>
							 	<input type="text" name="class" value="{{$cll->id}}" hidden>
							  <table style="border:none"><tr>
							  	@php($noo=1)
							    @foreach($cll->subjects as $sub)

							    <td style="color:black; border:none !important;">{{$noo++}}</td>
							  <td style="color:black; border:none !important;">{{$sub->subject}}</td>
							  <td style="color:black; border:none !important;">
							  	<input type="text" name="subject{{$sub->id}}" value="{{$sub->id}}" hidden>
							    <input name="mark{{$sub->id}}"  type="text" class="form-control">
							  </td></tr>
							    @endforeach
						     	<tr><td style="color:black; border:none !important;"></td><td style="color:black; border:none !important;"></td><td style="color:black; border:none !important; text-align: right;"><input type="submit" name="" class="btn btn-primary" value="set"></td></tr>

							</table>
							</form> 
						 
							 @foreach($std->marks as $mark)
                               <p style="color: black">
                              @if($mark->exam_id==$exam->id)

                               	{{$mark->subject->subject}}:{{$mark->obtained_mark}}</p>
                               	@endif
							 @endforeach
				      </div>



                     








				      <!-- Modal footer -->
				      <div class="modal-footer">
				        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				      </div>

				    </div>
				  </div>
				</div>


	       	</td>
	       	<td>@foreach($std->marks as $mar)@if($mar->exam_id==$exam->id)<a href="/view_result/{{$exam->id}}/{{$std->id}}}">view result</a> <?php break; ?> @endif @endforeach</td>
       </tr>
  @endforeach
    </tbody>
  </table>
@endsection