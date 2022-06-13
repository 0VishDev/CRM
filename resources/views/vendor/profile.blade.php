@extends('layouts.master')
@section('content')

<div class="container">
	<div class="row">
       <h3 class="mb-3"><mark>My Profile</mark></h3>

@if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
	</div>
</div>
<div class="container">
	<div class="row">
	    <div class="col-sm-12 col-md-3">
	        
	        @foreach($user_check as $user)
            @if($user->image)
            <img src="{{ ('storage/app/public/'.$user->image) }}" alt="{{$user->image}}" style="height:200px;">
            <button type="btn" class="btn btn-custom" style="float:right;" data-toggle="modal" data-target=".bd-example-modal-lg">Update My Profile</button>
            @else
            <img src="{{ ('storage/app/public/user.jpg') }}" alt="Avatarr" style="height:200px;">
            <button type="btn" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">Update My Profile</button>
            @endif
            @endforeach
	   </div>
		<div class="col-sm-12 col-md-9">
			
			<table class="table table-hover table-border" style="box-shadow:2px 2px 2px 2px #ccc;border:2px solid gray;">
				@foreach($user_check as $user)
				<tr>
					<th>Emp Id</th>
					<td>{{ $user->emp_id }}</td>
				</tr>
				<tr>
					<th>Name</th>
					<td>{{ $user->name }}</td>
				</tr>
				<tr>
					<th>Email</th>
					<td>{{ $user->email }}</td>
				</tr>
				<tr>
					<th>Mobile No.</th>
					<td>{{ $user->mobile }}</td>
				</tr>
				<tr>
					<th>Reporting Manager</th>
					<td>{{ $user->rept_mang }}</td>
				</tr>
				<tr>
					<th>Department</th>
					<td>{{ $user->dept }}</td>
				</tr>
				
				<tr>
					<th>Date Of Joing</th>
					<td>{{ $user->doj }}</td>
				</tr>
				<tr>
					<th>Designation</th>
					<td>{{ $user->desig }}</td>
				</tr>
				
				
				@endforeach
			</table>
		</div>
		
		 
	</div>
</div>
<br><br><br><br>

<!-- Large modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <div class="container">
       	   <form action="{{ url('user-info-update/'.$user_check[0]->id) }}"  method="post" accept-charset="utf-8" enctype="multipart/form-data">
       	   	@csrf
       	   	@method('PUT')
       	   	  <div class="row">
       	   	  	<div class="col-sm-12 col-md-4">
       	   	  	 	<label>Name</label>
       	   	  	 	<input type="text" class="form-control" name="name" placeholder="Company Name" value="
       	   	  	 	{{ $user_check[0]->name }}" >
       	   	  	 </div>
       	   	  	 <div class="col-sm-12 col-md-4">
       	   	  	 	<label>Email</label>
       	   	  	 	<input type="text" class="form-control" name="comp_name" placeholder="Company Name" value="
       	   	  	 	{{ $user_check[0]->email }}" >
       	   	  	 </div>
       	   	  	 <div class="col-sm-12 col-md-4">
       	   	  	 	<label>Image</label>
       	   	  	 	<input type="file" class="form-control" name="image" placeholder="Company Name" value="
       	   	  	 	{{ $user_check[0]->image }}" >
       	   	  	 	<img src="{{ ('storage/app/public/'.$user->image) }}" width="100px;">
       	   	  	 </div>
       	   	  	 <input type="submit" class="btn btn-success">
       	   	  </div>
       	   </form>
       </div>
    </div>
  </div>
</div>

<!--<h3 class="mb-3"><mark>My Documents</mark></h3>-->
<!--<div class="container">
	<div class="row">
        <div class="col-sm-12 col-md-4">
            <img src="{{ ('storage/app/public/'.$user->aadhaar) }}" class="img-fluid" style="width:300px;height:250px;">
        </div>
        <div class="col-sm-12 col-md-4">
            <img src="{{ ('storage/app/public/'.$user->pan) }}" class="img-fluid " style="width:300px;height:250px;">
        </div>
        <div class="col-sm-12 col-md-4">
            <img src="{{ ('storage/app/public/'.$user->last_qualification) }}" class="img-fluid" style="width:300px;height:250px;">
        </div>
        
	</div>
</div>-->
@endsection

