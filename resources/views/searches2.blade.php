@extends('layouts.app-fast')
@section('content')

    <div id="product-search" class="container">
      <ul class="breadcrumb">
         <li><a ><i class="fa fa-home"></i></a></li>
         <li><a>Search</a></li>
      </ul>
      <div class="row">
         <div id="content" class="col-sm-12">
         	@foreach($searches2->take(1) as $searchproduct)
                <h1>Search - {{ $searchproduct->name }}</h1>
            @endforeach
            <label class="control-label" for="input-search">Search Criteria</label>
            <div class="row">
            	@foreach($searches2->take(1) as $searchproduct)
               <div class="col-sm-4">
                  <input type="text" name="search" value="{{$searchproduct->name }}" placeholder="Keywords" id="input-search" class="form-control" readonly/>
               </div>
               @endforeach
                 <form class="form" action="{{ url('search_product_category') }}" method="get">
               	  <div class="col-sm-3">
					    <input type="text" placeholder="Enter Product Name" name="name" >
					 </div>
					<div class="col-sm-3">
	               	<select name="category" class="form-control">
                     <option value="Select Category">Select Category</option>
						   <option value="Veg">Veg</option>
						   <option value="Non Veg">Non Veg</option>
						</select>
					</div>
					<div class="col-sm-1">
                        <input type="submit" value="Filter">
					</div>
				
               </form>
             </div>
            
            
            <br><br>
            <div class="row">
               @foreach($searches2 as $searchproduct)
               <div class="product-layout product-list">
                  <div class="product-thumb transition  options ">
                     
                     <div class="image">
                        <div class="-product-include_options5001"></div>
                        <div class="sale">
                           <span>Sale</span>
                        </div>
                        <a class="lazy" style="padding-bottom: 100%">
                        <img width="250" height="250"  class="img"  data-src="{{ asset('uploads/'.$searchproduct->product_img) }}"  type="image/svg+xml"/>
                        <img width="250" height="250"  class="img"  data-src="{{ asset('uploads/'.$searchproduct->product_img) }}"  type="image/svg+xml"/>
                        </a>
                        <button type="button" data-rel="details" class="btn quickview" data-toggle="tooltip" title="Quick View" data-product="54"><i class="fa fa-search-plus"></i></button>
                     </div><br>
                     <div class="prod-caption">
                        <div class="name">{{ $searchproduct->name	 }}</a></div>
                        <div class="description">Happy National Sandwich Day! Did you know all burgers are sandwiches but not all sandwiches are burgers? It’s like how all Chicken Bacon Classics are delicious but not everything delicious is a Chicken Bacon Classic...</div>
                        <div class="price">
                          Price {{ $searchproduct->price }}
                        </div>
                        <div class="cart-buttons">
                           <a type="button" class="product-btn-add"  href="{{ route('cart.add', $searchproduct->id) }}" >Add to Cart</a>
                           
                           
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
              
            </div>
            
         </div>
      </div>
   </div>
   

@endsection