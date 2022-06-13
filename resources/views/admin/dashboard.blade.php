@extends('layouts.master-admin')

@section('title')
  About Us | Funda of IT
@endsection

@section('content')

<div class="container-fluid	">
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<img class="center" src="{{ asset('assets/images/dashboard.jpg') }}" style="width:100%;box-shadow:2px 3px 30px 3px #ccc;border-radius:2px;">
		</div>
	</div>
</div> 

<br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-4 box-design">
			<div class="box-para-design">
				 <p class="text-center para-com-design h4">Total Company</p>
			   <h3 class="text-center" ><?php 
					  $datam=App\Company::all();
					  echo count($datam);
				  ?></h3>
			</div>
		</div>
		<div class="col-sm-12 col-md-3 box-design">
			 <div class="box-para-design">
				 <p class="text-center para-com-design h4" style="padding-bottom:-10px;">Total Dmu Flps</p>
			   <h3 class="text-center" ><?php 
					  $datam=App\Company::where('status',"Dmu Flps")->get();
					  echo count($datam);
				  ?></h3>
			</div>
		</div>
		<div class="col-sm-12 col-md-4 box-design">
			 <div class="box-para-design">
				 <p class="text-center para-com-design h4" style="padding-bottom:-10px;">Total F Dmu </p>
			   <h3 class="text-center" ><?php 
					  $datam=App\Company::where('status',"F Dmu")->get();
					  echo count($datam);
				  ?></h3>
			</div>
		</div>
	</div>
</div>
<br>
<h3 class="container">Today Created Company</h3><br>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-4 box-design">
			<div class="box-para-design">
				 <p class="text-center para-com-design h6">Today  Company</p>
			   <h3 class="text-center" >
			   <?php 
			          use Carbon\Carbon;
					  $Company = App\Company::whereDate('created_at',  Carbon::today()->toDateString())->get();
					  echo count($Company);
				  ?></h3>
			</div>
		</div>
		<div class="col-sm-12 col-md-3 box-design">
			 <div class="box-para-design">
				 <p class="text-center para-com-design h4" style="padding-bottom:-10px;">PG Flps</p>
			   <h3 class="text-center" ><?php 
					  $datam=App\Company::where('status',"P.G Flps")->whereDate('status_update_date',  Carbon::today()->toDateString())->get();
					  echo count($datam);
				  ?></h3>
			</div>
		</div>
		<div class="col-sm-12 col-md-4 box-design">
			 <div class="box-para-design">
				 <p class="text-center para-com-design h4" style="padding-bottom:-10px;">F Dmu </p>
			   <h3 class="text-center" ><?php 
					  $datam=App\Company::where('status',"F Dmu")->whereDate('status_update_date',  Carbon::today()->toDateString())->get();
					  echo count($datam);
				  ?></h3>
			</div>
		</div>
	</div>
</div>


@section('scripts')
@endsection



@endsection