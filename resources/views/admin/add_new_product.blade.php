@extends('layouts.master-admin')
@section('content')
 
 <section>
 	<div class="row">
 		<div class="col-sm-12 col-md-12">
 			@if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
 			<form action="{{ url('add_product') }}" method="post" enctype="multipart/form-data">
 				{{ csrf_field() }}
 				<section>
 					<div class="container">
 						<h3 class="text-center regis-head"> Add New Product ( Fill All Details )</h3>
 						<div class="row">
 							<div class="col-sm-12 col-md-6">
 								<div class="form-group">
								    <label for="formGroupExampleInput">Product Name</label>
								    <input type="text" class="form-control radius" name="name" value="{{ old('name') }}" required  placeholder=" Name" >
							  </div>
							   <div class="form-group">
								    <label for="formGroupExampleInput">Product Images</label>
								    <input type="file" name="images1" value="{{ old('images1') }}" class="form-control radius">
							   </div>
							    <div class="form-group">
								    <label for="formGroupExampleInput">Short Descp</label>
								    <textarea class="form-control radius" rows="3" cols="80%" name="short_descp" value="{{ old('short_descp') }}" placeholder="Short Descp" ></textarea>
								   </div>
								   <div class="form-group">
								    <label for="formGroupExampleInput">Product Second Images</label>
								    <input type="file" name="images2" value="{{ old('images2') }}" class="form-control radius">
							   </div>
                </div>
 							<div class="col-sm-12 col-md-6">
 								<div class="form-group">
								    <label for="formGroupExampleInput">Product Type</label>
								    <select name="product_type" id="cars" class="form-control radius">
								    	<option value="Select">Select</option>
										  <option value="Veg">Veg</option>
										  <option value="combo veg">combo Veg</option>
										  <option value="Non Veg">Non Veg</option>
										  <option value="combo veg">combo Non Veg</option>
										</select>
								   </div>
 								<div class="form-group">
								    <label for="formGroupExampleInput">Long Descp</label>
								    <textarea class="form-control radius" rows="3" cols="80%" name="long_descp" value="{{ old('long_descp') }}" placeholder="Long Descp" ></textarea>
								   </div>
 								 <div class="form-group">
								    <label for="formGroupExampleInput">Price</label>
								    <input type="text" name="price" class="form-control radius"   value="{{ old('price') }}" placeholder="Price" required>
							    </div>
                <button type="submit" class="btn btn-success btn-lg">Add</button>
 							</div>
 						</div>
 					</div>
 				</section>
				  
			</form>
 		</div>
 	</div>
 </section>

@endsection

@section('scripts')

@endsection