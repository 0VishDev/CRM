@extends('layouts.master-admin')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-4">
			<h3><mark>Add Premium Packages</mark></h3>
		</div>
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
<div class="container package-form">
	<form action="{{ url('admin-packages-submit') }}" method="post" enctype="multipart/form-data">
		@csrf
			<div class="row">
			<div class="col-sm-12 col-md-6">
				<label>Enter Package Name</label>
				<input type="text" name="package_name" placeholder="Enter Packages Name" class="form-control" required>
			</div>
			<div class="col-sm-12 col-md-6">
				<label>Select Package Tag</label>
				<input type="file" name="package_image" class="form-control" required><br>
			</div>
			<div class="col-sm-12 col-md-12">
				<label>Package Price</label>
				<input type="text" name="package_price" class="form-control" placeholder="Enter Packages Price" required><br>
			</div>
			<div class="col-sm-12 col-md-4">
				<input type="submit" value="Add Package" class="btn btn-success btn-block" >
			</div>
			</div>
	</form>
</div>

@endsection