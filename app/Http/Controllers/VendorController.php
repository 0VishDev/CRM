<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Comment;
use App\Company;
use Redirect;
use DB;
use App\Package;
use Validator;
use Carbon\Carbon;

use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function company()
    {
        $data['countries'] = User::get(["name", "id"]);
        return view("vendor.company", $data);
    }
    public function add_company()
    {
        $data= Validator::make($request->all(),[
        "name"=>"required",
        "email"=>"required|unique:companies",
        "mobile"=>"required|unique:companies",
        "qualification"=>"required",
        
        ],
        [
          "mobile.required"=>"Please Enter Your Valid Mobile No.",
        ])->validate();
        
         $details = [

        'title' => $request->email,
        'body' =>  $request->password
         ];

        $emails = [$request->input('email')];
        \Mail::to($emails)->send(new \App\Mail\MyTestMail($details));

       
       $emp_id = Helper::IDGenerator(new User, 'emp_id', 5, 'BWT');

       $user = new User;
       $user->emp_id = $emp_id;
       $user->name = $request->input('name');
       $user->email = $request->input('email');
       $user->mobile = $request->input('mobile');
       $user->qualification = $request->input('qualification');
       $user->password = Hash::make($request->input('password'));
       $user->save();
       return Redirect::back()->with('success', 'User Register Successfully');
    }

    public function sfa()
    {
        return view("vendor.sfa");
    }

     public function search_company()
    {
        
        return view("vendor.search_company");
    }

    public function profile()
    {

        $user = Auth::user()->email;
        $user_check = User::where('email',$user)->get();
        
        return view("vendor.profile",compact("user_check"));
    }

    

    public function add_company_data(Request $request)
    {
        
        $data= Validator::make($request->all(),[
        
        "mobile_no"=>"required|unique:companies",
        ],
        [
          "mobile_no.unique"=>"This Company Already Register!",
        ])->validate();
        
        $company_data = new Company;
        $company_data->user_id=Auth::user()->id;
        $company_data->emp_name=Auth::user()->name;
        $company_data->status_update_date=$request->datedata;
        
        $company_data->com_reg_date=$request->com_reg_date;
        $company_data->reg_by=$request->reg_by;
        $company_data->brand_name=$request->brand_name;
        $company_data->category=$request->category;
        $company_data->firm_type=$request->firm_type;
        $company_data->sale=$request->sale;

        $company_data->buy=$request->buy;
        $company_data->cus_name=$request->cus_name;
        $company_data->alternate_no=$request->alternate_no;
        $company_data->whats_no=$request->whats_no;

        $company_data->company_name=$request->company_name;
        $company_data->address=$request->address;

        $company_data->gst_no=$request->gst_no;
        $company_data->website_url=$request->website_link;
        $company_data->established_year=$request->established_year;
        $company_data->designation=$request->designation;
        $company_data->email=$request->email;
        $company_data->mobile_no=$request->mobile_no;

        $company_data->buy_sell=$request->buy_sell;
        $company_data->major_product=$request->major_product;
        $company_data->min_to_max=$request->min_to_max;
        $company_data->req_frequ=$request->req_frequ;

        $company_data->quality_size_speci=$request->quality_size_speci;
        $company_data->purpose_of_req=$request->purpose_of_req;
        $company_data->packaging_size=$request->packaging_size;
        $company_data->delivery_place=$request->delivery_place;

        $company_data->tar_of_busi_area=$request->tar_of_busi_area;
        $company_data->paymentterm=$request->paymentterm;
        $company_data->req_urgen=$request->req_urgen;
        $company_data->other_investment=$request->other_investment;

        $company_data->response=$request->response;
        $company_data->pan_no=$request->pan_no;
        $company_data->tan_no=$request->tan_no;
        $company_data->cin_no=$request->cin_no;

        $company_data->bank_name=$request->bank_name;
        $company_data->account_type=$request->account_type;
        $company_data->adhar_no=$request->adhar_no;
        $company_data->fssai=$request->fssai;

        $company_data->lab_testing_report=$request->lab_testing_report;
        $company_data->export_licence=$request->export_licence;
        $company_data->data_source=$request->data_source;
        $company_data->status=$request->status;
        
        if(
            $request->status=="NI" OR $request->status=="Com. Clsd" OR $request->status=="Com. Clsd"
            OR $request->status=="Cnvrt" OR $request->status=="W No" OR $request->status=="N.T.C"
            OR $request->status=="Ser. Prv" OR $request->status=="C.By.H" OR $request->status=="Drop" OR $request->status=="V.Buy.Lead" OR $request->status=="Lang.B" 
            OR $request->status=="Pick" OR $request->status=="Hot.F.C.A" OR $request->status=="Touch.c"
            )
        {
            $company_data->status_id=1;
        }

        else
        {
            $company_data->status_id=0;
        }

        $company_data->conversation_details=$request->conversation_details;
        $company_data->online_demo=$request->online_demo;
        $company_data->executive_feedback=$request->executive_feedback;
        $company_data->propsal_name=$request->propsal_name;

        $company_data->product_img=$request->product_img;
        $company_data->fp_user_id=$request->fp_user_id;
        $company_data->fp_psw=$request->fp_psw;
        $company_data->bwt_catalog_link=$request->bwt_catalog_link;
        $company_data->whats_up=$request->whats_up;
        $company_data->executive_name=$request->executive_name;
        
        $company_data->tl_manager_name=$request->tl_manager_name;

        $company_data->user_fp_link=$request->user_fp_link;
        $company_data->visitors_coun=$request->visitors_coun;
        $company_data->inquery_send=$request->inquery_send;
        $company_data->verify_buy_lead=$request->verify_buy_lead;
        $company_data->ratiing=$request->ratiing;
        $company_data->convert_rs=$request->convert_rs;
        $company_data->save();
        return Redirect::back()->with('success', 'New Company Created Successfully');
    }
    
    public function my_data()
    {
        $foreign=Auth::user()->id;
        $allcompany = Company::where('user_id',$foreign)->get();
        $totalcompany = Company::where('user_id',$foreign)->count();

        

        return view("vendor.all-company",compact("allcompany","totalcompany"));
    }

    public function update_company(Request $request, $uuid)
    {
       
        $company = Company::where('uuid',$uuid)->first();
        
        return view("vendor.edit-company",compact("company")); 
    }

    public function updateCompany(Request $request, $uuid)
    {
        Company::where('uuid',$uuid)->update([
        'data_source'=>$request->input('data_source'),
        'company_name'=>$request->input('company_name'),
        'address'=>$request->input('address'),
        'gst_no'=>$request->input('gst_no'),
        'website_url'=>$request->input('website_url'),
        'established_year'=>$request->input('established_year'),
        
        'cus_name'=>$request->input('cus_name'),
        'designation'=>$request->input('designation'),
        'email'=>$request->input('email'),
        'mobile_no'=>$request->input('mobile_no'),
        ]);
        return Redirect::back()->with('success', 'Company Information Update Successfully');
    }

    public function dlt_company($uuid)
    {
      $company=Company::findOrFail($uuid);
      $company->delete();
      return Redirect::back()->with('success', 'Company Information Delete Successfully');
    }

    public function shift_data($id)
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

    public function comment($uuid)
    {
        $comment = DB::table('comments')
                ->Join('companies','companies.uuid','comments.com_id')->orderBy('uuid','asc')->where('comments.com_id',$uuid)->get();
                
        $checkComment = Company::where('uuid',$uuid)->first();
        //return $checkComment[0]->satus;
        
        if($checkComment->status=="Cnvrt" || $checkComment->status=="C.By.H")
        { 
            //dd("yes");
           $package = Package::all();
           return view("vendor.add-comment",compact("checkComment","package","comment"));
        }
        else if($checkComment->status!="Cnvrt")
        {
            //dd("no");
            $package = Package::where('package_name',"develop_package_new");

           return view("vendor.add-comment",compact("checkComment","package","comment"));
        }
    }

    
   public function add_comment(Request $request,$uuid)
    {   
        //return $request->all();
        $cmntdt=$request->cmntdt;
        $old = $request->oldcomment;
        $new = $request->comment;
        
        /*$status=$request->status;
        return $status;*/
        $combine=array($old,$new,$cmntdt);
        $latestcomment=implode("/:",$combine);
        $countcmnt = strlen($new);
        

        if($countcmnt>0 && ($request->status=="NI" OR $request->status=="Com. Clsd" OR $request->status=="Com. Clsd"
        OR $request->status=="Cnvrt" OR $request->status=="W No" OR $request->status=="N.T.C"
        OR $request->status=="Ser. Prv" OR $request->status=="C.By.H" OR $request->status=="Drop" OR $request->status=="V.Buy.Lead" OR $request->status=="Lang.B" 
        OR $request->status=="Pick" OR $request->status=="P1" OR $request->status=="Hot.F.C.A" OR $request->status=="Touch.c"
        ))
          {
            //dd("yes");
            Company::where('uuid',$uuid)->update([
            'package_name'=>$request->input('package_name'),
            'comment'=>$latestcomment,
            'status_update_date'=>$request->input('date'),
            'status'=>$request->input('status'),
            'status_id'=>1,
            'next_call_timing'=>$request->input('next_followup'),



            ]);
            return Redirect::back()->with('success', 'Your Client Feedback Send Successfully');
            //dd("yes");
          }
          else if($countcmnt<0 OR $request->status=="NI" OR $request->status=="Com. Clsd" OR $request->status=="Com. Clsd"
          OR $request->status=="Cnvrt" OR $request->status=="W No" OR $request->status=="N.T.C"
          OR $request->status=="Ser. Prv" OR $request->status=="C.By.H" OR $request->status=="Drop" OR $request->status=="V.Buy.Lead" OR $request->status=="Lang.B"
          OR $request->status=="Pick" OR $request->status=="P1" OR $request->status=="Hot.F.C.A" OR $request->status=="Touch.c"
          )
          {
            //dd("no");
            Company::where('uuid',$uuid)->update([

            'status'=>$request->input('status'),
            'status_id'=>1,
            'package_name'=>$request->input('package_name'),
            'status_update_date'=>$request->input('date'),
            'next_call_timing'=>$request->input('next_followup'),

            ]);
            return Redirect::back()->with('success', 'Your Client Feedback Send Successfully with out comment');
            }

            else
            {
                //dd("ELSE");
                Company::where('uuid',$uuid)->update([

                'status'=>$request->input('status'),
                'status_id'=>0,
                'package_name'=>$request->input('package_name'),
                'status_update_date'=>$request->input('date'),
                'next_call_timing'=>$request->input('next_followup'),

                ]);
                return Redirect::back()->with('success', 'Your Client Feedback Send Successfully with out comment');

            }            
    }
    
    public function all_info(Request $request,$uuid)//for fetch single company full data
    {
        $allcompany = DB::table('companies')->where('uuid',$uuid)->get();
        
        //$var = $allcompany->user_id;
        //$empid = User::where('id',$var)->get();
        //$empidfetch = $empid->emp_id;
        //return $empidfetch;
         //return $empid;

        //return $user;
        /*$allcompany = DB::table('companies')
                ->Join('comments','comments.company_id','companies.uuid')->
                where('companies.uuid',$uuid)->
                get();*/

        return view("vendor.all-info",compact("allcompany"));
        
    }


    public function search_vendor_company(Request $request)
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
                return view("vendor.status.status",compact("data"));
            }

            else if($request->profile_id AND $request->mobile)
            {
                $data = Company::where('uuid',$request->profile_id)->where('mobile_no',$request->mobile)->paginate(6);
                return view("vendor.status.status",compact("data"));
            }

            else if($request->mobile AND $request->email)
            {
                $data = Company::where('mobile_no',$request->mobile)->where('email',$request->email)->paginate(6);
                return view("vendor.status.status",compact("data"));
            }

            else if($request->profile_id AND $request->email)
            {
                
                $data = Company::where('id',$request->profile_id)>where('email',$request->email)->paginate(6);
                return view("vendor.status.status",compact("data"));
            }

            else if($request->profile_id)
            {
                $data = Company::where('uuid',$request->profile_id)->paginate(6);
                return view("vendor.status.status",compact("data"));
            }

            else if($request->mobile)
            {
                $data = Company::where('mobile_no',$request->mobile)->paginate(6);
                return view("vendor.status.status",compact("data"));
            }

            else if($request->email)
            {
               $data = Company::where('email',$request->email)->paginate(6);
               return view("vendor.status.status",compact("data"));
            }
        }

        else if($request->company_name)
        {
            $data=Company::where('company_name','like', '%'.$request->company_name.'%' )->get();
            $datacount=Company::where('company_name','like', '%'.$request->company_name.'%' )->count();
            return view("vendor.search_company",compact("data","datacount"));
        }
        
        
        else
        {
            //dd("no");
           echo '<script>alert("Please Fill Data")</script>';
           return view("vendor.search_company");
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

    public function showsearch3()
    {
        if($request->ajax())
        {
            return view("vendor.livesearch",compact("searchCom"));
        }
    }
     
     // function for filter data date vise
     public function filter_data(Request $request)
     {
         $user = Auth::user()->id;

         $alldata=Company::all();
         
         //dd("$user");
         $todayCompany = Company::whereDate('next_call_timing','=',Carbon::today()->toDateString())->where('user_id',"$user")->get();
         
          $due = Company::whereDate('next_call_timing','<', Carbon::today()->toDateString())->where('user_id',"$user")->where('status_id',0)->
         count();
         
        $mydue1 = Company::whereDate('next_call_timing','<', Carbon::today()->toDateString())->where('user_id',"$user")->where('status',"NI")->where('status_id',0)->count();
        $mydue2 = Company::whereDate('next_call_timing','<', Carbon::today()->toDateString())->where('status',"Cnvrt")->where('user_id',"$user")->where('status_id',0)->count();
        $mydue3 = Company::whereDate('next_call_timing','<', Carbon::today()->toDateString())->where('status',"N.T.C")->where('user_id',"$user")->where('status_id',0)->count();
        $mydue4 = Company::whereDate('next_call_timing','<', Carbon::today()->toDateString())->where('status',"Com. Clsd")->where('user_id',"$user")->where('status_id',0)->count();
        $mydue5 = Company::whereDate('next_call_timing','<', Carbon::today()->toDateString())->where('status',"W No")->where('user_id',"$user")->where('status_id',0)->count();
        $mydue6 = Company::whereDate('next_call_timing','<', Carbon::today()->toDateString())->where('status',"Ser. Prv")->where('user_id',"$user")->where('status_id',0)->count();
        $mydue7 = Company::whereDate('next_call_timing','<', Carbon::today()->toDateString())->where('status',"Drop")->where('user_id',"$user")->where('status_id',0)->count();
        $duesum =  $mydue1+$mydue2+$mydue3+$mydue4+$mydue5+$mydue6+$mydue7;
        //$due = $alldue-$duesum;
        //dd("$due");
        
        $no = Company::where('status',"F.N.C")->where('user_id',"$user")->count();
        //return $data; 
        $cb = Company::where('status',"C.B")->where('user_id',"$user")->count();
        
        $cb_flps = Company::where('status',"C.B Flps")->where('user_id',"$user")->count();
        
        $td = Company::where('status',"F DMU")->where('user_id',"$user")->count();
        $pg = Company::where('status',"PG")->where('user_id',"$user")->count();
        
        $pg_flps = Company::where('status',"P.G Flps")->where('user_id',"$user")->count();
        
        //return $pg;
        $sv = Company::where('status',"Ser. Prv")->where('user_id',"$user")->count();
        $lang = Company::where('status',"Lang.B")->where('user_id',"$user")->count();
        $ni = Company::where('status',"NI")->where('user_id',"$user")->count();
        
        $pg_ni = DB::table('companies')->where('status',"Pg Ni")->where('user_id',"$user")->count();
        $dmu_ni = DB::table('companies')->where('status',"Dmu Ni")->where('user_id',"$user")->count();
        
        $mht = DB::table('companies')->where('status',"Sr.B")->where('user_id',"$user")->count();
        $amt = DB::table('companies')->where('status',"Sr.A")->where('user_id',"$user")->count();
        
        $con = Company::where('status',"Cnvrt")->where('user_id',"$user")->count();

        $wr = Company::where('status',"W No")->where('user_id',"$user")->count();
        $nt = Company::where('status',"N.T.C")->where('user_id',"$user")->count();
        $ccl = Company::where('status',"Com. Clsd")->where('user_id',"$user")->count();
        
        $dflps = Company::where('status',"Dmu Flps")->where('user_id',"$user")->count();
        $p1 = Company::where('status',"p1")->where('user_id',"$user")->count();
        $pic = Company::where('status',"Pick")->where('user_id',"$user")->count();
        $drop = Company::where('status',"Drop")->where('user_id',"$user")->count();
        $crtbh = Company::where('status',"C.By.H")->where('user_id',"$user")->count();
        
        $tch = Company::where('status',"Touch.c")->where('user_id',"$user")->count();
        $hot_fca = Company::where('status',"Hot.F.C.A")->where('user_id',"$user")->count();
        $vbylead = Company::where('status',"V.Buy.Lead")->where('user_id',"$user")->count();
        
        $total = $no+$cb+$td+$pg+$sv+$ni+$con+$wr+$nt+$ccl+$dflps+$pic+$drop+$crtbh+$tch+$hot_fca+$vbylead+$cb_flps+$pg_flps+$lang+$p1+$pg_ni+$dmu_ni+$mht+$amt;
        
           
        return view("vendor.filter-data",compact("no","cb","td","pg","sv","ni","con","wr",
            "nt","ccl","total","todayCompany","due","dflps","pic","drop","crtbh","tch","hot_fca","vbylead","cb_flps","pg_flps","lang","p1","pg_ni","dmu_ni","mht","amt","alldata"));
     }

     public function filter_data_result(Request $request)
     {
        $user = Auth::user()->id;
        $sdate = $request->input("sdate");
        $edate = $request->input("edate");
        $status = $request->input("status");

        $query = DB::table('companies')->select()
        ->where('created_at','>=',$sdate)
        ->where('created_at','<=',$edate)
        ->where('status',$status)
        ->where('user_id',"$user")
        ->get();
        
        $totalcompany = DB::table('companies')->select()
        ->where('created_at','>=',$sdate)
        ->where('created_at','<=',$edate)
        ->where('status',$status)
        ->where('user_id',"$user")
        ->count();
        return view("vendor.filter-data-result",compact("query","totalcompany"));
     }


     public function not_open(Request $request)
     {
            
            $fnC = "F.N.C";
     
            $user = Auth::user()->id;
            $data = Company::where('status',$fnC)->where('user_id',"$user")->paginate(6);
            return view("vendor.status.status",compact("data"));
        
    }


     public function call_back()
     {
        $user = Auth::user()->id;
        $cb = "C.B";
        $data = Company::where('status',$cb)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
     }

     public function tele_dmu()
     {
        $user = Auth::user()->id;
        
        $td = "F Dmu";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
     }
     public function dflps()
     {
        $user = Auth::user()->id;
        $dflps = "Dmu Flps";
        $data = Company::where('status',$dflps)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
     }

      public function pg()
     {
        $user = Auth::user()->id;
        $td = "PG";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
     }
      public function sv()
     {
        $user = Auth::user()->id;
       
        $sv = "Ser. Prv";
        $data = Company::where('status',$sv)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
     }
     
     public function lang()
     {
        $user = Auth::user()->id;
       
        $lang = "Lang.B";
        $data = Company::where('status',$lang)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
     }
     
      public function ni()
     {
        $user = Auth::user()->id;
        $td = "NI";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
     }
      public function con()
     {
        $user = Auth::user()->id;
       
        $td = "Cnvrt";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        //return $data;
        return view("vendor.status.status",compact("data"));
    }

    public function ccl()
     {
        $user = Auth::user()->id;
        $td = "Com. Clsd";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
    }

    public function nt()
     {
        $user = Auth::user()->id;
        
        $td = "N.T.C";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
    }

    public function wr()
     {
        $user = Auth::user()->id;
        $td = "W No";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
    }
    
    public function p1()
     {
        $user = Auth::user()->id;
        $P1 = "P1";
        $data = Company::where('status',$P1)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
    }
    
    public function pic()
     {
        $user = Auth::user()->id;
        $td = "Pick";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
    }
    public function drop()
     {
        $user = Auth::user()->id;
        $td = "Drop";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
    }
    public function crtbh()
     {
        $user = Auth::user()->id;
        $td = "C.By.H";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
    }
    public function nibhd()
     {
        $user = Auth::user()->id;
        $td = "N.I By Head";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
    }
    public function tch()
     {
        $user = Auth::user()->id;
        $td = "Touch.c";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
     }
    
    public function hot_fca()
     {
        $user = Auth::user()->id;
        $td = "Hot.F.C.A";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
     }
     
     public function cb_flps()
     {
        $user = Auth::user()->id;
        $cbflp = "C.B Flps";
        $data = Company::where('status',$cbflp)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
     }
     
     public function pg_flps()
     {
        $user = Auth::user()->id;
        $pgflp = "P.G Flps";
        $data = Company::where('status',$pgflp)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
     }
    public function vbylead()
     {
        $user = Auth::user()->id;
        $td = "V.Buy.Lead";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
     }
     
     public function total_com()
     {
        $user = Auth::user()->id;
       
        $data = Company::where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
     }
     
     public function pg_ni()
     {
        $user = Auth::user()->id;
        $td = "Pg Ni";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
     }
     
     public function amt()
     {
        $user = Auth::user()->id;
        $td = "Sr.A";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
     }
     
     public function mht()
     {
        $user = Auth::user()->id;
        $td = "Sr.B";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
     }
     
      public function dmu_ni()
     {
        $user = Auth::user()->id;
        $td = "Dmu Ni";
        $data = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
     }
    
     public function due()
     {
        $user = Auth::user()->id;
        $data = Company::whereDate('next_call_timing','<',Carbon::today()->toDateTimeString())->where('user_id',"$user")->where('status_id',0)->paginate(6);
        //dd("$data");
        //$fdata = Company::where('status',$td)->where('user_id',"$user")->paginate(6);
        return view("vendor.status.status",compact("data"));
    }
    
    

    public function vendor_shift_leads(Request $request)
    {
         $check = Company::where('uuid',$request->select)->first();
                //return $check;
         $shift = Company::all()->unique('emp_name');
         //$request->session()->put('name', $request->input('select'));
        
         return view("vendor.transfer-vendor-leads",compact("shift","check"));
      
    }

    public function vendor_leads_change(Request $request)
    {   
        
        
        $company2 = Company::where('user_id',$request->category)->first();
        //return $company2;
        $name=$company2->emp_name;
        $id=$request->select;

        Company::where('uuid', $id)
       ->update([
           'user_id' => $request->category,
           'emp_name'=> $name,

        ]);
       
        return Redirect::back()->with('success', 'Company Information Update Successfully');
     }

     public function refill($uuid)
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
        //return $forpaymentterm;
        return view("vendor.refill",compact("refill","check","forsale","forpaymentterm","buy"));
     }

     public function refill_data(Request $request, $uuid)
     {
         $emp_nameadd=$request->reg_by;
         $contdt = $request->contdt;
         $oldconersion = $request->oldconversion;
         $newconersion = $request->conversation_details;

         $singleconversion = array($oldconersion,$newconersion,$emp_nameadd,$contdt);
         $latestconversion=implode("/:",$singleconversion);
         
         //return $request->input();
        Company::where('uuid',$uuid)->update([

            'com_reg_date'=>$request->input('com_reg_date'),
            'reg_by'=>$request->input('reg_by'),
            'company_name'=>$request->input('company_name'),
            'brand_name'=>$request->input('brand_name'),
            'established_year'=>$request->input('established_year'),
            'firm_type'=>$request->input('firm_type'),
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

     public function distinct()
     {
         $check = "SELECT DISTINCT company_name FROM `companies`";
         dd($check);
    }
    
    public function birthday()
    {
        
      $date =Carbon::now()->format('Y-m-d');

       $data = User::where('dob',$date)->get();
       //$bdata = $data[0]->name;
       //dd("$bdata");
       return view("vendor.birthday",compact("data"));
    }
    
    public function exportCsv(Request $request)
    {
       $fileName = 'Backup.csv';
       $user = Auth::user()->id;
       $tasks = Company::where('user_id',$user)->get();
       $tasks = Company::where('user_id',"$user")->get();

            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );

            $columns = array('emp_name', 'mobile_no', 'email', 'company_name');

            $callback = function() use($tasks, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach ($tasks as $task) {
                    $row['emp_name']  = $task->emp_name;
                    $row['mobile_no']  = $task->mobile_no;
                    $row['email']    = $task->email;
                    $row['company_name']  = $task->company_name;
                 

                    fputcsv($file, array($row['emp_name'], $row['mobile_no'], $row['email'], $row['company_name']));
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        }
        
        public function filter_by_date(Request $request)
        {
           $user = Auth::user()->id;
           $data = $request->date;
           $data=Company::where('status_update_date',$request->date)->where('user_id',"$user")->paginate(6);
           return view("vendor.status.status",compact("data"));
           //dd("$find");

        }
        
        public function demo_link()
        {
           return view("vendor.demo-link");
        }
        
        public function insert_status(Request $request)
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
            return response()->json(['success'=>'Comment Send Successfully ']);
          }
            
            
        }
        
        public function data_sources()
        {
            return view("vendor.data-sources");
        }
}
