@extends('layouts.master-admin')
@section('content')
<style>
.vl {
  border-left: 6px solid #000;
  height: 20px;
}

.vl1 {
  border-left: 6px solid gray;
  height: 20px;
}

.sty
{
 position: relative;
 right: 42rem;
}    
</style>
</style>

<h3>Filter Company Data</h3>
<div class="container">
    <form class="form" action="{{ url('admin/filter_data_result') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <label>Starting Date</label>
                <input type="date" name="sdate" class="form-control" placeholder="Enter Company Name" >
            </div>

            <div class="col-sm-12 col-md-3">
                <label>Ending Date</label>
                <input type="date" name="edate" class="form-control" placeholder="Enter Company Name">
            </div>
            <div class="col-sm-12 col-md-3">
                <label>Select Status</label>
                <select name="status" class="form-control">
                        <option value="">Select Status</option>
					    <option value="F.N.C">F.N.C</option>
	                    <option value="C.B">C.B</option>
	                    <option value="C.B Flps">C.B Flps</option>
	                    <option value="F DMU">F DMU</option>
	                    <option value="Dmu Flps">Dmu Flps</option>
	                    <option value="PG">F.P.G</option>
	                    <option value="P.G Flps">P.G Flps</option>
	                    <option value="Cnvrt">Sale Flash</option>
	                    

                        <option value="Special.99">Special.99</option>
                        <option value="Follow-Up.99">Follow-Up.99 </option>
                        <option value="Sale Flash .99">Sale Flash .99</option>


                        <option value="Touch">Touch</option>
                        <option value="Sr.A">Sr.A</option>
                        <option value="Sr.B">Sr.B</option>
                        <option value="Catalog. Hot F.C.A">Catalog. Hot F.C.A</option>
                        <option value="T.L Sale Flash">T.L Sale Flash</option>

                        <option value="NI">Direct N.I</option>
                        <option value="NI">CB.Ni</option>
                        <option value="Dmu Ni">Dmu Ni</option>
	                    <option value="Pg Ni">Pg Ni</option>
                        <option value="Lang.B">Lang.B NI</option>

	                    
	                    <option value="Com. Clsd">Com. Clsd</option>
	                    <option value="W No">Wrng.No. NI</option>
	                    <option value="N.T.C">N.T.C. NI</option>
	                    <option value="Ser. Prv">Ser.Prv. NI</option>
	                    <option value="Touch.c">Touch.c</option>
	                    <option value="Hot.F.C.A">Hot.F.C.A</option>
	                    <option value="Ni F.Call">Ni F.Call</option>
                        <option value="Pick">PicK</option>
	                    <option value="C.By.H">Sale Flash By.H</option>
	                    <option value="Drop">Drop Ni</option>
	                  </select>
            </div>
            <div class="col-sm-12 col-md-3">
                <label>Emp Name</label>
                <select id="ename" name="user_id" class="form-control" >
                        <option value="">Select Emp Name</option>
                        @foreach($empname as $list)
                        <option value="{{$list->id}}">
                            {{$list->name}}
                         </option>
                         @endforeach
                </select>
            </div>
            <div class="col-sm-12 col-md-3 mt-4">
                <input type="submit" class="btn-custom btn-block" value="Filter Data">
            </div>

         </div>
    </form>
</div>

<br><br><br>
<div class="container">
    <div class="row">
        <div class="col-s-12 col-md-6">
           <h5><mark>All Company Status Of <?php echo $sinCom; ?></mark></h5>
         </div>
        <div class="col-sm-12 col-md-6">
            <a  type="btn" class="btn-custom float-right" href="{{ url('all-staff-admn') }}"> Back</a>
        </div>
    </div>
</div>



<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 " style="overflow-x:auto;">
            <table class="table">
                <div class="row">
                    
                    <div class="col-sm-12 col-md-4">
                        <th style="position: relative;
                        left: 30rem;">Executive  ( A )</th>
                    </div>


                    <div class="col-sm-12 col-md-4">
                        <th style="position:relative; left: 85rem;">Executive </th>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <th style="position: relative;
                        left: 100rem;">TL. Call Pull Work ( A.B )</th>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <th style="position: relative;
                        left: 115rem;">Reason For Not Interested In Paid Membership</th>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <th style="position: relative;
                        left: 125rem;">Not Right Party Customer</th>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <th style="position: relative;
                        left: 135rem;">TL. Call Pull Work ( A.B.C )</th>
                    </div>


                </div>
                <tr  >
                    <!-- Executive ( A )   -->
                    <th style="color:blue;">F.N.C </th>
                    <th style="color:#b3b32bf7;position: relative;
                    right: 3rem;">C.B </th>
                    <th style="color:#b3b32bf7; position: relative;
                    right: 5rem;" >C.B Flps </th>
                    <th style="color:green; position: relative;
                    right: 10rem;">F. Dmu </th>
                    <th style=" position: relative;
                    right: 26rem;" style="color:green;" >Dmu Flps </th>
                    <th class=""  style="color:green;position: relative;right: 33rem;">F.P.G </th>
                    <th class=""  style="color:green;position: relative;
                    right:42rem ;">P.G Flps </th>
                    <th class="sty"  style="color:green;">Sale Flash </th>
                    <!--End Executive ( A ) -->

                    <!--Start Special. Pkg.99 -->
                    <th class=" vl1"  style="color:green; ;">Special.99 </th>
                    <th class=""  style="color:green;">Follow-Up.99 </th>
                    <th class=""  style="color:green;">Sale Flash .99 </th>
                    <!--End Special. Pkg.99 -->
                  
                    <!--TL. Call Pull Work ( A.B )-->
                    <th style="color:green;" class="vl1" >Touch</th>
                    <th style="color:green;" >Sr.A</th>
                    <th style="color:green;" >Sr.B</th>
                    <th style="color:green;">Catalog. Hot F.C.A</th>
                    <th style="color:green;">T.L Sale Flash </th>
                    <!-- End TL. Call Pull Work ( A.B )-->
                    
                    <!-- Reason For Not Interested In Paid Membership -->
                    <th class="vl1"  style="color:red;">Direct N.I</th>
                    <th style="color:red;">CB.NI</th>
                    <th style="color:red;">Dmu Ni</th>
                    <th style="color:red;">PG Ni</th>
                    <th style="color:red;">Lang.B. NI</th>
                    <th style="color:red;">Ni.99/ Pkg</th>
                    <th style="color:red;">Ni By Sr.</th>
                    <!--End Reason For Not Interested In Paid Membership -->

                    <!-- Not Right Party Customer -->
                    
                    <th class="vl1" style="color:red;">Com. Clsd</th>
                    <th  style="color:red;">Wrng.No. NI</th>
                    <th style="color:red;">N.T.C. NI </th>
                    <th style="color:red;" >Ser.Prv. NI</th>

                    <!--End Not Right Party Customer -->
            
                    <!-- TL. Call Pull Work ( A.B.C ) -->
                    <th style="color:blue;" class="vl">Touch.C</th>
                    <th style="color:#b3b32bf7;">Hot.F.C.A</th>
                    <th style="color:#b3b32bf7;">Ni F.Call</th>
                    <th style="color:green;">Pick</th>
                    <th style="color:green;">Sale Flash By.H</th>
                    <th  style="color:red;">Drop Ni</th>
                    <!--End TL. Call Pull Work ( A.B.C ) -->
                    <th ><b>Total</b></th>
                </tr> 
                <tr>

                    <th ><a  href="{{ url('admn-Not-Open') }}">{{ $no }}</a></th>
                    <th style="position: relative;
                    right: 2.8rem"><a  href="{{ url('admn-call-back') }}">{{ $cb }}</a></th>
                    <th style=" position: relative;
                    right: 4rem;" ><a  href="{{ url('admn-cb-flps') }}">{{ $cbflps }}</a></th>
                    <th style=" position: relative;
                    right: 10rem;"><a  href="{{ url('admn-tele-dmu') }}">{{ $td }}</a></th>
                    <th style=" position: relative;
                    right: 26rem;" ><a  href="{{ url('admn-dmu-follow-ups') }}">{{ $dflps }}</a></th>
                    <th class="" style="position: relative;right: 33rem;"><a  href="{{ url('admn-pg') }}">{{ $pg }}</a></th>
                    <th  class="" style="position: relative;right: 41rem;"><a  href="{{ url('admn-pg-flps') }}">{{ $pgflps }}</a></th>
                    <th  class="sty" ><a  href="{{ url('admn-pg-flps') }}">{{ $con }}</a></th>
                    <th  class="vl1" ><a  href="{{ url('admn-pg-flps') }}">Special.99/ </a></th>
                    <th  class="" ><a  href="{{ url('admn-pg-flps') }}">Follow-Up.99  </a></th>
                    <th  class=" " ><a  href="{{ url('admn-pg-flps') }}">Sale Flash .99/</a></th>
                    
                    
                    <th class="vl1"><a  href="{{ url('admn-con') }}" >Touch</a></th>
                    <th ><a  href="{{ url('admn-amt') }}">{{ $amt }}</a></th>
                    <th ><a  href="{{ url('admn-mht') }}">{{ $mht }}</a></th>
                    <th ><a  href="{{ url('admn-mht') }}">Catalog. Hot F.C.A</a></th>
                    <th ><a  href="{{ url('admn-mht') }}">Sale Flash </a></th>
                    
                    <th class="vl1"><a  href="{{ url('admn-mht') }}">Direct N.I</a></th>
                    <th><a  href="{{ url('admn-mht') }}">CB.NI</a></th>
                    <th><a  href="{{ url('admn-mht') }}">{{$dmu_ni}}</a></th>
                    <th><a  href="{{ url('admn-mht') }}">{{$pg_ni}}</a></th>
                    <th><a  href="{{ url('admn-mht') }}">{{ $lang }}</a></th>
                    <th><a  href="{{ url('admn-mht') }}">Ni.99/ Pkg </a></th>
                    <th ><a  href="{{ url('admn-mht') }}">Ni By Sr.</a></th>
                    
                    
                   
                    <th class="vl1"><a  href="{{ url('admn-ccl') }}" >{{ $ccl }}</a></th>
                    <th><a  href="{{ url('admn-wr') }}">{{ $wr }}</a></th>
                    <th><a  href="{{ url('admn-nt') }}">{{ $nt }}</a></th>
                    <th><a  href="{{ url('admn-sv') }}">{{ $sv }}</a></th>
                      
                      
                     <th class="vl"><a href="{{ url('admin-tch') }}" >{{ $tch }}</a></th>
                    <th><a href="{{ url('admin-hot-fca') }} ">{{ $hot_fca }}</a></th>
                    <th><a  href="{{ url('admn-p1') }}">{{ $p1 }} Ni F.Call </a></th>
                    <th><a  href="{{ url('admn-pic') }}">{{ $pic }}</a></th>
                    <th><a  href="{{ url('admn-crtbh') }}">{{ $crtbh }}</a></th>
                    <th><a  href="{{ url('admn-drop') }}">{{ $drop }}</a></th> 
                  
                    <th><a>{{ $total }}</a></th>
                    
                 </tr>

            </table>
        </div>
    </div>
</div>

@endsection