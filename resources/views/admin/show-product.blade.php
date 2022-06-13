@extends('layouts.master-admin')

@section('title')
  Show |  Product
@endsection

@section('content')

<h3>All Product Details</h3>
 <br>
 <div class="controller">
 	<div class="row">
 		
 		<div class="col-sm-12 col-md-12">
 			 <div style="overflow-x:auto;">
 	
		  <table class="table table-hover">
		    <tr>
		    	<th>S.R</th>
		      <th>Product Name</th>
		      <th>Category Name</th>
		      <th>Price</th>
		      <th>First Image </th>
		      <th>Second Image </th>
		      <th>Short Descp </th>
		      <!-- <th>Long Descp</th> -->
		      <th>Product Add Date</th>
		      <th class="btn btn-success btn-sm">Edit</th>

		      
		    </tr>
		    @foreach($allshowproduct as $allproduct)
		    <tr>
		    	<td>{{ $allproduct->id }}</td>
		      <td>{{ $allproduct->product_name }}</td>
		      <td>{{ $allproduct->category_name }}</td>
		      <td>{{ $allproduct->price }}</td>
		      <td>
		      	<img src="{{ asset('uploads/'.$allproduct->product_img) }}" class="img-fluid">
		      </td>
		      <td>
		      	 <img src="{{ asset('uploads/'.$allproduct->product_img2) }}" class="img-fluid" >
		      </td>
		      <td class="short_descp1">{{ $allproduct->short_descp }}</td>
		      <!-- <td>{{ $allproduct->long_descp }}</td> -->
		      <td>{{ $allproduct->created_at }}</td>
		      <td class="btn btn-success btn-sm">Edit</td>
		     </tr>
		    @endforeach
		  </table>
		  
		</div>
 		</div>
 		
 	</div>
 </div>




@endsection

@section('scripts')

@endsection