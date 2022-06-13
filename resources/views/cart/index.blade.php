@extends('layouts.app-fast')

@section('content')
<hr><hr>
  <h2 class="text-center">Your Cart</h2>
 <div class="container">
     <div class="row">
         <div class="col-sm-12 col-md-12">
             @if (session('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
            @endif
         @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
         </div>
     </div>
 </div>

    <table class="table ">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Total Price</th>
                <th type="hidden"></th>
                
                <th>Quantity</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
            
                <tr>
                    <form action="{{ url('orders') }}" method="post" >
                        @csrf
                   <!-- <td scope="row">{{ $item->name }}</td> -->
                <td> 
                    <input type="text" name="name" value="{{ $item->name  }}">
                     <!-- {{ $item->price }} -->
                </td>
                <td>
                    <input type="text"  name="price" value="{{ $item->price }}" readonly>
                </td>
                <td>
                    <input type="text"  name="total_price" value="{{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}">

                </td>
                <td>
                    <input type="hidden" name="quantity" value="{{ $item->quantity  }}">
                </td>
                <!-- <td>
                    <a class="btn btn-primary" href="{{ url('orders') }}" role="button">Proceed To Orders</a>
                </td> -->
                <!-- <td>
                    <a class="btn btn-primary" href="{{ route('cart.checkout') }}" role="button">Proceed To Checkout</a>
                </td> -->

                
                
                </form>
            
                <td>
                    <form action="{{ route('cart.update', $item->id) }}">
                       <input type="number" name="quantity" value="{{ $item->quantity  }}">
                       <input type="submit" value="Update">
                    </form>

                </td>

                <td>
                    <a href="{{ route('cart.destroy', $item->id) }}">Delete</a>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

<h3 class="text-center">Sub Total :{{\Cart::session(auth()->id())->getTotal()}} Rupee</h3>

<!--Model Form -->



<!-- Large modal -->
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" id="getdata" data-product="Green Banana">Send Order</button> 

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <h1>Book Your Order</h1>
      <div class="container">
            <form action="{{ url('orders') }}" method="post">
                @csrf
                @foreach($cartItems->take(1) as $item)
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                       <label>Product Name</label>
                       <input type="text" name="name" value="{{ $item->name  }}" readonly>
                    </div>
                    <div class="col-sm-12 col-md-3">
                       <label>Price</label>
                       <input type="text" name="price" value="{{ $item->price  }}" readonly>
                    </div>

                    <div class="col-sm-12 col-md-3">
                        <label>Product Quantity</label>
                       <input type="number" name="quantity" value="{{ $item->quantity  }}" readonly>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                       <label>Name</label>
                       <input type="text" name="client_name"  >
                    </div>
                    <div class="col-sm-12 col-md-3">
                       <label>Contact No.</label>
                       <input type="number" name="contact_no"  >
                    </div>
                    <div class="col-sm-12 col-md-3">
                       <label>Email </label>
                       <input type="email" name="email"  >
                    </div>

                    
                </div>
                <div class="row">
                    
                       <div class="col-sm-12 col-md-4">
                          <label>Pincode</label>
                          <input type="text" name="pincode"><br>
                       </div> 
                       <div class="col-sm-12 col-md-5">
                          <label>Total Price</label>
                          <input type="text"  name="total_price" value="{{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}">
                       </div> 
                </div>
                <div class="row">
                   
                       <div class="col-sm-12 col-md-9">
                          <label>Proper Delivery Address </label>
                          <textarea rows="2" cols="10" name="delivery_address" class="form-control"> </textarea>
                       </div>
                   
                </div>
                
                @endforeach
                 <button class="btn btn-success" type="submit">Send Orders</button>
            </form>
        </div>
    </div>
  </div>
</div>
<!-- <a class="btn btn-primary" href="{{ route('cart.checkout') }}" role="button">Proceed To Checkout</a> -->
@endsection
