@extends('layouts.master-admin')
@section('content')
<div class="container">
 	<div class="row">
 		<div class="col-sm-12 col-md-12" style="overflow-x:auto;">
 			<h3><span>All Packages Details</span><span class="float-right"> Tolal Packages <?php echo count($package);  ?></span></h3><br>
 			<table class="table table-hover ">
 				<tr>
 					<th>Package Name</th>
                    <th>Package Price</th>
                    <th>Image</th>
                    <th><a type="btn">Edit</a></th>
                    <th><a type="btn">Dlt</a></th>
                   
 				</tr>
 				@foreach($package as $company)
 				<tr>
                    <td>{{ $company->package_name }}</td>
 					<td>{{ $company->package_price }}</td>
                    <td>
                    	<img src="{{ asset('uploads/'.$company->package_image) }}" alt="Package" style="height:80px;width:100px;border-radius:0px !important;" >
                    </td>
 					
                   <td><a type="btn" class="btn btn-secondary" href="/company-edit/{{ $company->uuid }}">Edit</a></td>
                   <td><a type="btn" onclick="return myFunction();" class="btn btn-secondary" href="/company-dlt/{{ $company->uuid }}"><i  class="fa fa-trash" aria-hidden="true"></i></a></td>
                 </tr>
 				@endforeach
 			</table>
        </div>
 	</div>
 </div>
@endsection