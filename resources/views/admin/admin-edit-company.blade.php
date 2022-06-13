@extends('layouts.master-admin')
@section('content')
	
<section id="Edit Company Start">
	<div class="container">
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
		<h3 class="mb-4">Edit Admin Company</h3>
		<form class="form" action="/admin-company-update/{{ $company->gst_no }}" method="post">
			{{ csrf_field() }}
	        {{ method_field('PUT') }}
			<div class="row">
				<div class="col-sm-12 col-md-4">
				     <input type="text" class="form-control" name="data_sources" value="{{ $company->data_sources }}" placeholder="Data Sources">
			    </div>
			    <div class="col-sm-12 col-md-4">
				     <input type="text" class="form-control" name="company_name" value="{{ $company->company_name }}" placeholder="Company Name">
			    </div>
			    <div class="col-sm-12 col-md-4">
				     <input type="text" class="form-control" name="address" value="{{ $company->address }}" placeholder="Full Address">
			    </div>
			</div><br>
			<div class="row">
				<div class="col-sm-12 col-md-4">
				     <input type="text" class="form-control" name="gst_no" value="{{ $company->gst_no }}" placeholder="GST. No.">
			    </div>
			    <div class="col-sm-12 col-md-4">
				     <input type="text" class="form-control" name="website_url" value="{{ $company->website_url }}" placeholder="Website Url">
			    </div>
			    <div class="col-sm-12 col-md-4">
				     <input type="text" class="form-control" name="established_year" value="{{ $company->established_year }}" placeholder="Established Year">
			    </div>
			</div>
            <br>
			<div class="row">
				<div class="col-sm-12 col-md-4">
					<select   name="owner_ship" class="form-control" value="{{ $company->owner_ship }}">
						<option value="First">Select Owner Ship Type</option>
	                    <option value="First">First</option>
	                    <option value="Second">Second</option>
	                </select>
			    </div>
			    <div class="col-sm-12 col-md-4">
					<select   name="business_type" class="form-control" value="{{ $company->business_type }}">
						<option value="First">Business Type</option>
	                    <option value="First">First</option>
	                    <option value="Second">Second</option>
	                </select>
			    </div>
			</div><br><hr>
			<h3 class="mb-3">User Details</h3>
			<div class="row">
				<div class="col-sm-4">
					<input type="text" class="form-control" name="user_name" placeholder="User Name" value="{{ $company->cus_name }}">
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="designation" placeholder="Designation" value="{{ $company->designation }}">
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="email" placeholder="Email" value="{{ $company->email }}"><br>
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="mobile_no" placeholder="Mobile No." value="{{ $company->mobile_no }}">
				</div>
				<div class="col-sm-8">
					<input type="submit" class=" btn btn-secondary block-btn form-control" value="Update" >
				</div>
			</div>
		</form>
	</div>
</section>
@endsection

