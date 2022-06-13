@extends('layouts.master-admin')
@section('content')

<br>

<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-3">
			<a href="{{ url('working-emp-admn') }}" type="btn" class=" btn-custom ">Working
                (
                    <?php
                       if(isset($empcountworking))
                       {
                            echo $empcountworking;
                       }


                     ?>
                )
		    </a>
		</div>
		<div class="col-sm-12 col-md-3">
			<a href="{{ url('not-working-emp-admn') }}" type="btn" class="btn-custom">Not Working
                (
                    <?php
                       if(isset($empcountnotwork))
                       {
                            echo $empcountnotwork;
                       }
                    ?>
                )
            </a>
		</div>
		<div class="col-sm-12 col-md-3">
			<a href="{{ url('all-emp-admn') }}" type="btn" class="btn-custom">All
                (
                    <?php
                       if(isset($empcountall))
                       {
                            echo $empcountall;
                       }


                     ?>
                )
            </a>
		</div>
		
		<div class="col-sm-12 col-md-3">
			<a href="{{ url('add-staff') }}" type="btn" class="btn-custom" data-toggle="modal" data-target="#exampleModal">Add Staff +
               
            </a>
		</div>
	</div>
</div>

<br>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<table class="table table-hover" >
 				@if(isset($emp))
 				<h3>BWT Emloyees </h3>

 				@foreach($emp as $company)
 				<tr>
 				   <th>Emp. Name</th>
                   <td><a href="{{url('/single-emp/'.$company->id)}}">{{ $company->name }}</a></td>
 				</tr>
 				@endforeach
 				@else
 				@endif

           </table>
		</div>
	</div>
</div>


<!-- Model Form -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><mark>Add New Employee</mark></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="container">
                <form method="post" action="{{ url('register-user') }}">
                    @csrf
                     <div class="row"> 
                            <div class="col-sm-12 col-md-12">
                               <label>Emp Name</label>
                               <input type="text" class="form-control" name="name">
                            </div>
                            <div class="col-sm-12 col-md-12">
                               <label>Email</label>
                               <input type="text" class="form-control" name="email">
                            </div>
                            
                            <div class="col-sm-12 col-md-12">
                               <label>Mobile No.</label>
                               <input type="text" class="form-control" name="mobile">
                            </div>
                            
                            <div class="col-sm-12 col-md-12">
                               <label>Reporting Manager</label>
                               <input type="text" class="form-control" name="rept_mang">
                            </div>
                            
                            <div class="col-sm-12 col-md-12">
                               <label>Designation</label>
                               <input type="text" class="form-control" name="dept">
                            </div>
                            
                            <div class="col-sm-12 col-md-12">
                               <label>Date Of Joing</label>
                               <input type="text" class="form-control" name="doj">
                            </div>
                            <div class="col-sm-12 col-md-12">
                               <label>Password</label>
                               <input type="text" class="form-control" name="password">
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Emp</button>
                            </div>
                            
                     </div>
                </form>
            </div>
      </div>
      
    </div>
  </div>
</div>
<!-- End Model Form -->
@endsection
