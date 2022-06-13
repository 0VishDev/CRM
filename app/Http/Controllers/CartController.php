<?php

namespace App\Http\Controllers;
use App\Product;
use Validator;
use App\Order;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class CartController extends Controller
{
     public function add(Product $product)
    {
      
      \Cart::session(auth()->id())->add(array(
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->price,
        'quantity' => 1,
        'attributes' => array(),
        'associatedModel' => $product
      ));

      return redirect()->route('cart.index');

    }

    public function index()
    {
        $cartItems = \Cart::session(auth()->id())->getContent();
        return view('cart.index', compact('cartItems'));
    }

    public function destroy($itemId)
    {
      \Cart::session(auth()->id())->remove($itemId);
      return back();
    }

    public function update($rowId)
    {
      \Cart::session(auth()->id())->update($rowId,
        [
          'quantity' => [
              'relative' => false,
              'value' => request('quantity')
          ]
        ]
      );
      return back();
    }

    public function checkout()
    {
      return view("cart.checkout");
    }

    public function order(Request $request)
    {
        $order = new  Order;
        $order->product_name = $request->input('name');
        $order->price = $request->input('price');
        $order->total_price = $request->input('total_price');
        $order->quantity = $request->input('quantity');

        $order->client_name = $request->input('client_name');
        $order->mobile = $request->input('contact_no');
        $order->email = $request->input('email');
        $order->pincode = $request->input('pincode');
        $order->delivery_address = $request->input('delivery_address');
        $order->save();

        $details = [

        'title' => $request->name,
        'body' =>  $request->price
        ];
        $emails = [$request->input('email')];
   
        \Mail::to($emails)->send(new \App\Mail\MyTestMail($details));
        return redirect('/cart')->with('success','Your Order is Send Successfully');
    }

    public function book_orders()
    {
      $order = Order::Orderby('id','DESC')->get();
      return view("admin.booked-orders",compact("order"));
    }

    public function orderupdate(Request $request)
    {
      $order = new  Order;
      $order->product_name = $request->input('name');
      dd("$order");
    }
}
