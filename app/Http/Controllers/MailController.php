<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Helper;
use Mail;
use Validator;
use App\Record;
use App\Registration;
use Illuminate\Support\Facades\File;
use Redirect;
use App\User;
class MailController extends Controller
{
    public function sendmail(Request $request)
    {
        /*$obj = new Record;
        $obj->name= $request->input('name');
        $obj->email= $request->input('fname');

        $obj->save();*/
        $details = [

        'title' => $request->name,
        'body' =>  $request->fname
    ];
        $emails = [$request->input('email')];
   
        \Mail::to($emails)->send(new \App\Mail\MyTestMail($details));
       
        dd("Email is Sent.");
    }

    

    public function send_direct_mail(Request $request)
    {
        $data= Validator::make($request->all(),[
        "product_name"=>"required",
        "image"=>"required",
        "price"=>"required",
        "description"=>"required",
        
        ],[
         
         
         "description.required"=>"Please Enter Your Product Description",
        ])->validate();

        $obj = new  shortssenys();
       
    }

    public function register_user(Request $request)
    {
        $data= Validator::make($request->all(),[
        "name"=>"required",
        "email"=>"required",
        "mobile"=>"required",
        ],
        [
          "mobile.required"=>"Please Enter Your Valid Mobile No.",
        ])->validate();
        
        /* $emp_id = Helper::IDGenerator(new User, 'emp_id', 5, 'BWT');*/

       $user = new User;
       $user->name = $request->input('name');
       $user->email = $request->input('email');
       $user->mobile = $request->input('mobile');
       $user->rept_mang = $request->input('rept_mang');
       $user->dept = $request->input('dept');
       $user->doj = $request->input('doj');
       $user->desig = $request->input('desig');
       if($request->hasfile('image'))
       {
        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $filename = time().$name;
        $file->move('storage/app/public',$filename);
        $user->image = $filename;
       }
       else
       {
        
        return $request;
        $user->image='';
       }
       
       // aadhaar
       
       if($request->hasfile('aadhaar'))
       {
        
        $file = $request->file('aadhaar');
        $name = $file->getClientOriginalName();
        $filename = time().$name;
        $file->move('storage/app/public',$filename);
        $user->aadhaar = $filename;
       }
       else
       {
        
        return $request;
        $user->aadhaar='';
       }
       
       // pan
       if($request->hasfile('pan'))
       {
        
        $file = $request->file('pan');
        $name = $file->getClientOriginalName();
        $filename = time().$name;
        $file->move('storage/app/public',$filename);
        $user->pan = $filename;
       }
       else
       {
        
        return $request;
        $user->pan='';
       }
       
       // last qualification
       if($request->hasfile('last_qualification'))
       {
        
        $file = $request->file('last_qualification');
        $name = $file->getClientOriginalName();
        $filename = time().$name;
        $file->move('storage/app/public',$filename);
        $user->last_qualification = $filename;
       }
       else
       {
        
        return $request;
        $user->last_qualification='';
       }
       $user->password = Hash::make($request->input('password'));
       $user->save();
       return Redirect::back()->with('success', 'User Register Successfully');
    }


    public function user_info_update(Request $request,$id)
    {
        $data=User::find($id);
         if($request->hasfile('image'))
           {
            $destination='storage/app/public/'.$data->image;
            if(File::exists($destination))
            {
                
               File::delete($destination);
            }
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = time().$name;
            $file->move('storage/app/public',$filename);
            $data->image = $filename;
           }
           $data->name=$request->name;
           $data->save();
           
        return Redirect::back()->with('success', 'User Image Update Successfully');
       
    }

    public function home()
    {
        return view("index");
    }

    public function vendor()
    {
        return view("vendor.dashboard");
    }

    public function index(Request $request)
    {   
        $user = User::all();
        
        //$check = $user->chunk(3);
        $check = $user->except(['id',$request->id]);
        return view("testing",compact("check"));
        //dd($check);
        /*$collection = collect([1,2,3,4,5,6,7,8,9]);
        
        $data = $collection->chunk(3)->all();*/
        /*$data = $collection->map(function($item, $key)
        {
           return  $item + 2;
           
        });*/
        //dd($data);
    }
    
}
