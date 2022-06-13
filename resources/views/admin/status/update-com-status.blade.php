@extends('layouts.master-admin')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-sm-12 col-md-6">
         <h3 class="text-left">Enter User Comment </h3>
         <br>
      </div>
      <!--<div class="col-sm-12 col-md-6">
         <a  type="btn" class="btn btn-secondary float-right" href="{{ url('my_data') }}"> Back</a>
      </div>-->
   </div>
</div>
@if (session('success'))
<div class="alert alert-success">
   {{ session('success') }}
</div>
@endif
@if(session()->has('alert_msg'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
   {{ session()->get('alert_msg') }}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">×</span>
   </button>
</div>
@endif
<form class="form" action="{{url('/add-comment/'.$checkComment->uuid)}}" method="post">
   @csrf
   <div class="row">
      <div class="col-sm-12 col-md-4">
         <label>Company Name</label>
         <a href="{{url('/admin-all-info/'.$checkComment->uuid)}}"><input type="text" class="form-control" name="comp_name" placeholder="Company Name" value="{{ $checkComment->company_name }}" readonly></a>
      </div>
      <div class="col-sm-12 col-md-4">
         <label>Customer Name</label>
         <input type="text" class="form-control" name="emp_name" placeholder="Customer Name" value="{{ $checkComment->cus_name }}" readonly><br>
      </div>
      
      <div class="col-sm-12 col-md-4">
        	<label>Mobile No.</label>
    	     <a ><input type="text" class="form-control"  style="font-size:20px;" value="{{ $checkComment->mobile_no }}" readonly></a>
        </div>
      
      <div class="col-sm-12 col-md-4">
         <label>Next Follow Up Timing </label>
         <input class="form-control" value="{{ $checkComment->next_call_timing }}" type="datetime-local" id="meeting-time"
            name="next_followup" value="0000-00-0000:00"
            min="2018-06-07T00:00" max="2022-06-14T00:00">
      </div>
      
      
      
      <div class="col-sm-12 col-md-4">
    	<label>Add Package </label>
    	<select class="form-control " name="package_name">
            <option value=""></option>
    		@foreach($package as $showpackage)
    		    <option value="{{ $showpackage->package_image}}">{{ $showpackage->package_name}}</option>
            @endforeach
    	</select>
    </div>
							    
      <div class="col-sm-12 col-md-4">
         <label>Update Status</label>
         <select class="form-control" name="status">
							    		<option 
							    		<?php
							    		if($checkComment->status == 'F.N.C')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
							    		>F.N.C</option>
								    	<option 
								    	<?php
							    		if($checkComment->status == 'C.B')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
							    	     >C.B</option>
							    	     <option 
								    	<?php
							    		if($checkComment->status == 'C.B Flps')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
							    	     >C.B Flps</option>
								    	<option 
								    	<?php
							    		if($checkComment->status == 'F DMU')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>F DMU</option>
								    	
								    	<option 
								    	<?php
							    		if($checkComment->status == 'Dmu Flps')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>Dmu Flps</option>
								    	
								    	<option 
								    	<?php
							    		if($checkComment->status == 'PG')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>PG</option>
								    	<option 
								    	<?php
							    		if($checkComment->status == 'P.G Flps')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>P.G Flps</option>
								    	<option
								    	<?php
							    		if($checkComment->status == 'Cnvrt')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>  
								    	>Cnvrt</option>
								    	<option 
								    	<?php
							    		if($checkComment->status == 'NI')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>NI</option>
								    	
								    	<option 
								    	<?php
							    		if($checkComment->status == 'Pg Ni')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>Pg Ni</option>
								    	
								    	<option 
								    	<?php
							    		if($checkComment->status == 'Dmu Ni')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>Dmu Ni</option>
								    	<option 
								    	<?php
							    		if($checkComment->status == 'Com. Clsd')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>Com. Clsd</option>
								    	<option
								    	<?php
							    		if($checkComment->status == 'W No')
							    		{
							    			echo "selected";
							    		} 
							    		 ?> 
								    	>W No</option>
								    	<option 
								    	<?php
							    		if($checkComment->status == 'N.T.C')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>N.T.C</option>
								    	<option 
								    	<?php
							    		if($checkComment->status == 'Ser. Prv')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>Ser. Prv</option>
								    	
								    	<option 
								    	<?php
							    		if($checkComment->status == 'Touch.c')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>Touch.c</option>
								    	
								    	<option 
								    	<?php
							    		if($checkComment->status == 'Hot.F.C.A')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>Hot.F.C.A</option>
                                        
                                        <option
								    	<?php
    							    		if($checkComment->status == 'P1')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>  
								    	>P1</option>
								    	
								    	<option
								    	<?php
    							    		if($checkComment->status == 'Pick')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>  
								    	>Pick</option>
								    	
								    	<option
								    	<?php
							    		if($checkComment->status == 'Lang.B')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>  
								    	>Lang.B</option>
								    	
								    	<option
								    	<?php
							    		if($checkComment->status == 'C.By.H')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>  
								    	>C.By.H</option>
								    	
								    	<option
								    	<?php
							    		if($checkComment->status == 'Sr.A')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>  
								    	>Sr.A</option>
								    	
								    	<option
								    	<?php
							    		if($checkComment->status == 'Sr.B')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>  
								    	>Sr.B</option>
								    	
								    	<option
								    	<?php
							    		if($checkComment->status == 'Drop')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>  
								    	>Drop</option>
								    	
								    	
								    	<option
								    	<?php
							    		if($checkComment->status == 'V.Buy.Lead')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>  
								    	>V.Buy.Lead</option>
							    	</select>
      </div>
   </div>
   <br>
   <div class="col-sm-12 col-md-6">
							    	
        	<input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
        </div>
   <div class="col-sm-12 col-md-12">
		<a class="btn-custom" data-toggle="modal" data-target="#exampleModal">Add Comment</a>

		<a class="btn-custom" style="float:right;" data-toggle="modal" data-target=".bd-example-modal-lg">Show Comment</a>
		<!-- <label>Enter Comment</label>
		<textarea rows="4" cols="80" class="form-control" name="comment" placeholder="Enter Comment"> </textarea><br> -->
	</div>
   <div class="col-sm-12 col-md-12">
      <input type="text" readonly class="form-control" name="oldcomment" placeholder="Old Comment " value="{{ $checkComment->comment }}"><br>
   </div>
   <div class="row">
      <div class="col-sm-12 col-md-12">
         <input type="submit" value="Send Comment" class="form-control btn btn-secondary" >
      </div>
   </div>
   <br>
</form>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h3 class="modal-title text-center" id="exampleModalLabel">Enter Comment</h3>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <form method="post" id="add_comment">
					        	<input type="hidden" value="{{ $checkComment->uuid }}" name="hidid" >
					        	<input type="hidden" value="{{ Auth::user()->name }}" name="comments_by" >
					        	<label>Enter Comment</label>
					        	<textarea rows="4" cols="80" class="form-control" name="comment" placeholder="Enter Comment" id="comment"> </textarea>
					        	<span class="text-danger error-text comment_error"></span>
					        	<div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						        <button type="button" class="btn-custom btn-submit-comnt-admin">Save changes</button>
						      </div>
					        </form>
					      </div>
					      
					    </div>
					  </div>
					</div>

					<!-- Show Comment -->
					<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-lg">
					    <div class="modal-content">
					      <div class="container">
						 	<div class="row">
						 		<div class="col-sm-12 col-md-12" style="overflow-x:auto;">
						 			<h3 class="h3 mt-3"><span > Display All Comments on This Indivisual Company</span></h3>
						 			
						 			<table class="table table-hover table-dark">
						 				<tr>
						 					<th>Emp Name</th>
						 					<th>Company Name</th>
						 					<th>Company Id</th>
						 					<th>Comment By</th>
						                    <th>Comment</th>
						                    <th>Date</th>
						                    <th>Dlt</th>
						                </tr>

						                @if(isset($comment))
						                @foreach($comment as $cmnt)
						 				<tr>
						 					<td>{{ $cmnt->emp_name }}</td>
						 					<td>{{ $cmnt->company_name }}</td>
						                    <td>{{ $cmnt->com_id }}</td>
						                    <td>{{ $cmnt->comments_by }}</td>
						 					<td>{{ $cmnt->comments }}</td>
						 					<td>{{ $cmnt->created_at }}</td>
						 					<td><a type="btn" onclick="return myFunction();" class="btn-custom" href="{{ url('/admin-comment-dlt/'.$cmnt->id) }}"><i  class="fa fa-trash" aria-hidden="true"></i></a></td>
						                </tr>
						 				@endforeach
						                @else
						                <h1>No</h1>
						                @endif
						 				
						 			</table><br>
						 		

						 			<br>
						        </div>
						 	</div>
						 </div>
					    </div>
					  </div>
					</div>
@endsection
@section('scripts')
  <script type="text/javascript">
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $(".btn-submit-comnt-admin").click(function(e){
        
        e.preventDefault();
   
        var hidid = $("input[name=hidid]").val();
        //var token = $("input[name=_token]").val();
        var comments_by = $("input[name=comments_by]").val();
        var comment =     $("textarea[name=comment]").val();
        
        //alert("good");
        $.ajax({
           type:'POST',
           url:"{{ route('ajaxRequestcmnt.comment_admin') }}",
           data:{hidid:hidid,comment:comment, comments_by:comments_by},
           success:function(data){
                if(data.status == 0)
                {
                    $.each(data.error, function(prefix, val){
                        $('span.'+prefix+'_error').text(val[0]);
                    });
                }
                else
                {
                    $('#add_comment')[0].reset();
                    alert(data.success);
                }
            }
        });
  
    });
  </script>
@endsection