<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use App\Product;    
class PageController extends Controller
{
    public function login_panel()
    {
        return view("auth.login-panel");
    }

    public function check()
    {
        $user = auth()->user()->email;
        print_r($user);
    }

    public function product()
    {
        return view("admin.add_new_product");
    }

    public function add_product(Request $request)
    {
      $data= Validator::make($request->all(),[
        "name"=>"required",
        "images1"=>"required",
        "price"=>"required",
       
        
        ],[
         
         "name.required"=>"Please Enter Product Name",
         
         "price.required"=>"Please Enter Your Product Price",
         
        ])->validate();

      $product = new  Product;
      $product->name = $request->input('name');
      /* Image First Main */
        if($request->hasfile('images1'))
       {
        $file = $request->file('images1');

        
        $name = $file->getClientOriginalName();
        $filename = time().$name;
        $file->move('uploads/',$filename);
        $product->product_img = $filename;
       }
       else
       {
        return $request;
        $product->product_img='';
       } 
       /*End Image First Main*/
       /* Image First Main */
        if($request->hasfile('images2'))
       {
        $file = $request->file('images2');

        
        $name = $file->getClientOriginalName();
        $filename = time().$name;
        $file->move('uploads/',$filename);
        $product->product_img2 = $filename;
       }
       else
       {
        return $request;
        $product->product_img2='';
       } 
       /*End Image First Main*/
       $product->short_descp = $request->input('short_descp');
       $product->long_descp = $request->input('long_descp');
       $product->category_name = $request->input('product_type');
       $product->price = $request->input('price');
       $product->save();
       return redirect('/add-new-product')->with('success','Product is added successfully');
    }

    public function show_product()
    {   
        $mutton = "Mutton";
        $nonveg = Product::where('category_name',"Non Veg")->take(4)->get();
        $mutton = Product::where('name', 'like', '%'.$mutton.'%')->get();
        $moreveg = Product::where('category_name',"Veg")->OrderBy('id', 'ASC')->get();
        $showproduct = Product::where('category_name',"Veg")->OrderBy('id', 'DESC')->take(4)->get();
        $data = DB::table('records')
                ->join('products','records.product_id','products.id')
                ->get();
        
        return view("index",compact("showproduct","moreveg","nonveg","mutton", "data"));
    }
    
    public function more_info(Request $request, $category_name)
    {
        $senddata = Product::findOrFail($category_name);
        $more = Product::where('category_name', $senddata)->get();
        /*$data = DB::table('products')
                ->join('records','records.name','products.category_name')
                ->get()->take(1);*/
                echo $more;
    }
    public function show_admin_product()
    {
        $allshowproduct = Product::OrderBy('id', 'asc')->get();
        return view("admin.show-product",compact("allshowproduct"));
    }

    public function search_product(Request $request)
    {   
        /*$product = $request->get('product_name'); 
         $type = $request->get('category');
         $category = Product::where('product_name',$product)->
         where('category_name', $type)->take(4)->get();*/
        
         $search = $request->get('search');
         $searches = DB::table('products')->where('name', 'like', '%'.$search.'%')->paginate(4);
        //dd("$category");
        return view('searches',compact("searches"));

    }

    public function search_product_category(Request $request)
    {   
       $product = $request->get('name');
        $type = $request->get('category');
        $searches2 = DB::table('products')->where('name', 'like', '%'.$product.'%')->where('category_name', $type)->orderBy('id', 'DESC')->paginate(4);
        //dd("$category");
        return view('searches2',compact("searches2"));

    }
   

    
}
