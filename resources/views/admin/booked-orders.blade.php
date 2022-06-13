@extends('layouts.master')

@section('title')
  Show |  Product
@endsection

@section('content')

<h3 style="color:red;">Orders</h3>
 <br>
 <div class="controller">
 	<div class="row">
 		
 		<div class="col-sm-12 col-md-12">
 			 <div style="overflow-x:auto;">
 	
		  <table class="table table-hover">
		    <tr>
		    	<th>S.R</th>
		      <th>Product Name</th>
		      <th>Price</th>
		      <th>Total Price</th>
		      <th>Quantity</th>
		      <th>Booking Date</th>
		     </tr>
		    @foreach($order as $allproduct)
		    <tr>
		    	<td>{{ $allproduct->id }}</td>
		      <td>{{ $allproduct->product_name }}</td>
		      <td>{{ $allproduct->price }}</td>
		      <td>{{ $allproduct->total_price }}</td>
		      <td>{{ $allproduct->quantity }}</td>
		      <td>{{ $allproduct->created_at }}</td>
		      
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