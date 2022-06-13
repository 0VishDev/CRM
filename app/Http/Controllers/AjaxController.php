<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Log;
use App\User;
  
class AjaxController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequest()
    {
        return view('ajaxRequest');
    }
     
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxRequestPost(Request $request)
    {
        $data = new User;
        $data->name=$request->name;
        $data->password=$request->password;
        $data->email=$request->email;
        $data->save();
        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }
}