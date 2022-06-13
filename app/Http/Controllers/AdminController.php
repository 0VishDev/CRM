<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;
use Redirect;
use App\Company;
use App\Comment;
use Carbon\Carbon;
use Validator;
use Session;
use App\Package;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function showStatics()
    {
        $fetch = DB::table('reports')->get();
        
        $post = DB::table('reports')->get('*')->toArray();
        foreach($post as $row)
        {
            $data[] = array
            (
                'label'=>$row->cilient_name,
                'y'=>$row->total_payment

            );
        }
        return view("chart3", ["data" => $data], compact("fetch"));
    }
    
    public function all_users()
    {
        $user=User::where('is_admin',2)->paginate(6);
        return view("admin.all-users",compact("user"));
    }
    
    public function working_emp()
    {
        $emp = User::where('is_admin',2)->get();
        $empcountworking = User::where('is_admin',2)->count();
        return view("admin.staff.working",compact("emp","empcountworking"));
    }

    public function not_working_emp()
    {
        $emp = User::where('is_admin',0)->get();
        $empcountnotwork = User::where('is_admin',0)->count();
        return view("admin.staff.working",compact("emp","empcountnotwork"));
    }

    public function all_emp()
    {
        $emp = User::all();
        $empcountall = User::all()->count();
        return view("admin.staff.working",compact("emp","empcountall"));
    }

    public function all_staff()
    {
        return view("admin.staff.working");
    }

    public function admin_profile()
    {
        
        $user = Auth::user()->email;
        $user_check = User::where('email',$user)->get();
        
        return view("admin.profile",compact("user_check"));
    }

    public function all_company_details()
    {
        $allcompany = DB::table('companies')
                ->Join('users','users.id','companies.user_id')->orderBy('uuid','asc')->skip(5)->paginate(5);
                //dd("$allcompany");
                $totalcompany = Company::all()->count();
                
                $showcomment = DB::table('users')
                ->Join('comments','comments.user_id','users.id')->
               get();
        //dd("$showcomment");
               
               return view("admin.all-company",compact("allcompany","totalcompany","showcomment"));
                
    }

    public function admin_update_company(Request $request, $uuid)
    {
        //$check = Company::findOrFail($gst_no);
        $company = Company::where('uuid',$uuid)->first();
        //return $company;
        return view("admin.admin-edit-company",compact("company")); 
    }

    public function admin_updateCompany(Request $request, $gst_no)
    {
        Company::where('gst_no',$gst_no)->update([
        //$company = Company::find($id);
        'data_source'=>$request->input('data_source'),
        'company_name'=>$request->input('company_name'),
        'address'=>$request->input('address'),
        'gst_no'=>$request->input('gst_no'),
        'website_url'=>$request->input('website_url'),
        'established_year'=>$request->input('established_year'),
        
       
        'designation'=>$request->input('designation'),
        'email'=>$request->input('email'),
        'mobile_no'=>$request->input('mobile_no'),
        ]);
         return Redirect::back()->with('success', 'Company Information Update Successfully');

         
    }

    public function admin_dlt_company($uuid)
    {

      $company=Company::where('uuid',$uuid);
        //return $company; 
      $company->delete();
      return Redirect::back()->with('success', 'Company Deleted Successfully');
    }
    
    public function admin_filter_data_result(Request $request)
     {
        $user = Auth::user()->id;
        $sdate = $request->input("sdate");
        $edate = $request->input("edate");
        $status = $request->input("status");
        $user_id = $request->input("user_id");
        

        if(strlen($sdate)>0 and strlen($edate)>0 and strlen($status)>0 and strlen($user_id)>0)
        {
            $query = DB::table('companies')->select()
            ->where('created_at','>=',$sdate)
            ->where('created_at','<=',$edate)
            ->where('status',$status)
            ->where('user_id',$user_id)
            ->paginate(6);
        }

        else if (strlen($status)>0 )
        {
           $query = DB::table('companies')->select()
            ->where('status',$status)
            ->paginate(6);
        }
        else if(strlen($sdate)>0 ) 
        {
            if(strlen($sdate)>0 and strlen($edate)>0 and strlen($status)>0)
            {
                $query = DB::table('companies')->select()
                ->where('created_at','>=',$sdate)
                ->where('created_at','<=',$edate)
                ->where('status',$status)
                ->paginate(6);
            }
            
            else if(strlen($sdate)>0 and strlen($edate)>0 and strlen($user_id)>0)
            {
               $query = DB::table('companies')->select()
                ->where('created_at','>=',$sdate)
                ->where('created_at','<=',$edate)
                ->where('user_id',$user_id)
                ->paginate(6);
            }

            else
            {
               if(strlen($sdate)>0 and strlen($edate)>0)
                {
                    $query = DB::table('companies')->select()
                    ->where('created_at','>=',$sdate)
                    ->where('created_at','<=',$edate)
                    ->paginate(6); 
                    return view("admin.filter-data-result",compact("query"));
                }

                else if(strlen($sdate)>0)
                {
                    $query = DB::table('companies')->select()
                    ->where('created_at',$sdate)
                    ->paginate(6); 
                    return view("admin.filter-data-result",compact("query"));
                }
            }

        }

        else
            {
                 return redirect()->back()->with('alert_msg', 'Data Not Found');                
            }

        //dd("$query");
        /*$totalcompany = DB::table('companies')->select()
        ->where('created_at','>=',$sdate)
        ->where('created_at','<=',$edate)
        ->where('status',$status)
        ->where('user_id',"$user")
        ->count();
        */
        return view("admin.filter-data-result",compact("query"));
     }

     public function shift_data()
    {
        $users=User::get();
        
        foreach($users as $key => $value)
        {
            Company::create
            ([
                'data_sources'=>$value->name,
                'user_id'=>$value->id,

            ]);
            return 'Shift Data';
        }
        
    }
    public function shift_data2(Request $request)
    {
         
        $check = Company::where('uuid',$request->select)->first();
                //return $check;
         $shift = Company::all()->unique('emp_name');
         //$request->session()->put('name', $request->input('select'));
        
         return view("admin.transfer-data",compact("shift","check"))->with('name',$request->session()->get('name'));
      
    }

    public function shift_transfer_data(Request $request)
    {   
        
        
        $company2 = Company::where('user_id',$request->category)->first();
        $name=$company2->emp_name;
        //return $name;
        //$company = Company::where('uuid',$request->select)->first();
        
        //dd("$company");
        $id=$request->select;
        //return $id;
        Company::where('uuid', $id)
       ->update([
           'user_id' => $request->category,
           'emp_name'=> $name,
        ]);
        /*$company= Company::where('uuid',$id)->first();
        $company->user_id=$request->category;
        $company->emp_name=$name;
        $company->save();*/
        //dd("$company");
        return redirect('/admin/all_company_details')->with('success','Leads Transfer To Another Employee Successfully');
      //return $request->category;
      //$user = Company::where('user_id', $select_id);*/

    }

    public function search_admin_company(Request $request)
    {
        //return $request->mobile;
        // $data= Validator::make($request->all(),[
        //   "mobile"=>"required",
        // ],
        // [
        //   "mobile.numeric"=>"Please Enter Only Profile Id & Mobile No.",
        // ])->validate();


        if($request->profile_id or $request->mobile or $request->email)
        {

            if($request->profile_id AND $request->mobile AND $request->email)
            {
                $data = Company::where('uuid',$request->profile_id)->where('mobile_no',$request->mobile)->where('email',$request->email)->paginate(6);
                return view("admin.status.status",compact("data"));
            }

            else if($request->profile_id AND $request->mobile)
            {
                $data = Company::where('uuid',$request->profile_id)->where('mobile_no',$request->mobile)->paginate(6);
                return view("admin.status.status",compact("data"));
            }

            else if($request->mobile AND $request->email)
            {
                $data = Company::where('mobile_no',$request->mobile)->where('email',$request->email)->paginate(6);
                return view("admin.status.status",compact("data"));
            }

            else if($request->profile_id AND $request->email)
            {
                
                $data = Company::where('id',$request->profile_id)>where('email',$request->email)->paginate(6);
                return view("admin.status.status",compact("data"));
            }

            else if($request->profile_id)
            {
                $data = Company::where('uuid',$request->profile_id)->paginate(6);
                return view("admin.status.status",compact("data"));
            }

            else if($request->mobile)
            {
                $data = Company::where('mobile_no',$request->mobile)->paginate(6);
                return view("admin.status.status",compact("data"));
            }

            else if($request->email)
            {
               $data = Company::where('email',$request->email)->paginate(6);
               return view("admin.status.status",compact("data"));
            }
        }

        else if($request->company_name)
        {
            $data=Company::where('company_name','like', '%'.$request->company_name.'%' )->get();
            $datacount=Company::where('company_name','like', '%'.$request->company_name.'%' )->count();
            return view("admin.search-company",compact("data","datacount"));
        }
        
        
        else
        {
            //dd("no");
           echo '<script>alert("Please Fill Data")</script>';
           return view("admin.search-company");
        }
   
     
      exit();
      $searchCom= DB::table('companies')->where('uuid',$request->search_company)->orwhere('email',$request->search_company)->orwhere('mobile_no',$request->search_company)->orwhere('company_name',$request->search_company)->first();

      if($searchCom)
      {
      
        $search = $request->search_company;
        $searchCom= DB::table('companies')->where('uuid',$search)->orwhere('mobile_no',$search)->orwhere('company_name',$request->search_company)->get();
        
        return view("admin.partisearch",compact("searchCom"));
       }
      else
      {
        return Redirect::back()->with('alert_msg', 'Data Not Match');
       }

    }

    public function search_company()
    {
        return view("admin.search-company");
    }

    public function admin_all_info($uuid)
    {
         $showcomment = DB::table('companies')->where('uuid',$uuid)->get();
         return view("admin.admin-all-info",compact("showcomment"));
    }

    public function today_company()
    {
        $data = Company::whereDate('created_at',  Carbon::today()->toDateString())->paginate(10);
        $Company = Company::whereDate('created_at',  Carbon::today()->toDateString())->count();
        return view("admin.today-company",compact("data","Company"));
    }

    public function my_company()
    {
        $emp = User::all();
       
        return view("admin.my-emp-name",compact("emp"));
    }

    public function emp_single_com(Request $request, $id)
    {
        $alldata = Company::all();
       $Com = Company::where("user_id",$id)->first();
       $sinCom = $Com->emp_name;
     
        $check = $Com->user_id;
        Session::put('name',$check);
        $data = session::get('name');
        
        $empname = User::all()->unique("name");
        //$empname = $empallname[0]->emp_name;
        
        $alldue = Company::whereDate('next_call_timing','<', Carbon::today()->toDateString())->where('user_id',"$id")->count();
        
        $mydue1 = Company::whereDate('next_call_timing','<', Carbon::today()->toDateString())->where('user_id',"$id")->where('status',"NI")->count();
        $mydue2 = Company::whereDate('next_call_timing','<', Carbon::today()->toDateString())->where('status',"Cnvrt")->where('user_id',"$id")->count();
        $mydue3 = Company::whereDate('next_call_timing','<', Carbon::today()->toDateString())->where('status',"N.T.C")->where('user_id',"$id")->count();
        $mydue4 = Company::whereDate('next_call_timing','<', Carbon::today()->toDateString())->where('status',"Com. Clsd")->where('user_id',"$id")->count();
        $mydue5 = Company::whereDate('next_call_timing','<', Carbon::today()->toDateString())->where('status',"W No")->where('user_id',"$id")->count();
        $mydue6 = Company::whereDate('next_call_timing','<', Carbon::today()->toDateString())->where('status',"Ser. Prv")->where('user_id',"$id")->count();
        $mydue7 = Company::whereDate('next_call_timing','<', Carbon::today()->toDateString())->where('status',"Drop")->where('user_id',"$id")->count();
        $duesum =  $mydue1+$mydue2+$mydue3+$mydue4+$mydue5+$mydue6+$mydue7;
        $due = $alldue-$duesum;
        //dd("$due");
        
        $no = DB::table('companies')->where('status',"F.N.C")->where('user_id',"$id")->count();
         
        $cb = DB::table('companies')->where('status',"C.B")->where('user_id',"$id")->count();
        
        $cbflps = DB::table('companies')->where('status',"C.B Flps")->where('user_id',"$id")->count();
        
        $td = DB::table('companies')->where('status',"F Dmu")->where('user_id',$id)->count();
        
        //return $td;
        $pg = DB::table('companies')->where('status',"PG")->where('user_id',"$id")->count();
        $pgflps = DB::table('companies')->where('status',"P.G Flps")->where('user_id',"$id")->count();
        $sv = DB::table('companies')->where('status',"Ser. Prv")->where('user_id',"$id")->count();
        $lang = Company::where('status',"Lang.B")->where('user_id',"$id")->count();
        $ni = DB::table('companies')->where('status',"NI")->where('user_id',"$id")->count();
        
        $pg_ni = DB::table('companies')->where('status',"Pg Ni")->where('user_id',"$id")->count();

        //return $pg_ni;
        $dmu_ni = DB::table('companies')->where('status',"Dmu Ni")->where('user_id',"$id")->count();
        
        $mht = DB::table('companies')->where('status',"Sr.B")->where('user_id',"$id")->count();
        $amt = DB::table('companies')->where('status',"Sr.A")->where('user_id',"$id")->count();
        
        $con = DB::table('companies')->where('status',"Cnvrt")->where('user_id',"$id")->count();
        //return $con;
        $wr = DB::table('companies')->where('status',"W No")->where('user_id',"$id")->count();
        $nt = DB::table('companies')->where('status',"N.T.C")->where('user_id',"$id")->count();
        $ccl = DB::table('companies')->where('status',"Com. Clsd")->where('user_id',"$id")->count();
        
        $dflps = Company::where('status',"Dmu Flps")->where('user_id',"$id")->count();
        
        $p1 = Company::where('status',"P1")->where('user_id',"$id")->count();
        $pic = Company::where('status',"Pick")->where('user_id',"$id")->count();
        $drop = Company::where('status',"Drop")->where('user_id',"$id")->count(); 
        
        $tch = Company::where('status',"Touch.c")->where('user_id',"$id")->count();
        $hot_fca = Company::where('status',"Hot.F.C.A")->where('user_id',"$id")->count();
        $vbylead = Company::where('status',"V.Buy.Lead")->where('user_id',"$id")->count();
        
        $crtbh = Company::where('status',"C.By.H")->where('user_id',"$id")->count();
        $nibhd = Company::where('status',"N.I By Head")->where('user_id',"$id")->count();
        
        
        $total = $no+$cb+$td+$pg+$sv+$ni+$con+$wr+$nt+$ccl+$dflps+$dmu_ni+$lang+$pic+$drop+$crtbh+$p1+$tch+$hot_fca+$vbylead+$cbflps+$pgflps+$amt+$mht;
        
      return view("admin.status.sing-emp-status",compact("no","cb","td","pg","sv","ni","con","wr",
            "nt","ccl","total","due","dflps","pic","drop","crtbh","nibhd","tch","hot_fca","vbylead","sinCom","empname","cbflps","pgflps","lang","p1","pg_ni","dmu_ni","amt","mht","alldata"));
      
    }
    
    
     public function not_open(Request $request)
     {
       
        $nc = "F.N.C";
        $user = session::get('name');
        $data = Company::where('status',$nc)->where('user_id',$user)->paginate(6);
        return view("admin.status.status",compact("data"));
        
    }

     public function dmu()
     {
        $user = session::get('name');
        $dm = "DMU";
        $data = Company::where('status',$dm)->where('user_id',"$user")->paginate(6);
        return view("admin.status.dmu",compact("data"));
     }

     public function call_back()
     {
        $user = session::get('name');
        
        $cb1 = "C.B";
        $data = Company::where('status',$cb1)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
     }

     public function tele_dmu()
     {
        $user = session::get('name');
        //return $user;
        
        $td1 = "F Dmu";
        $data = Company::where('user_id',$user)->
                where('status',$td1)->
                paginate(6);
        return view("admin.status.status",compact("data"));
     }

      public function pg()
     {
        $user = session::get('name');
        $td = "PG";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
     }
      public function sv()
     {
        $user = session::get('name');
        $td = "Ser. Prv";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
     }
     
     public function admin_lang()
     {
         
         $user = session::get('name');
        $td = "Lang.B";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
     }
     
      public function ni()
     {
        $user = session::get('name');
        $td = "NI";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
     }
     
      public function admin_pg_ni()
     {
        $user = session::get('name');
        $td = "Pg Ni";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
     }
     
      public function admin_dmu_ni()
     {
        $user = session::get('name');
        $td = "Dmu Ni";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
     }
     
      public function con()
     {
        $user = session::get('name');
        //return $user;
        
        $td1 = "Cnvrt";
        $data = Company::where('status',$td1)->where('user_id',$user)->paginate(6);
        //return $data;
        return view("admin.status.status",compact("data"));
    }

    public function ccl()
     {
        $user = session::get('name');
        $td = "Com. Clsd";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
    }

    public function nt()
     {
        $user = session::get('name');
        
        $td = "N.T.C";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
    }

    public function wr()
     {
        $user = session::get('name');
        $td = "W No";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
    }
    
    public function admn_vbylead()
     {
        $user = session::get('name');
        $td = "V.Buy.Lead";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
    }
    
    public function admn_pic()
     {
        $user = session::get('name');
        $td = "Pick";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
    }
    
    public function admn_p1()
     {
        $user = session::get('name');
        $p1 = "P1";
        $data = Company::where('status',$p1)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
    }
    
    public function admn_drop()
     {
        $user = session::get('name');
        $td = "Drop";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
    }
    public function admn_crtbh()
     {
        $user = session::get('name');
        $td = "C.By.H";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
    }
    
    public function admin_mht()
    {
        $user = session::get('name');
        $td = "Sr.B";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
    }
    
    public function admin_amt()
    {
        $user = session::get('name');
        $td = "Sr.A";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
    }
    
    public function admn_nibhd()
     {
        $user = session::get('name');
        $td = "N.I By Head";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
    }
    
    public function admn_cb_flps()
     {
        $user = session::get('name');
        $cbflps = "C.B Flps";
        $data = Company::where('status',$cbflps)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
    }
    
    public function admn_pg_flps()
     {
        $user = session::get('name');
        $pgflps = "P.G Flps";
        $data = Company::where('status',$pgflps)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
    }
    
     public function admn_due()
     {
        $user = session::get('name');
        $data = Company::whereDate('next_call_timing','<',Carbon::today()->toDateTimeString())->where('user_id',"$user")->paginate(6);
        
        //$fdata = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("admin.status.status",compact("data"));
    }
    
    
     public function admn_dflps()
     {
        $user = session::get('name');
        
        $dflps1 = "Dmu Flps";
        $data = Company::where('status',$dflps1)->where('user_id',"$user")->paginate(6);
          return view("admin.status.status",compact("data"));
     }
     
      public function admn_tch()
     {
        $user = session::get('name');
        $td = "Touch.c";
        
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
          return view("admin.status.status",compact("data"));
     }
      
     public function admin_hot_fca()
     {
        $user = session::get('name');
        $td = "Hot.F.C.A";
        
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
          return view("admin.status.status",compact("data"));
     }

    
    public function admin_refill($uuid)
     {
        $refill = Company::where('uuid',$uuid)->first();
        
        //for nature of business
        $check1 =$refill->category;
        $check= array($check1);
        
        //for sale
        $forsale =$refill->sale;
        $forsale= array($forsale);
        
        //for payment term
        $forpayment =$refill->paymentterm;
        $forpaymentterm= array($forpayment);
        
        //for buy
        $buy =$refill->buy;
        $buy= array($buy);
        
        
        return view("admin.admn-refill",compact("refill","check","forsale","forpaymentterm","buy"));
     }

     public function admin_refill_data(Request $request, $uuid)
     {
         $emp_nameadd=$request->reg_by;
         $contdt = $request->contdt;
         $oldconersion = $request->oldconversion;
         $newconersion = $request->conversation_details;

         $singleconversion = array($oldconersion,$newconersion,$emp_nameadd,$contdt);
         $latestconversion=implode("/:",$singleconversion);
         
        Company::where('uuid',$uuid)->update([

            'com_reg_date'=>$request->input('com_reg_date'),
            'reg_by'=>$request->input('reg_by'),
            'company_name'=>$request->input('company_name'),
            'brand_name'=>$request->input('brand_name'),
            'established_year'=>$request->input('established_year'),
            'category'=>$request->input('category'),
            'sale'=>$request->input('sale'),
            'buy'=>$request->input('buy'),
            'cus_name'=>$request->input('cus_name'),
            'designation'=>$request->input('designation'),
            'mobile_no'=>$request->input('mobile_no'),
            'whats_no'=>$request->input('whats_no'),
            'alternate_no'=>$request->input('alternate_no'),
            'email'=>$request->input('email'),
            'address'=>$request->input('address'),

            'buy_sell'=>$request->input('buy_sell'),
            'major_product'=>$request->input('major_product'),
            'min_to_max'=>$request->input('min_to_max'),
            'req_frequ'=>$request->input('req_frequ'),
            'quality_size_speci'=>$request->input('quality_size_speci'),
            'purpose_of_req'=>$request->input('purpose_of_req'),
            'packaging_size'=>$request->input('packaging_size'),
            'delivery_place'=>$request->input('delivery_place'),
            'tar_of_busi_area'=>$request->input('tar_of_busi_area'),

            'paymentterm'=>$request->input('paymentterm'),
            'req_urgen'=>$request->input('req_urgen'),
            'website_url'=>$request->input('website_link'),
            'other_investment'=>$request->input('other_investment'),
            'response'=>$request->input('response'),
            'gst_no'=>$request->input('gst_no'),
            'pan_no'=>$request->input('pan_no'),
            'tan_no'=>$request->input('tan_no'),
            'cin_no'=>$request->input('cin_no'),
            'bank_name'=>$request->input('bank_name'),
            'account_type'=>$request->input('account_type'),

            'adhar_no'=>$request->input('adhar_no'),
            'fssai'=>$request->input('fssai'),
            'lab_testing_report'=>$request->input('lab_testing_report'),
            'export_licence'=>$request->input('export_licence'),
            'data_source'=>$request->input('data_source'),
            'status'=>$request->input('status'),
            'conversation_details'=>$latestconversion,
            'online_demo'=>$request->input('online_demo'),
            'executive_feedback'=>$request->input('executive_feedback'),
            'propsal_name'=>$request->input('propsal_name'),
            'product_img'=>$request->input('product_img'),
            'fp_user_id'=>$request->input('fp_user_id'),

            'fp_psw'=>$request->input('fp_psw'),
            'bwt_catalog_link'=>$request->input('bwt_catalog_link'),
            'whats_up'=>$request->input('whats_up'),
            'executive_name'=>$request->input('executive_name'),
            'tl_manager_name'=>$request->input('tl_manager_name'),
          ]);
        return Redirect::back()->with('success', 'Company Register Data Update Successfully');
     }
      
      public function admin_comment($uuid)
      {
        
        $comment = DB::table('comments')
                ->Join('companies','companies.uuid','comments.com_id')->orderBy('uuid','asc')->where('comments.com_id',$uuid)->get();
                
        $checkComment = Company::where('uuid',$uuid)->first();
        if($checkComment->status=="Cnvrt" || $checkComment->status=="C.By.H")
        { 
             $package = Package::all();
            //dd("$package");
           return view("admin.status/update-com-status",compact("checkComment","package","comment"));
        }
        
        else if($checkComment->status!="Cnvrt")
        {
            //dd("no");
            $package = Package::where('package_name',"develop_package_new");
             
           return view("admin.status/update-com-status",compact("checkComment","package","comment"));
        }
      }
      
      public function admin_regis_company()
    {
        $data['countries'] = User::get(["name", "id"]);
        return view("admin.add-company", $data);
    }
    
    public function admin_sin_user(Request $request,$id)
    {
        $user = User::where('id',$id)->get();
        //return $user;
        return view("admin.sin-users-psw", compact("user"));
    }
    
    public function admin_update_psw(Request $request,$id)
    {
        
        User::where('id',$id)->update([
        'password'=>Hash::make($request->input('newpassword')),
        ]);
        return Redirect::back()->with('success', 'Password Updated Successfully');
    }
    
    public function add_packages()
    {
        return view("admin.packages");
    }

    public function admin_packages_submit(Request $request)
    {   

        $data = new Package;
        $data->package_name=$request->input('package_name');
        $data->package_price=$request->input('package_price');

        if($request->hasfile('package_image'))
           {
            $file = $request->file('package_image');
            $name = $file->getClientOriginalName();
            $filename = time().$name;
            $file->move('uploads/',$filename);
            $data->package_image = $filename;
           }
           else
           {
            return $request;
            $data->package_image='';
           }

        $data->save();
        return redirect('/admin-add-packages')->with('success','Your Packages Added Successfully');
    }

    public function admin_show_packages(Request $request)
    {
        $package = Package::all();
        return view("admin.show-package",compact("package")); 
    }
    
    public function update_status(Request $request,$status,$id)
    {
        $data=User::find($id);
        $data->is_admin=$status;
        $data->save();
        $request->session()->flash('message','User Status Updated Successfully');
        return redirect('admin/users');
    }
      
    public function logout(Request $request) 
        {
          Auth::logout();
          $request->session()->flash('success',"Sorry You Are Not Valid User");
          return redirect('login');
        }
        
    public function insert_status_admin(Request $request)
    {
        
        $validator = Validator::make($request->all(),[
              'comment'=>'required',
              
              
          ]);
        if(!$validator->passes())
         {
              return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
          }
          else
          {
          
            $comment = new Comment;
            $comment->comments=$request->comment;
            $comment->comments_by=$request->comments_by;
            $comment->com_id=$request->hidid;
            $comment->save();
            return response()->json(['success'=>'Comment Send Successfully By Admin']);
          }
    }
    
    public function admin_dlt_comment($id)
    {

      $comment=Comment::where('id',$id);
      $comment->delete();
      return Redirect::back()->with('success', 'Comment Deleted Successfully');
    }
    
    public function admin_show_emp_documents()
    {
        $user= User::all();
        return view("admin.documents",compact('user'));
    }
      
}
