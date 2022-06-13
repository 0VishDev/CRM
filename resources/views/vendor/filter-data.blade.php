@extends('layouts.master')
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
</style>


<!--<span data-href="{{ url('tasks')  }}" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">Get BackUp</span>-->
<div class="container" style="box-shadow:1px 1px 1px 1px;padding:10px;">
    <h3>Filter Company Data </h3> 
    <form class="form" action="{{ url('filter_data_result') }}" method="post" >
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <label>Starting Date</label>
                <input type="date" name="sdate" class="form-control" placeholder="Enter Company Name" required>
            </div>

            <div class="col-sm-12 col-md-4">
                <label>Ending Date</label>
                <input type="date" name="edate" class="form-control" placeholder="Enter Company Name " required>
            </div>
            <div class="col-sm-12 col-md-4">
                <label>Select Status</label>
                <select name="status" class="form-control">
                    <option value=""></option>
                    <option value="F.N.C">F.N.C</option>
                    <option value="C.B">C.B</option>
                    <option value="C.B Flps">C.B Flps</option>
                    <option value="F DMU">F DMU</option>
                    <option value="Dmu Flps">Dmu Flps</option>
                    <option value="PG">PG</option>
                    <option value="P.G Flps">P.G Flps</option>
                    <option value="Cnvrt">Cnvrt</option>
                    <option value="NI">NI</option>
                    
                    <option value="Dmu Ni">Dmu Ni</option>
                    <option value="Pg Ni">Pg Ni</option>
                    
                    <option value="Com. Clsd">Com. Clsd</option>
                    <option value="W No">W No</option>
                    <option value="N.T.C">N.T.C</option>
                    <option value="Ser. Prv">Ser. Prv</option>
                    
                    <option value="Touch.c">Touch.c</option>
                    <option value="Hot.F.C.A">Hot.F.C.A</option>
                    
                    <option value="SR.A">SR.A</option>
                    <option value="SR.B">SR.B</option>
                    <option value="Pick">Pick</option>
                    <option value="C.By.H">C.By.H</option>
                    <option value="Drop">Drop</option>
                    <option value="V.Buy.Lead">V.Buy.Lead</option>
                 </select>
            </div>
            <div class="col-sm-12 col-md-4 mt-4">
                <input type="submit" class="btn-custom block-btn" value="Filter Company Data">
            </div>

         </div>
    </form>
