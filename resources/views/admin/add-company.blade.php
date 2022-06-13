@extends('layouts.master-admin')
@section('content')

<style>
    .error
    {
        color:red;
    }
</style>
	
<section id="Add New Company Start">
	<div class="container">
		@if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        @if(session()->has('alert_msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('alert_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
         @if ($errors->any())
         <div class="alert alert-warning alert-dismissible fade show" role="alert">
             @foreach ($errors->all() as $error)
                 <div>{{$error}}</div>
             @endforeach
             </div>
         @endif
		<h3 class="mb-4 float-right">Add New Company</h3>
		<form class="form" action="{{ url('data') }}" method="post">
			@csrf
			<h6><mark>Company Profile</mark></h6><br>
			<div class="row">
                <div class="col-sm-12 col-md-4">
                	<label>Company Register Date</label>
				     
				     
				     <input type="date"  value="<?php echo date('Y-m-d'); ?>" name="com_reg_date" class="form-control"  readonly/>

			    </div>
			     

			    <div class="col-sm-12 col-md-8">
                	<label>Profile Register By</label>
				     <input type="text" readonly class="form-control" name="reg_by" placeholder="Profile Register By" value="{{ Auth::user()->name }}">
			    </div>

			    

           </div><br><hr>
            
            <h6 class="mb-3"><mark>Start Call From ( Purpose Of Registration )</mark></h6>
			<div class="row">
				<div class="col-sm-4">
				    <select   name="buy_sell" class="form-control">
						
	                    <option value="Buyer">Buyer</option>
	                    <option value="Seller">Seller</option>
	                    <option value="Buyer Seller">Buy and Sell</option>
	                    
	                </select>
	           	</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="major_product" placeholder="Major Product Name & Other Products" >
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="min_to_max" placeholder=" Minimum Quantity To Maximum Quantity" ><br>
				</div>

				<div class="col-sm-12 col-md-4">
					<select   name="req_frequ" class="form-control">
						<option value="Requirement Frequency">Requirement Frequency</option>
						<option value="Regular">Regular</option>
	                    <option value="Daily">Daily</option>
	                    <option value="Weekly">Weekly</option>
	                    <option value="Monthly">Monthly</option>
	                    <option value="Half Yearly">Half Yearly</option>
	                    <option value="Yearly">Yearly</option>
	                    <option value="As Per Demand & Supply">As Per Demand & Supply</option>
	                   
	                </select>
			    </div>
			    <div class="col-sm-12 col-md-4">
			        <input type="text" class="form-control" placeholder="Product :- Quality / Size / Specification" name="quality_size_speci">
					<!--<select   name="quality_size_speci" class="form-control">
						<option value="Product Quality/Size/Specification">Product Quality/Size/Specification</option>
	                    <option value="Good"> Good</option>
	                    <option value="Grade a">Grade a</option>
	                    <option value="Grade b">Grade b</option>
	                    <option value="Grade c">Grade c</option>
	                    <option value="As Per Demand Supply">As Per Demand Supply</option>
	                 </select>-->
			    </div>
			    <div class="col-sm-12 col-md-4">
					<select   name="purpose_of_req" class="form-control">
						<option value="Purpose Of Requirement">Purpose Of Requirement</option>
	                    <option value="End Use"> End Use</option>
	                    <option value="Resale">Resale</option>
	                     <option value="Trading">Trading</option>
	                      <option value="Export">Export</option>
	                      <option value="Import">Import</option>
	                      <option value="Use as a Raw Material">Use as a Raw Material</option>
	                    <option value="Business Expansion">Business Expansion</option>
	                 </select><br>
			    </div>

				<div class="col-sm-4">
					<input type="text" class="form-control" name="packaging_size" placeholder="Packaging Size (As Per Demand & Supply)" ><br>
				</div>

				<div class="col-sm-12 col-md-4">
					<select   name="delivery_place" class="form-control">
						<option value="Delivery Place">Delivery Place</option>
	                    <option value="Locally"> Locally</option>
	                    <option value="City">City</option>
	                    <option value="State"> State</option>
	                    <option value="Pan India">Pan India</option>
	                    <option value="Globally">Globally</option>
	                    <option value="As Per Demand & Supply">As Per Demand & Supply</option>
	                    <option value="Regular">Regular</option>
	                 </select>
			    </div>

			    <div class="col-sm-12 col-md-4">
					<select   name="tar_of_busi_area" class="form-control">
						<option value="Prefured Location">Prefured Location</option>
	                    <option value="Locally"> Locally</option>
	                    <option value="City">City</option>
	                    <option value="State"> State</option>
	                    <option value="Pan India">Pan India</option>
	                    <option value="Globally">Globally</option>
	                    <option value="As Per Demand & Supply">As Per Demand & Supply</option>
	                    <option value="Prefured Location">Prefured Location</option>
	                 </select>
			    </div>

			    <!--<div class="col-sm-12 col-md-4">
					<select   name="payment_term" class="form-control">
						<option value="Payment Terms">Payment Terms</option>
	                    <option value="100% Advance"> 100% Advance</option>
	                    <option value="Cash On Carry">Cash On Carry</option>
	                    <option value="Cash On Delivery">Cash On Delivery</option>
	                    <option value="TT">T.T</option>
	                    <option value="50% Advance + 50% After Loading Or Unloading,"> 50% Advance + 50% After Loading Or Unloading</option>
	                    <option value="Token">Token</option>
	                    <option value="LC">LC</option>
	                    <option value="Bank Guaranty">Bank Guaranty</option>
	                    <option value="Credit">Credit</option>
	                 </select>
			    </div>-->
			    <div class="col-sm-12 col-md-12">
				    <label >Payment Term</label><br>
	                <label><input type="checkbox" name="paymentterm[]" value="100% Advance"> 100% Advance</label>
	                <label><input type="checkbox" name="paymentterm[]" value="50% Advance & 50%  LR Copy"> 50% Advance & 50%  LR Copy</label>
	                 <label><input type="checkbox" name="paymentterm[]" value="Token Booking Ammount"> Token Booking Ammount</label>
	                <label><input type="checkbox" name="paymentterm[]" value="Cash On Carry"> Cash On Carry</label>
	                <label><input type="checkbox" name="paymentterm[]" value="50% Advance & 50%  Unloading"> 50% Advance & 50%  Unloading</label>
	                <label><input type="checkbox" name="paymentterm[]" value="Credit"> Credit</label>
	                <label><input type="checkbox" name="paymentterm[]" value="LC"> L.C</label>
	                <label><input type="checkbox" name="paymentterm[]" value="Bank Gaurantee"> Bank Gaurantee</label>
	                
	                <label><input type="checkbox" name="paymentterm[]" value="CIF"> C.I.F</label>
	                <label><input type="checkbox" name="paymentterm[]" value="CNF"> C.N.F</label>
	                <label><input type="checkbox" name="paymentterm[]" value="FOB"> F.O.B</label>
	                <label><input type="checkbox" name="paymentterm[]" value="FOR"> F.O.R</label>
	                 <label><input type="checkbox" name="paymentterm[]" value="Cash On Delivery"> Cash On Delivery</label>
	                <label><input type="checkbox" name="paymentterm[]" value="Export Bill Discounting"> Export Bill Discounting</label>
	                
	                
	                
	                
	               
	                
	               
	            </div>
			    <div class="col-sm-12 col-md-4">
					<select   name="req_urgen" class="form-control">
						<option value="Requirement Urgency">Requirement Urgency</option>
						<option value="Immediately">Immediately</option>
	                    <option value="Daily">Daily</option>
	                    <option value="Weekly">Weekly</option>
	                    <option value="Monthly">Monthly</option>
	                    <option value="Yearly">Yearly</option>
	                    <option value="As Per Demand & Supply">As Per Demand & Supply</option>
	                    
	                 </select><br>
			    </div>
			    
			</div>
			
			<h6 class="mb-3"><mark>Previous Marketing Source </mark></h6>
			<div class="row">
				<div class="col-sm-4">
					<input type="text" class="form-control" name="website_link" placeholder="Website Link" >
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="other_investment" placeholder="Othe Investments For Marketing Online/Offline" >
				</div>
				<div class="col-sm-4">
					<select   name="response" class="form-control">
						<option value="Response">Response</option>
						<option value="Nothing">Nothing</option>
	                    <option value="Positive">Positive</option>
	                    <option value="Negative">Negative</option>
	                 </select><br>
				</div>
			</div>
			
			<h6 class="mb-3"><mark>Customer Contact Details</mark></h6>
			<div class="row">
				<div class="col-sm-4">
					<input type="text" class="form-control" name="cus_name" placeholder="Customer Name" >
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="designation" placeholder="Designation" >
				</div>
				<div class="col-sm-4">
					<input type="number" class="form-control" name="mobile_no" placeholder="Mobile No." required><br>
				</div>

				<div class="col-sm-4">
					<input type="number" class="form-control" name="whats_no" placeholder="Whats App No." ><br>
				</div>

				<div class="col-sm-4">
					<input type="number" class="form-control" name="alternate_no" placeholder="Alternate No." ><br>
				</div>

				

				<div class="col-sm-4">
					<input type="text" class="form-control" name="email" placeholder="Email Id" >
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="address" placeholder="Address " ><br>
				</div>
			</div>
			
           <h6><mark>Company Details</mark></h6>
			<div class="row">
				
				<div class="col-sm-12 col-md-4">
				     <input type="text" class="form-control" name="company_name" placeholder="Company Name" >
			    </div>
			    <div class="col-sm-12 col-md-4">
				     <input type="text" class="form-control" name="brand_name" placeholder="Brand Name" >
			    </div>
			    <div class="col-sm-12 col-md-4">
				     <input type="number" class="form-control" name="established_year" placeholder=" Year of Established" ><br>
			    </div>
			    <div class="col-sm-12 col-md-12">
					<select   name="firm_type" class="form-control" >
						<option value="Firm Type">Select Firm Type</option>
	                    <option value="Proprietorship">Proprietorship</option>
	                    <option value="Partnership">Partnership</option>
	                    <option value="Pvt.Ltd">Pvt.Ltd</option>
	                    <option value="LLP">LLP</option>
	                    <option value="Public Ltd.">Public Ltd.</option>
	                </select><br>
			    </div>
                
			    <div class="col-sm-12 col-md-12">
				    <label ><mark>Nature Of Business</mark></label><br>
	                <label><input type="checkbox" name="category[]" value="End Consumer"> End Consumer</label>
	                <label><input type="checkbox" name="category[]" value="Retailer"> Retailer</label>
	                <label><input type="checkbox" name="category[]" value="Wholesaler"> Wholesaler</label>
	                <label><input type="checkbox" name="category[]" value="Supplier"> Supplier</label>
	                <label><input type="checkbox" name="category[]" value="Commission Agent">Commission Agent</label>
	                <label><input type="checkbox" name="category[]" value="Distributer">Distributer</label>
	                <label><input type="checkbox" name="category[]" value="Trader">Trader</label>
	                <label><input type="checkbox" name="category[]" value="Exporter">Exporter</label>

	                <label><input type="checkbox" name="category[]" value="Importer">Importer</label>
	                <label><input type="checkbox" name="category[]" value="Manufacturer">Manufacturer</label>
	                <label><input type="checkbox" name="category[]" value="Third Party Manufacturer">Third Party Manufacturer</label>
	                <label><input type="checkbox" name="category[]" value="Own Branded Manufacturer">Own Branded Manufacturer</label>
	                <label><input type="checkbox" name="category[]" value="Farmer">Farmer</label>
				</div> 
			</div>
            <br>
            
            <input type="button" value="Show/Hide" onClick="showHideDiv('divMsg')"/><br><br>
                <div id="divMsg" style="display:none">
			<div class="row">
				
			    <div class="col-sm-12 col-md-12">
					
	                <label ><mark>For Sell (Dealing With This Type of Buyer)</mark></label><br>
	                <label><input type="checkbox" name="sale[]" value="End Consumer"> End Consumer</label>
	                <label><input type="checkbox" name="sale[]" value="Retailer"> Retailer</label>
	                <label><input type="checkbox" name="sale[]" value="Wholesaler"> Wholesaler</label>
	                <label><input type="checkbox" name="sale[]" value="Supplier"> Supplier</label>
	                <label><input type="checkbox" name="sale[]" value="Commission Agent">Commission Agent</label>
	                <label><input type="checkbox" name="sale[]" value="Distributer">Distributer</label>
	                <label><input type="checkbox" name="sale[]" value="Trader">Trader</label>
	                <label><input type="checkbox" name="sale[]" value="Exporter">Exporter</label>
                    <label><input type="checkbox" name="sale[]" value="Job Work">Job Work</label>
	                <label><input type="checkbox" name="sale[]" value="Importer">Importer</label>
	                <label><input type="checkbox" name="sale[]" value="Manufacturer">Manufacturer</label>
	                <label><input type="checkbox" name="sale[]" value="Third Party Manufacturer">Third Party Manufacturer</label>
	                <label><input type="checkbox" name="sale[]" value="Own Branded Manufacturer">Own Branded Manufacturer</label>
			    </div>
                
			    <div class="col-sm-12 col-md-12"><br>
					<!--<select   name="buy" class="form-control">
						<option value="Buy">Buy (As a Row Material )</option>
	                    <option value="Seeds">Seeds</option>
	                    <option value="Exporter">Exporter</option>
	                    <option value="Trader">Trader</option>
	                    <option value="Wholesaler">Wholesaler</option>
	                    <option value="Distributor & Dealer">Distributor & Dealer</option>

	                </select>-->
	                <label ><mark>For Buy (Dealing With This Type of Supplier )</mark></label><br>
	                <label><input type="checkbox" name="buy[]" value="End Consumer"> End Consumer</label>
	                <label><input type="checkbox" name="buy[]" value="Retailer"> Retailer</label>
	                <label><input type="checkbox" name="buy[]" value="Wholesaler"> Wholesaler</label>
	                <label><input type="checkbox" name="buy[]" value="Supplier"> Supplier</label>
	                <label><input type="checkbox" name="buy[]" value="Commission Agent">Commission Agent</label>
	                <label><input type="checkbox" name="buy[]" value="Distributer">Distributer</label>
	                <label><input type="checkbox" name="buy[]" value="Trader">Trader</label>
	                <label><input type="checkbox" name="buy[]" value="Exporter">Exporter</label>
                    <label><input type="checkbox" name="buy[]" value="Job Work">Job Work</label>
	                <label><input type="checkbox" name="buy[]" value="Importer">Importer</label>
	                <label><input type="checkbox" name="buy[]" value="Manufacturer">Manufacturer</label>
	                <label><input type="checkbox" name="buy[]" value="Third Party Manufacturer">Third Party Manufacturer</label>
	                <label><input type="checkbox" name="buy[]" value="Own Branded Manufacturer">Own Branded Manufacturer</label>
			    </div>
			</div><br><hr>
			
			</div>
			<h6 class="mb-3"><mark>Follow-up Details</mark></h6>
			<div class="row">
				<div class="col-sm-4">
					<input type="text" class="form-control" name="data_source" placeholder="Data Source Link" >
				</div>
				<div class="col-sm-12 col-md-4">
					<select   name="status" class="form-control">
					    <option value="F.N.C">F.N.C</option>
	                    <option value="C.B">C.B</option>
	                    <option value="C.B Flps">C.B Flps</option>
	                    <option value="F DMU">F DMU</option>
	                    <option value="Dmu Flps">Dmu Flps</option>
	                    <option value="PG">PG</option>
	                    <option value="P.G Flps">P.G Flps</option>
	                    <option value="Cnvrt">Cnvrt</option>
	                    <option value="NI">NI</option>
	                    <option value="Com. Clsd">Com. Clsd</option>
	                    <option value="W No">W No</option>
	                    <option value="N.T.C">N.T.C</option>
	                    <option value="Ser. Prv">Ser. Prv</option>
	                    
	                    <option value="Touch.c">Touch.c</option>
	                    <option value="Hot.F.C.A">Hot.F.C.A</option>
	                    
	                    <option value="Pick">PicK</option>
	                    <option value="C.By.H">C.By.H</option>
	                    <option value="Drop">Drop</option>
	                    <option value="V.Buy.Lead">V.Buy.Lead</option>
	                  </select><br>
			    </div>
			    <div class="col-sm-12 col-md-12">
			        <label>Next Follow Up Timing </label>
					<input class="form-control"  type="datetime-local" id="meeting-time"
								       name="next_followup" value="0000-00-0000:00"
								       min="2018-06-07T00:00" max="2022-06-14T00:00">
			    </div>
			    
				<div class="col-sm-12">
					<br>
					<label>Conversation Details</label>
					<textarea rows="4" cols="100" class="form-control" name="conversation_details"></textarea><br>
				</div>
				<div class="col-sm-12 col-md-4">
					<select   name="online_demo" class="form-control">
						<option value="Online Demo">Online Demo</option>
	                    <option value="Done">Done</option>
	                    <option value="Not Done"> Not Done</option>
	                </select>
			    </div>
			    <div class="col-sm-12 col-md-4">
					<select   name="executive_feedback" class="form-control">
						<option value="Exective Feedback">Exective Feedback For Customer</option>
	                    <option value="Nothing">Nothing</option>
	                    <option value="Average">Average</option>
	                    <option value="Bad">Bad</option>
	                    <option value="Very Bad">Very Bad</option>
	                    <option value="Good">Good</option>
	                    <option value="Very Good">Very Good</option>
	                    <option value="Awesome">Awesome</option>
	                </select><br>
			    </div>
				
			</div>
			
            <h6 class="mb-3"><mark>Work On Profile For Client Connectivity</mark></h6>
			<div class="row">
				<div class="col-sm-4">
					<input type="text" class="form-control" name="propsal_name" placeholder="Email-Propsal Name/Price" >
				</div>
				<div class="col-sm-12 col-md-4">
					<select   name="product_img" class="form-control">
						<option value="Products Images Up load">Products Images Upload By</option>
	                    <option value="Client Side">Client Side</option>
	                    <option value="Employee Side">Employee Side</option>
	                    <option value="Note Done">Note Done</option>
	                    
	                </select>
			    </div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="fp_user_id" placeholder="FP. User ID" ><br>
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="fp_psw" placeholder=" FP .Password" ><br>
				</div>

				<div class="col-sm-4">
					<input type="text" class="form-control" name="bwt_catalog_link" placeholder="BWT Catalog Link " ><br>
				</div>
				
				<div class="col-sm-4">
					<input type="text" class="form-control" name="executive_name" placeholder="Executive Name" ><br>
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="tl_manager_name" placeholder="TL Manger Follower Name" ><br>
				</div>
			

			    <div class="col-sm-12 col-md-4">
                	
				     <input type="text" class="form-control" name="user_fp_link" placeholder="Whats Up Client Connectivity" >
			    </div>

			    <div class="col-sm-12 col-md-4">
                	
				     <input type="text" class="form-control" name="visitors_coun" placeholder="Visitors Count" >
			    </div>

			    <div class="col-sm-12 col-md-4">
                	
				     <input type="text" class="form-control" name="inquery_send" placeholder="Inquery Send" ><br>
			    </div>
			    <div class="col-sm-12 col-md-4">
                	
				     <input type="text" class="form-control" name="verify_buy_lead" placeholder="Verify Buy Lead" >
			    </div>
			    <div class="col-sm-12 col-md-4">
                	
				     <input type="text" class="form-control" name="ratiing" placeholder="Customer Rating For Executive 1* to 10*" >
			    </div>
			    <div class="col-sm-12 col-md-4">
                	
				     <input type="text" class="form-control" name="convert_rs" placeholder="Convert Rs.( Sale Flash )" ><br>
			    </div>
				 
				
			</div>
			

			<h6 class="mb-3"><mark>Company Documents</mark></h6>
			<div class="row">
				<div class="col-sm-4">
					<input type="text" class="form-control" name="gst_no" placeholder="Company GST No.">
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="pan_no" placeholder="PAN No." >
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="tan_no" placeholder="Tan No." ><br>
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="cin_no" placeholder="CIN No.">
				</div>

				<div class="col-sm-4">
					<input type="text" class="form-control" name="bank_name" placeholder="Bank Name" >
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="account_type" placeholder="Account Type" ><br>
				</div>
				
			</div>

			<h6 class="mb-3"><mark>Optional Documents</mark></h6>
			<div class="row">
				<div class="col-sm-4">
				    <select   name="adhar_no" class="form-control">
				        <option value="NA">Adhar Udhyog</option>
						<option value="Didn't ask">Didn't ask</option>
						<option value="I Have">I Have</option>
	                    <option value="Don’t Have">Don’t Have</option>
	                    <option value="No Need">No Need</option>
	                    
	                    <option value="Not Apply Yet">Not Apply Yet</option>
	                    <option value="Under process">Under process</option>
	                </select>
	           	</div>
				<div class="col-sm-4">
					<select   name="fssai" class="form-control">
					    <option value="NA ">FSSAI </option>
						<option value="Didn't ask">Didn't ask</option>
						<option value="I Have">I Have</option>
	                    <option value="Don’t Have">Don’t Have</option>
	                    <option value="No Need">No Need</option>
	                    
	                    <option value="Not Apply Yet">Not Apply Yet</option>
	                    <option value="Under process">Under process</option>
	                </select>
				</div>
				<div class="col-sm-4">
				    <select   name="lab_testing_report" class="form-control">
					    <option value="NA ">Lab Testing Report </option>
						<option value="Didn't ask">Didn't ask</option>
						<option value="I Have">I Have</option>
	                    <option value="Don’t Have">Don’t Have</option>
	                    <option value="No Need">No Need</option>
	                    
	                    <option value="Not Apply Yet">Not Apply Yet</option>
	                    <option value="Under process">Under process</option>
	                </select>
					<br>
				</div>

				<div class="col-sm-4">
				    <select   name="export_licence" class="form-control">
					    <option value="NA ">Export Licence  </option>
						<option value="Didn't ask">Didn't ask</option>
						<option value="I Have">I Have</option>
	                    <option value="Don’t Have">Don’t Have</option>
	                    <option value="No Need">No Need</option>
	                    
	                    <option value="Not Apply Yet">Not Apply Yet</option>
	                    <option value="Under process">Under process</option>
	                </select>
				<br>
				</div>
				<div class="col-sm-12">
					<input type="submit" class=" btn btn-secondary block-btn form-control">
				</div>
			</div>
			

			
		</form>
	</div>
</section>

<!-- <div class="container">
	<form method="POST" action="{{ url('data') }}">
		@csrf
		<div class="row">
			<div class="col-sm-12 col-md-4">
				<input type="text" class="form-control" name="name" placeholder="Enter your Name">
			</div>
			
			<div class="col-sm-12 col-md-4">
				<select  id="country-dd" name="category" class="form-control">
                    <option value="">Select Country</option>
                    @foreach ($countries as $data)
                    <option value="{{$data->id}}">
                        {{$data->name}}
                    </option>
                    @endforeach
                </select>
			</div>
			<div class="col-sm-12 col-md-4">
				<input type="submit" class="form-control">
			</div>

		</div>	
	</form>
</div> -->

@endsection