</div>
<br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <span data-href="{{ url('tasks')  }}" id="export" class="btn-custom btn-sm" onclick="exportTasks(event.target);">Export CSV File</span>  
        </div>
        <div class="col-sm-12 col-md-6">
            <form action="{{ url('filter-by-date') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-10">
                        <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" placeholder="" class="form-control">
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <input type="submit" class="btn-custom" value="Filter">
                    </div>
                    
                    
                </div>
            </form>
        </div>
    </div>

    
    <div class="row">
        
        <div class="col-sm-12 col-md-12 " style="overflow-x:auto;">
            
            <table class="table">
                
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                    <th style="padding-left
                    :76%;">Senior ( B ) </th>
                </div>
                
                <div class="col-sm-12 col-md-6">
                    <th style="padding-left
                    :10%;">Executive  ( A )</th>
                </div>
                </div>
                <tr>
                    <th style="color:blue;">F.N.C</th>
                    <th style="color:#b3b32bf7;" >C.B</th>
                    <th style="color:#b3b32bf7;" >C.B Flps</th>
                    <th style="color:green;">F. Dmu</th>
                    <th style="color:green;" >Dmu Flps</th>
                    <th style="color:green;">P.G</th>
                    <th style="color:green;">P.G Flps</th>
                    <th style="color:blue;">Due</th>
                    
                    <th style="color:blue;">Sr.A</th>
                    <th style="color:blue;">Sr.B</th>
                    
                    <th style="color:green;" >Cnvrt</th>
                    <th style="color:red;" class="vl1">N.I</th>
                    
                    <th style="color:red;">Dmu Ni</th>
                    <th style="color:red;">Pg Ni</th>
                    
                    <th style="color:red;">Com. Clsd</th>
                    <th  style="color:red;">W.No.</th>
                    <th style="color:red;" >N.T.C</th>
                    <th style="color:red;" >Ser.Prv</th>
                    <th style="color:red;" >Lang.B</th>
                    <th style="color:blue;" class="vl">Touch.C</th>
                    <th style="color:#b3b32bf7;">Hot.F.C.A</th>
                    <th style="color:green;">P1</th>
                    <th style="color:green;">Pick</th>
                    <th style="color:green;">C.By.H</th>
                    <th  style="color:red;">Drop</th>
                    <th class="vl" >V.Buy.Lead</th>
                   
                    <th ><b>Total</b></th>
                </tr> 
                <tr>
                    @if($due>0)
                    <th><a href="{{ url('Not-Open') }}" target="_blank"></a></th>
                    <th ><a href="{{ url('call-back') }}" target="_blank"></a></th>
                    <th ><a href="{{ url('cb_flps') }}" target="_blank"></a></th>
                    <th><a href="{{ url('tele-dmu') }}" target="_blank"></a></th>
                    <th><a href="{{ url('Dmu-Follow-Ups') }}" target="_blank"></a></th>
                    <th><a href="{{ url('pg') }}" target="_blank"></a></th>
                    <th><a href="{{ url('pg_flps') }}" target="_blank"></a></th>
                    <th><a href="{{ url('due') }}" target="_blank">{{ $due }}</a></th>
                    <th><a href="{{ url('con') }}" target="_blank"></a></th>
                    <th class="vl1"><a href="{{ url('ni') }}" target="_blank"></a></th>
                    
                    <th ><a href="{{ url('dmu-ni') }}" target="_blank"></a></th>
                    <th ><a href="{{ url('pg-ni') }}" target="_blank"></a></th>
                    <th><a href="{{ url('ccl') }}"target="_blank"></a></th>
                    <th><a href="{{ url('wr') }}" target="_blank"></a></th>
                    <th ><a href="{{ url('sv') }}" target="_blank"></a></th>
                    <th ><a href="{{ url('lang') }}" target="_blank"></a></th>
                    <th ><a href="{{ url('tch') }}" target="_blank" ></a></th>
                    <th><a href="{{ url('hot-fca') }} "target="_blank"></a></th>
                    
                    <th><a href="{{ url('p1') }}" target="_blank"></a></th>
                    <th><a href="{{ url('pic') }}" target="_blank"></a></th>
                    <th><a href="{{ url('crtbh') }}" target="_blank"></a></th>
                    <th><a href="{{ url('drop') }}" target="_blank"></a></th>
                    <th ><a href="{{ url('vbylead') }}" target="_blank"></a></th> 
                    <th><a target="_blank" href="{{ url('total-com') }}"></a></th>
                     @else
                     
                     <th><a href="{{ url('Not-Open') }}" target="_blank">{{ $no }}</a></th>
                    <th ><a href="{{ url('call-back') }}" target="_blank">{{ $cb }}</a></th>
                    <th ><a href="{{ url('cb_flps') }}" target="_blank">{{ $cb_flps }}</a></th>
                    <th><a href="{{ url('tele-dmu') }}" target="_blank">{{ $td }}</a></th>
                    <th><a href="{{ url('Dmu-Follow-Ups') }}" target="_blank">{{ $dflps }}</a></th>
                    <th><a href="{{ url('pg') }}" target="_blank">{{ $pg }}</a></th>
                    <th><a href="{{ url('pg_flps') }}" target="_blank">{{ $pg_flps }}</a></th>
                    <th><a href="{{ url('due') }}" target="_blank">{{ $due }}</a></th>
                    
                    <th><a target="_blank" href="{{ url('amt') }}">{{ $amt }}</a></th>
                    <th><a target="_blank" href="{{ url('mht') }}">{{ $mht }}</a></th>
                    
                    <th><a href="{{ url('con') }}" target="_blank">{{ $con }}</a></th>
                    <th class="vl1"><a href="{{ url('ni') }}" target="_blank">{{ $ni }}</a></th>
                    
                    <th ><a href="{{ url('dmu-ni') }}" target="_blank">{{ $dmu_ni }}</a></th>
                    <th ><a href="{{ url('pg-ni') }}" target="_blank">{{ $pg_ni }}</a></th>
                    <th><a href="{{ url('ccl') }}"target="_blank">{{ $ccl }}</a></th>
                    <th><a href="{{ url('wr') }}" target="_blank">{{ $wr }}</a></th>
                    <th><a href="{{ url('nt') }}" target="_blank">{{ $nt }}</a></th>
                    <th ><a href="{{ url('sv') }}" target="_blank">{{ $sv }}</a></th>
                    <th ><a href="{{ url('lang') }}" target="_blank">{{ $lang }}</a></th>
                    <th class="vl"><a href="{{ url('tch') }}" target="_blank" >{{ $tch }}</a></th>
                    <th><a href="{{ url('hot-fca') }} "target="_blank">{{ $hot_fca }}</a></th>
                    
                    <th><a href="{{ url('p1') }}" target="_blank">{{ $p1 }}</a></th>
                    <th><a href="{{ url('pic') }}" target="_blank">{{ $pic }}</a></th>
                    <th><a href="{{ url('crtbh') }}" target="_blank">{{ $crtbh }}</a></th>
                    <th><a href="{{ url('drop') }}" target="_blank">{{ $drop }}</a></th>
                    <th class="vl"><a href="{{ url('vbylead') }}" target="_blank">{{ $vbylead }}</a></th> 
                    <th><a target="_blank" href="{{ url('total-com') }}">{{ $total }}</a></th>
                    @endif
                 </tr>

            </table>
        </div>
    </div>
</div>

<br><br><br><br>
<h3 class="pl-5">Today Follow up</h3>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 ">
            <table class="table">
                <tr>
                    <!-- <th>Emp Name</th> -->
                    <th>Mobile No</th>
                    <th>Company Name</th>
                    <th>Status</th>
                  </tr> 
                @foreach($todayCompany as $com)
                <tr>
                    <!-- <th >{{ $com->emp_name }}</th> -->
                    <th style="color:red;">{{ $com->mobile_no }}</th>
                    <th ><a href="{{url('/all-info/'.$com->uuid)}}">{{ $com->company_name }}</a></th>
                    <th >{{ $com->status }}</th>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection