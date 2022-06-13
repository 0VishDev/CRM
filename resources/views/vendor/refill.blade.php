@extends('layouts.master')
@section('content')
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-md-6">
							<h3 class="text-left">ReFill Company Information</h3><br>
						</div>
						<div class="col-sm-12 col-md-6">
							<a  type="btn" class="btn-custom float-right" href="{{ url('filter-data') }}"> Back</a>
						</div>
					</div>
				</div>
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
		<form class="form" action="{{url('/refill-data/'.$refill->uuid) }}" method="post">
			@csrf
			<h6><mark>Company Profile</mark></h6><br>
			<div class="row">
                <div class="col-sm-12 col-md-4">
                	<label>Company Register Date</label>
				     <input type="date" class="form-control" name="com_reg_date" placeholder="Company Register Date" value="{{ $refill->com_reg_date }}">
			    </div>
			     

			    <div class="col-sm-12 col-md-8">
                	<label>Profile Register By</label>
				     <input type="text" class="form-control" name="reg_by" placeholder="Profile Register By" value="{{ $refill->reg_by }}">
			    </div>

           </div><br><hr>
           
           <h6 class="mb-3"><mark>Start Call From ( Purpose Of Registration )</mark></h6>
			<div class="row">
				<div class="col-sm-4">

					<select   name="buy_sell" class="form-control">
					
	                    <option 
	                    <?php
				    		if($refill->buy_sell == 'Buyer')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Buyer</option>
	                    <option 
	                    <?php
				    		if($refill->buy_sell == 'Seller')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Seller</option>
	                    
	                    <option 
	                    <?php
				    		if($refill->buy_sell == 'Buy and Sell')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >Buy and Sell</option>
	                    
	                </select>
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="major_product" placeholder="Major Product Name & Other Products" value="{{ $refill->major_product }}">
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="min_to_max" placeholder="Minimum Quantity To Maximum Quantity" value="{{ $refill->min_to_max }}"><br>
				</div>

				<div class="col-sm-12 col-md-4">
					<select   name="req_frequ" class="form-control">
						<option value="Requirement Frequency">Requirement Frequency</option>
						<option
	                    <?php
				    		if($refill->req_frequ == 'Regular')
				    		{
				    			echo "selected";
				    		} 
				    	?>  
	                    >Regular</option>
	                    <option
	                    <?php
				    		if($refill->req_frequ == 'Daily')
				    		{
				    			echo "selected";
				    		} 
				    	?>  
	                    >Daily</option>
	                    <option
	                    <?php
				    		if($refill->req_frequ == 'Weekly')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Weekly</option>
	                    <option
	                    <?php
				    		if($refill->req_frequ == 'Monthly')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Monthly</option>
	                    <option
	                    <?php
				    		if($refill->req_frequ == 'Half Yearly')
				    		{
				    			echo "selected";
				    		} 
				    	?>  
	                    >Half Yearly</option>
	                    <option
	                    <?php
				    		if($refill->req_frequ == 'Yearly')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Yearly</option>
	                    <option
	                    <?php
				    		if($refill->req_frequ == 'As Per Demand & Supply')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >As Per Demand & Supply</option>
	                </select>
			    </div>
			    <div class="col-sm-12 col-md-4">
					
                      <input type="text" class="form-control" placeholder="Product :- Quality / Size / Specification" name="quality_size_speci" value="{{ $refill->quality_size_speci }}">
			    </div>
			    <div class="col-sm-12 col-md-4">
					<select   name="purpose_of_req" class="form-control">
						<option value="Purpose Of Requirement">Purpose Of Requirement</option>
	                    <option
	                    <?php
				    		if($refill->purpose_of_req == 'End Use')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    > End Use</option>
	                    <option
	                    <?php
				    		if($refill->purpose_of_req == 'Resale')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Resale</option>
	                    <option
	                    <?php
				    		if($refill->purpose_of_req == 'Trading')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Trading</option>
	                    <option
	                    <?php
				    		if($refill->purpose_of_req == 'Export')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Export</option>
	                    <option
	                    <?php
				    		if($refill->purpose_of_req == 'Import')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Import</option>
	                    
	                    <option
	                    <?php
				    		if($refill->purpose_of_req == 'Use as a Raw Material')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Use as a Raw Material</option>
	                    <option
	                    <?php
				    		if($refill->purpose_of_req == 'Business Expansion')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Business Expansion</option>
	                 </select><br>
			    </div>

				<div class="col-sm-4">
					<input type="text" class="form-control" name="packaging_size" placeholder="Packaging Size (As Per Client Demand)" value="{{ $refill->packaging_size }}"><br>
				</div>

				<div class="col-sm-12 col-md-4">
					<select   name="delivery_place" class="form-control">
						<option value="Delivery Place">Delivery Place</option>
	                    <option
	                    <?php
				    		if($refill->delivery_place == 'Locally')
				    		{
				    			echo "selected";
				    		} 
				    	?>  
	                    > Locally</option>
	                    <option
	                    <?php
				    		if($refill->delivery_place == 'City')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >City</option>
	                    <option
	                    <?php
				    		if($refill->delivery_place == 'State')
				    		{
				    			echo "selected";
				    		} 
				    	?>  
	                    > State</option>
	                    <option
	                    <?php
				    		if($refill->delivery_place == 'Pan India')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Pan India</option>
	                    <option
	                    <?php
				    		if($refill->delivery_place == 'Globally')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Globally</option>
	                    <option
	                    <?php
				    		if($refill->delivery_place == 'As Per Demand & Supply')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >As Per Demand & Supply</option>
	                 </select>
			    </div>

			    <div class="col-sm-12 col-md-4">
					<select   name="tar_of_busi_area" class="form-control">
						<option value="Target of Business Area">Prefured Location</option>
	                    <option
	                    <?php
				    		if($refill->tar_of_busi_area == 'Locally')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    > Locally</option>
	                    <option 
	                    <?php
				    		if($refill->tar_of_busi_area == 'City')
				    		{
				    			echo "selected";
				    		} 
				    	?>
				    	>City</option>
	                    <option
	                    <?php
				    		if($refill->tar_of_busi_area == 'State')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    > State</option>
	                    <option
	                    <?php
				    		if($refill->tar_of_busi_area == 'Pan India')
				    		{
				    			echo "selected";
				    		} 
				    	?>  
	                    >Pan India</option>
	                    <option 
	                    <?php
				    		if($refill->tar_of_busi_area == 'Globally')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Globally</option>
	                    <option
	                    <?php
				    		if($refill->tar_of_busi_area == 'As Per Demand & Supply')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >As Per Demand & Supply</option>
	                    
	                 </select>
			    </div>

			    <div class="col-sm-12 col-md-12">
				    <label >Payment Term</label><br>
	                <label><input type="checkbox" name="paymentterm[]" value="100% Advance"
	                <?php
	                if(isset($forpaymentterm[0]) && !empty($forpaymentterm[0]))
	                {
                        if(in_array("100% Advance",$forpaymentterm[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                > 100% Advance</label>
	                <label><input type="checkbox" name="paymentterm[]" value="50% Advance & 50%  LR Copy" 
	                <?php
	                if(isset($forpaymentterm[0][0]) && !empty($forpaymentterm[0][0]))
	                {
                        if(in_array("50% Advance & 50%  LR Copy",$forpaymentterm[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                > 50% Advance & 50%  LR Copy</label>
	                 <label><input type="checkbox" name="paymentterm[]" value="Token Booking Ammount"
	                 <?php
	                 if(isset($forpaymentterm[0][0]) && !empty($forpaymentterm[0][0]))
	                 {
                        if(in_array("Token Booking Ammount",$forpaymentterm[0]))
				    		{
				    			echo "checked";
				    		} 
	                 }
                        ?>
	                 > Token Booking Ammount</label>
	                <label><input type="checkbox" name="paymentterm[]" value="Cash On Carry"
	                <?php
	                if(isset($forpaymentterm[0][0]) && !empty($forpaymentterm[0][0]))
	                {
                        if(in_array("Cash On Carry",$forpaymentterm[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                > Cash On Carry</label>
	                <label><input type="checkbox" name="paymentterm[]" value="50% Advance & 50%  Unloading" 
	                <?php
	                if(isset($forpaymentterm[0][0]) && !empty($forpaymentterm[0][0]))
	                {
                        if(in_array("50% Advance & 50%  Unloading",$forpaymentterm[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                > 50% Advance & 50%  Unloading</label>
	                <label><input type="checkbox" name="paymentterm[]" value="Credit" 
	                <?php
	                if(isset($forpaymentterm[0][0]) && !empty($forpaymentterm[0][0]))
	                {
                        if(in_array("Credit",$forpaymentterm[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                > Credit</label>
	                <label><input type="checkbox" name="paymentterm[]" value="L.C" 
	                <?php
	                if(isset($forpaymentterm[0][0]) && !empty($forpaymentterm[0][0]))
	                {
                        if(in_array("L.C",$forpaymentterm[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                > L.C</label>
	                <label><input type="checkbox" name="paymentterm[]" value="Bank Gaurantee"
	                <?php
	                if(isset($forpaymentterm[0][0]) && !empty($forpaymentterm[0][0]))
	                {
                        if(in_array("Bank Gaurantee",$forpaymentterm[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                > Bank Gaurantee</label>
	                
	                <label><input type="checkbox" name="paymentterm[]" value="C.I.F" 
	                <?php
	                if(isset($forpaymentterm[0][0]) && !empty($forpaymentterm[0][0]))
	                {
                        if(in_array("C.I.F",$forpaymentterm[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
	                ?>
	                > C.I.F</label>
	                <label><input type="checkbox" name="paymentterm[]" value="C.N.F"
	                <?php
	                if(isset($forpaymentterm[0][0]) && !empty($forpaymentterm[0][0]))
	                {
                        if(in_array("C.N.F",$forpaymentterm[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                > C.N.F</label>
	                <label><input type="checkbox" name="paymentterm[]" value="F.O.B" 
	                <?php
	                if(isset($forpaymentterm[0][0]) && !empty($forpaymentterm[0][0]))
	                {
                        if(in_array("F.O.B",$forpaymentterm[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                > F.O.B</label>
	                <label><input type="checkbox" name="paymentterm[]" value="F.O.R"
	                <?php
	                if(isset($forpaymentterm[0][0]) && !empty($forpaymentterm[0][0]))
	                {
                        if(in_array("F.O.R",$forpaymentterm[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                >F.O.R</label>
	                 <label><input type="checkbox" name="paymentterm[]" value="Cash On Delivery" 
	                 <?php
	                 if(isset($forpaymentterm[0][0]) && !empty($forpaymentterm[0][0]))
	                 {
                        if(in_array("Cash On Delivery",$forpaymentterm[0]))
				    		{
				    			echo "checked";
				    		} 
	                 }
                        ?>
	                 > Cash On Delivery</label>
	                <label><input type="checkbox" name="paymentterm[]" value="Export Bill Discounting"
	                <?php
	                if(isset($forpaymentterm[0][0]) && !empty($forpaymentterm[0][0]))
	                {
                        if(in_array("Export Bill Discounting",$forpaymentterm[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                > Export Bill Discounting</label>
	                 
	            </div>
			    
			    <div class="col-sm-12 col-md-4">
					<select   name="req_urgen" class="form-control">
						<option value="Requirement Urgency">Requirement Urgency</option>
						<option
	                    <?php
				    		if($refill->req_urgen == 'Immediately')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Immediately</option>
	                    <option
	                    <?php
				    		if($refill->req_urgen == 'Daily')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Daily</option>
	                    <option
	                    <?php
				    		if($refill->req_urgen == 'Weekly')
				    		{
				    			echo "selected";
				    		} 
				    	?>  
	                    >Weekly</option>
	                    <option
	                    <?php
				    		if($refill->req_urgen == 'Monthly')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Monthly</option>
	                    <option
	                     <?php
				    		if($refill->req_urgen == 'Yearly')
				    		{
				    			echo "selected";
				    		} 
				    	?>  
	                    >Yearly</option>
	                    <option
	                     <?php
				    		if($refill->req_urgen == 'As Per Demand & Supply')
				    		{
				    			echo "selected";
				    		} 
				    	?>  
	                    >As Per Demand & Supply</option>
	                 </select><br>
			    </div>
			    
			</div>
			
			<h6 class="mb-3"><mark>Previous Marketing Source </mark></h6>
			<div class="row">
				<div class="col-sm-4">
					<input type="text" class="form-control" name="website_link" placeholder="Website Link" value="{{ $refill->website_url }}">
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="other_investment" placeholder="Othe Investments For Marketing Online/Offline" value="{{ $refill->other_investment }}">
				</div>
				<div class="col-sm-4">
					<select   name="response" class="form-control">
						<option value="Response">Response</option>
						<option
						<?php
				    		if($refill->response == 'Nothing')
				    		{
				    			echo "selected";
				    		} 
				    	?>  
						>Nothing</option>
	                    <option
	                    <?php
				    		if($refill->response == 'Positive')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Positive</option>
	                    <option
	                    <?php
				    		if($refill->response == 'Negative')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Negative</option>
	                 </select><br>
				</div>
			</div>
			 
			<h6 class="mb-3"><mark>Customer Contact Details</mark></h6>
			<div class="row">
				<div class="col-sm-4">
					<input type="text" class="form-control" name="cus_name" placeholder="Customer Name" value="{{ $refill->cus_name }}">
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="designation" placeholder="Designation" value="{{ $refill->designation }}">
				</div>
				<div class="col-sm-4">
					<input type="number" class="form-control" name="mobile_no" placeholder="Mobile No." required value="{{ $refill->mobile_no }}"><br>
				</div>

				<div class="col-sm-4">
					<input type="number" class="form-control" name="whats_no" placeholder="Whats App No." value="{{ $refill->whats_no }}"><br>
				</div>

				<div class="col-sm-4">
					<input type="number" class="form-control" name="alternate_no" placeholder="Alternate No." value="{{ $refill->alternate_no }}"><br>
				</div>

				

				<div class="col-sm-4">
					<input type="text" class="form-control" name="email" placeholder="Email Id" value="{{ $refill->email }}">
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="address" placeholder="Address" value="{{ $refill->address }}"><br>
				</div>
			</div>
			
           <h6><mark>Company Details</mark></h6>
			<div class="row">
				
				<div class="col-sm-12 col-md-4">
				     <input type="text" class="form-control" name="company_name" placeholder="Company Name" required value="{{ $refill->company_name }}">
			    </div>
			    <div class="col-sm-12 col-md-4">
				     <input type="text" class="form-control" name="brand_name" placeholder="Brand Name" value="{{ $refill->brand_name }}">
			    </div>
			    <div class="col-sm-12 col-md-4">
				     <input type="number" class="form-control" name="established_year" placeholder=" Year of Established" value="{{ $refill->established_year }}"><br>
			    </div>
			    <div class="crefill->statusol-sm-12 col-md-12">
					<select   name="firm_type" class="form-control" >
						<option value="Firm Type">Select Firm Type</option>
	                    <option
	                    <?php
				    		if($refill->firm_type == 'Proprietorship')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Proprietorship</option>
	                    <option
	                     <?php
				    		if($refill->firm_type == 'Partnership')
				    		{
				    			echo "selected";
				    		} 
				    	?>  
	                    >Partnership</option>
	                    <option
	                    <?php
				    		if($refill->firm_type == 'Pvt Ltd')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Pvt Ltd</option>
	                    <option 
	                    <?php
				    		if($refill->firm_type == 'LLP')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >LLP</option>
	                    <option 
	                     <?php
				    		if($refill->firm_type == 'Public Ltd')
				    		{
				    			echo "selected";
				    		} 
				    	?> 
	                    >Public Ltd</option>
	                    
	                    <option
	                    <?php
				    		if($refill->firm_type == 'Self Use')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >Self Use</option>
	                    <option 
	                    <?php
				    		if($refill->firm_type == 'No company')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    > No company</option>
	                    <option 
	                    <?php
				    		if($refill->firm_type == 'New Company')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >New Company</option>
	                    <option 
	                    <?php
				    		if($refill->firm_type == 'Startup Planing')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >Startup Planing</option>
	                    <option 
	                    <?php
				    		if($refill->firm_type == 'Farmer')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >Farmer</option>
	                </select><br>
			    </div>
                
                
        
			    <div class="col-sm-12 col-md-12">
				    <label ><mark>Nature Of Business</mark></label><br>
	                <label><input type="checkbox" name="category[]" value="End Consumer"
	                <?php
	                        if(isset($check[0][0]) && !empty($check[0][0]))
	                        {
				    		if($check[0][0]=='End Consumer')
				    		{
				    			echo "checked";
				    		} 
				    	}
				    	?>
	                > End Consumer</label>
	                <label><input type="checkbox" name="category[]" value="Retailer" 
	                <?php
	                    if(isset($check[0][0]) && !empty($check[0][0]))
	                    {
                        if(in_array("Retailer",$check[0]))
				    		{
				    			echo "checked";
				    		} 
	                    }
                        ?>
	                > Retailer</label>
	                <label><input type="checkbox" name="category[]" value="Wholesaler" 
	                <?php
	                if(isset($check[0][0]) && !empty($check[0][0]))
	                {
                        if(in_array("Wholesaler",$check[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                > Wholesaler</label>
	                <label><input type="checkbox" name="category[]" value="Supplier"
	                <?php
	                if(isset($check[0][0]) && !empty($check[0][0]))
	                {
                        if(in_array("Supplier",$check[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                > Supplier</label>
	                <label><input type="checkbox" name="category[]" value="Commission Agent"
	                <?php
	                if(isset($check[0][0]) && !empty($check[0][0]))
	                {
                        if(in_array("Commission Agent",$check[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                > Commission Agent</label>
	                <label><input type="checkbox" name="category[]" value="Distributer"
	                <?php
	                if(isset($check[0][0]) && !empty($check[0][0]))
	                {
                        if(in_array("Distributer",$check[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                >Distributer</label>
	                <label><input type="checkbox" name="category[]" value="Trader"
	                <?php
	                if(isset($check[0][0]) && !empty($check[0][0]))
	                {
                        if(in_array("Trader",$check[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                >Trader</label>
	                <label><input type="checkbox" name="category[]" value="Exporter"
	                <?php
	                if(isset($check[0][0]) && !empty($check[0][0]))
	                {
                        if(in_array("Exporter",$check[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                >Exporter</label>

	                <label><input type="checkbox" name="category[]" value="Importer"
	                <?php
	                if(isset($check[0][0]) && !empty($check[0][0]))
	                {
                        if(in_array("Importer",$check[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                >Importer</label>
	                <label><input type="checkbox" name="category[]" value="Manufacturer"
	                <?php
	                if(isset($check[0][0]) && !empty($check[0][0]))
	                {
                        if(in_array("Manufacturer",$check[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                >Manufacturer</label>
	                <label><input type="checkbox" name="category[]" value="Third Party Manufacturer"
	                <?php
	                if(isset($check[0][0]) && !empty($check[0][0]))
	                {
                        if(in_array("Third Party Manufacturer",$check[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                >Third Party Manufacturer</label>
	                <label><input type="checkbox" name="category[]" value="Own Branded Manufacturer"
	                <?php
	                if(isset($check[0][0]) && !empty($check[0][0]))
	                {
                        if(in_array("Own Branded Manufacturer",$check[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                >Own Branded Manufacturer</label>
	                
	                <label><input type="checkbox" name="category[]" value="Farmer"
	                <?php
	                if(isset($check[0][0]) && !empty($check[0][0]))
	                {
                        if(in_array("Farmer",$check[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                >Farmer</label>
				</div> 
			</div>
            <br>
            <input type="button" value="Show/Hide" onClick="showHideDiv('divMsg')"/><br><br>
                <div id="divMsg" style="display:none">
                    <div class="row">
				
			    <div class="col-sm-12 col-md-12">
					
	                <label ><mark>For Sell (Dealing With This Type of Buyer)</mark></label><br>
	                <label><input type="checkbox" name="sale[]" value="End Consumer"
	                <?php
	                if(isset($forsale[0][0]) && !empty($forsale[0][0]))
	                {
                        if(in_array("End Consumer",$forsale[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                > End Consumer</label>
	                <label><input type="checkbox" name="sale[]" value="Retailer"
	                <?php
	                if(isset($forsale[0][0]) && !empty($forsale[0][0]))
	                {
                        if(in_array("Retailer",$forsale[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                > Retailer</label>
	                <label><input type="checkbox" name="sale[]" value="Wholesaler"
	                <?php
	                if(isset($forsale[0][0]) && !empty($forsale[0][0]))
	                {
                        if(in_array("Wholesaler",$forsale[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                > Wholesaler</label>
	                <label><input type="checkbox" name="sale[]" value="Supplier"
	                <?php
	                if(isset($forsale[0][0]) && !empty($forsale[0][0]))
	                {
                        if(in_array("Supplier",$forsale[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                > Supplier</label>
	                <label><input type="checkbox" name="sale[]" value="Commission Agent"
	                <?php
	                if(isset($forsale[0][0]) && !empty($forsale[0][0]))
	                {
                        if(in_array("Commission Agent",$forsale[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                >Commission Agent</label>
	                <label><input type="checkbox" name="sale[]" value="Distributer"
	                <?php
	                if(isset($forsale[0][0]) && !empty($forsale[0][0]))
	                {
                        if(in_array("Distributer",$forsale[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                >Distributer</label>
	                <label><input type="checkbox" name="sale[]" value="Trader" 
	                <?php
	                if(isset($forsale[0][0]) && !empty($forsale[0][0]))
	                {
                        if(in_array("Trader",$forsale[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                >Trader</label>
	                <label><input type="checkbox" name="sale[]" value="Exporter"
	                <?php
	                if(isset($forsale[0][0]) && !empty($forsale[0][0]))
	                {
                        if(in_array("Exporter",$forsale[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                >Exporter</label>
                    <label><input type="checkbox" name="sale[]" value="Job Work"
                    <?php
                    if(isset($forsale[0][0]) && !empty($forsale[0][0]))
                    {
                        if(in_array("Job Work",$forsale[0]))
				    		{
				    			echo "checked";
				    		} 
                    }
                        ?>
                    >Job Work</label>
	                <label><input type="checkbox" name="sale[]" value="Importer"
	                <?php
	                if(isset($forsale[0][0]) && !empty($forsale[0][0]))
	                {
                        if(in_array("Importer",$forsale[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                >Importer</label>
	                <label><input type="checkbox" name="sale[]" value="Manufacturer"
	                <?php
	                if(isset($forsale[0][0]) && !empty($forsale[0][0]))
	                {
                        if(in_array("Manufacturer",$forsale[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                >Manufacturer</label>
	                <label><input type="checkbox" name="sale[]" value="Third Party Manufacturer"
	                <?php
	                if(isset($forsale[0][0]) && !empty($forsale[0][0]))
	                {
                        if(in_array("Third Party Manufacturer",$forsale[0]))
				    		{
				    			echo "checked";
				    		} 
	                }
                        ?>
	                >Third Party Manufacturer</label>
	                <label><input type="checkbox" name="sale[]" value="Own Branded Manufacturer"
	                <?php
	                if(isset($forsale[0][0]) && !empty($forsale[0][0]))
	                {
                        if(in_array("Own Branded Manufacturer",$forsale[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                >Own Branded Manufacturer</label>
			    </div>

			    <div class="col-sm-12 col-md-12"><br>
					
	                <label ><mark>For Buy (Dealing With This Type of Supplier )</mark></label><br>
	                <label><input type="checkbox" name="buy[]" value="End Consumer"
	                <?php
	                if(isset($buy[0][0]) && !empty($buy[0][0]))
	                {
                        if(in_array("End Consumer",$buy[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                > End Consumer</label>
	                <label><input type="checkbox" name="buy[]" value="Retailer"
	                <?php
	                if(isset($buy[0][0]) && !empty($buy[0][0]))
	                {
                        if(in_array("Retailer",$buy[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                > Retailer</label>
	                <label><input type="checkbox" name="buy[]" value="Wholesaler"
	                <?php
	                if(isset($buy[0][0]) && !empty($buy[0][0]))
	                {
                        if(in_array("Wholesaler",$buy[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                > Wholesaler</label>
	                <label><input type="checkbox" name="buy[]" value="Supplier" 
	                <?php
	                if(isset($buy[0][0]) && !empty($buy[0][0]))
	                {
                        if(in_array("Supplier",$buy[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                > Supplier</label>
	                <label><input type="checkbox" name="buy[]" value="Commission Agent"
	                <?php
	                if(isset($buy[0][0]) && !empty($buy[0][0]))
	                {
                        if(in_array("Commission Agent",$buy[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                >Commission Agent</label>
	                <label><input type="checkbox" name="buy[]" value="Distributer" 
	                <?php
	                if(isset($buy[0][0]) && !empty($buy[0][0]))
	                {
                        if(in_array("Distributer",$buy[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                >Distributer</label>
	                <label><input type="checkbox" name="buy[]" value="Trader" 
	                <?php
	                if(isset($buy[0][0]) && !empty($buy[0][0]))
	                {
                        if(in_array("Trader",$buy[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                >Trader</label>
	                <label><input type="checkbox" name="buy[]" value="Exporter" 
	                <?php
	                if(isset($buy[0][0]) && !empty($buy[0][0]))
	                {
                        if(in_array("Exporter",$buy[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                >Exporter</label>
                    <label><input type="checkbox" name="buy[]" value="Job Work" 
                    <?php
	                if(isset($buy[0][0]) && !empty($buy[0][0]))
	                {
                        if(in_array("Job Work",$buy[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
                    >Job Work</label>
	                <label><input type="checkbox" name="buy[]" value="Importer" 
	                <?php
	                if(isset($buy[0][0]) && !empty($buy[0][0]))
	                {
                        if(in_array("Importer",$buy[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                >Importer</label>
	                <label><input type="checkbox" name="buy[]" value="Manufacturer"
	                <?php
	                if(isset($buy[0][0]) && !empty($buy[0][0]))
	                {
                        if(in_array("Manufacturer",$buy[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                >Manufacturer</label>
	                <label><input type="checkbox" name="buy[]" value="Third Party Manufacturer"
	                <?php
	                if(isset($buy[0][0]) && !empty($buy[0][0]))
	                {
                        if(in_array("Third Party Manufacturer",$buy[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                >Third Party Manufacturer</label>
	                <label><input type="checkbox" name="buy[]" value="Own Branded Manufacturer"
	                <?php
	                if(isset($buy[0][0]) && !empty($buy[0][0]))
	                {
                        if(in_array("Own Branded Manufacturer",$buy[0]))
				    		{
				    			echo "checked";
				    		}
	                }
                        ?>
	                >Own Branded Manufacturer</label>
			    </div>
			</div><br><hr>
                </div>
			
			
			
           <h6 class="mb-3"><mark>Follow-up Details</mark></h6>
			<div class="row">
				<div class="col-sm-4">
					<input type="text" class="form-control" name="data_source" placeholder="Data Source Link" value="{{ $refill->data_source }}">
				</div>
				<div class="col-sm-12 col-md-4">
					<select class="form-control" name="status">
							    		<option 
							    		<?php
							    		if($refill->status == 'F.N.C')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
							    		>F.N.C</option>
								    	<option 
								    	<?php
							    		if($refill->status == 'C.B')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
							    	     >C.B</option>
							    	     <option 
								    	<?php
							    		if($refill->status == 'C.B Flps')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
							    	     >C.B Flps</option>
								    	<option 
								    	<?php
							    		if($refill->status == 'F DMU')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>F DMU</option>
								    	
								    	<option 
								    	<?php
							    		if($refill->status == 'Dmu Flps')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>Dmu Flps</option>
								    	
								    	<option 
								    	<?php
							    		if($refill->status == 'PG')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>PG</option>
								    	<option 
								    	<?php
							    		if($refill->status == 'P.G Flps')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>P.G Flps</option>
								    	<option
								    	<?php
							    		if($refill->status == 'Cnvrt')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>  
								    	>Cnvrt</option>
								    	<option 
								    	<?php
							    		if($refill->status == 'NI')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>NI</option>
								    	
								    	<option 
								    	<?php
							    		if($refill->status == 'Dmu Ni')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>Dmu Ni</option>
								    	
								    	<option 
								    	<?php
							    		if($refill->status == 'Pg Ni')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>Pg Ni</option>
								    	
								    	<option 
								    	<?php
							    		if($refill->status == 'Com. Clsd')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>Com. Clsd</option>
								    	<option
								    	<?php
							    		if($refill->status == 'W No')
							    		{
							    			echo "selected";
							    		} 
							    		 ?> 
								    	>W No</option>
								    	<option 
								    	<?php
							    		if($refill->status == 'N.T.C')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>N.T.C</option>
								    	<option 
								    	<?php
							    		if($refill->status == 'Ser. Prv')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>Ser. Prv</option>
								    	
								    	<option 
								    	<?php
							    		if($refill->status == 'Lang.B')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>Lang.B</option>
								    	<option 
								    	<?php
							    		if($refill->status == 'Touch.c')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>Touch.c</option>
								    	
								    	<option 
								    	<?php
							    		if($refill->status == 'Hot.F.C.A')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>
								    	>Hot.F.C.A</option>
								    	
								    	<option
								    	<?php
    							    		if($refill->status == 'P1')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>  
								    	>P1</option>

								    	<option
								    	<?php
							    		if($refill->status == 'Pick')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>  
								    	>Pick</option>
								    	
								    	<option
								    	<?php
							    		if($refill->status == 'C.By.H')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>  
								    	>C.By.H</option>
								    	<option
								    	<?php
							    		if($refill->status == 'Drop')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>  
								    	>Drop</option>
								    	
								    	<option
								    	<?php
							    		if($refill->status == 'Sr.B')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>  
								    	>Sr.B</option>
								    	<option
								    	<?php
							    		if($refill->status == 'Sr.A')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>  
								    	>Sr.A</option>
								    	
								    	<option
								    	<?php
							    		if($refill->status == 'V.Buy.Lead')
							    		{
							    			echo "selected";
							    		} 
							    		 ?>  
								    	>V.Buy.Lead</option>
							    	</select>
			    </div>
			                      <div class="col-sm-12 col-md-12">
							    	<label>Next Follow Up Timing </label>
								    
								     <input class="form-control" value="{{ $refill->next_call_timing }}" type="datetime-local" id="meeting-time"
								       name="next_followup" value="0000-00-0000:00"
								       min="2018-06-07T00:00" max="2022-06-14T00:00">

							    </div>
				<div class="col-sm-12"><br>
                				<label>Conversation Details</label>
                					<input type="text" class="form-control" name="conversation_details" placeholder="Conversation Details" ><br>
                				</div>
                				<div class="col-sm-12"><br>
                				<label>Old Conversation Details</label>
                					<textarea class="form-control" readonly name="oldconversion" rows="4" cols="80">{{ $refill->conversation_details }}</textarea><br>
                				</div>
                				<div class="col-sm-12 col-md-12">
                			    	
                				    <input type="hidden"  value="<?php echo date('Y-m-d'); ?>"  name="contdt" class="form-control"  readonly/><br>
                			    </div>
				<div class="col-sm-12 col-md-4">
					<select   name="online_demo" class="form-control">
						<option value="Online Demo">Online Demo</option>
	                    <option
	                    <?php
						   if($refill->online_demo == 'Done')
						   {
						   	echo "selected";
						   } 
						 ?>  
	                    >Done</option>
	                    <option
	                    <?php
						   if($refill->online_demo == 'Not Done')
						   {
						   	echo "selected";
						   } 
						 ?> 
	                    > Not Done</option>
	                </select>
			    </div>
			    <div class="col-sm-12 col-md-4">
					<select   name="executive_feedback" class="form-control">
						<option value="Exective Feedback">Exective Feedback</option>
	                    <option
	                    <?php
						   if($refill->executive_feedback == 'executive_feedback')
						   {
						   	echo "selected";
						   } 
						 ?> 
	                    >Nothing</option>
	                    <option
	                    <?php
						   if($refill->executive_feedback == 'Average')
						   {
						   	echo "selected";
						   } 
						 ?>  
	                    >Average</option>
	                    <option
	                    <?php
						   if($refill->executive_feedback == 'Bad')
						   {
						   	echo "selected";
						   } 
						 ?> 
	                    >Bad</option>
	                    <option
	                    <?php
						   if($refill->executive_feedback == 'Very Bad')
						   {
						   	echo "selected";
						   } 
						 ?> 
	                    >Very Bad</option>
	                    <option
	                    <?php
						   if($refill->executive_feedback == 'Good')
						   {
						   	echo "selected";
						   } 
						 ?> 
	                    >Good</option>
	                    <option
	                    <?php
						   if($refill->executive_feedback == 'Very Good')
						   {
						   	echo "selected";
						   } 
						 ?> 
	                    >Very Good</option>
	                    <option 
	                    <?php
						   if($refill->executive_feedback == 'Awesome')
						   {
						   	echo "selected";
						   } 
						 ?> 
	                    >Awesome</option>
	                </select><br>
			    </div>
				
			</div>
			
			<h6 class="mb-3"><mark>Work On Profile For Client Connectivity</mark></h6>
			<div class="row">
				<div class="col-sm-4">
					<input type="text" class="form-control" name="propsal_name" placeholder="Email-Propsal Name/Price" value="{{ $refill->propsal_name }}">
				</div>
				<div class="col-sm-12 col-md-4">
					<select   name="product_img" class="form-control">
						<option value="Products Images Up load">Products Images Up load</option>
	                    <option
	                    <?php
						   if($refill->product_img == 'Client Side')
						   {
						   	echo "selected";
						   } 
						 ?> 
	                    >Client Side</option>
	                    <option
	                    <?php
						   if($refill->product_img == 'Employee Side')
						   {
						   	echo "selected";
						   } 
						 ?> 
	                    >Employee Side</option>
	                    <option
	                     <?php
						   if($refill->product_img == 'Self')
						   {
						   	echo "selected";
						   } 
						 ?> 
	                    >Self</option>
	                </select>
			    </div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="fp_user_id" placeholder="FP. User ID" value="{{ $refill->fp_user_id }}"><br>
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="fp_psw" placeholder=" FP .Password" value="{{ $refill->fp_psw }}"><br>
				</div>

				<div class="col-sm-4">
					<input type="text" class="form-control" name="bwt_catalog_link" placeholder="BWT Catalog Link " value="{{ $refill->bwt_catalog_link }}"><br>
				</div>
				
				<div class="col-sm-4">
					<input type="text" class="form-control" name="executive_name" placeholder="Executive Name" value="{{ $refill->executive_name }}"><br>
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="tl_manager_name" placeholder="TL Manger Follower Name" value="{{ $refill->tl_manager_name }}"><br>
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
					<input type="text" class="form-control" name="gst_no" placeholder="Company GST No." value="{{ $refill->gst_no }}">
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="pan_no" placeholder="PAN No." value="{{ $refill->pan_no }}">
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="tan_no" placeholder="Tan No." value="{{ $refill->tan_no }}"><br>
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="cin_no" placeholder="CIN No." value="{{ $refill->cin_no }}">
				</div>

				<div class="col-sm-4">
					<input type="text" class="form-control" name="bank_name" placeholder="Bank Name" value="{{ $refill->bank_name }}">
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="account_type" placeholder="Account Type" value="{{ $refill->account_type }}"><br>
				</div>
				
			</div>

			<h6 class="mb-3"><mark>Optional Documents</mark></h6>
			<div class="row">
				<div class="col-sm-4">
					<!--<input type="text" class="form-control" name="adhar_no" placeholder="Adhar Udhyog" value="{{ $refill->adhar_no }}">-->
					<select   name="adhar_no" class="form-control">
				        <option 
				        <?php
				    		if($refill->adhar_no == 'Adhar Udhyog')
				    		{
				    			echo "selected";
				    		} 
				    	?>
				        >Adhar Udhyog</option>
						<option
						<?php
				    		if($refill->adhar_no == 'Didnt ask')
				    		{
				    			echo "selected";
				    		} 
				    	?>
						>Didnt ask</option>
						<option 
						<?php
				    		if($refill->adhar_no == 'I Have')
				    		{
				    			echo "selected";
				    		} 
				    	?>
						>I Have</option>
	                    <option 
	                    <?php
				    		if($refill->adhar_no == 'Dont Have')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >Dont Have</option>
	                    <option 
	                    <?php
				    		if($refill->adhar_no == 'No Need')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >No Need</option>
	                    
	                    <option 
	                    <?php
				    		if($refill->adhar_no == 'Not Apply Yet')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >Not Apply Yet</option>
	                    <option 
	                    <?php
				    		if($refill->adhar_no == 'Under process')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >Under process</option>
	                </select>
				</div>
				<div class="col-sm-4">
					<select   name="fssai" class="form-control">
					    <option value="FSSAI">FSSAI</option>
				        <option 
				        <?php
				    		if($refill->fssai == 'Adhar Udhyog')
				    		{
				    			echo "selected";
				    		} 
				    	?>
				        >Adhar Udhyog</option>
						<option
						<?php
				    		if($refill->fssai == 'Didnt ask')
				    		{
				    			echo "selected";
				    		} 
				    	?>
						>Didnt ask</option>
						<option 
						<?php
				    		if($refill->fssai == 'I Have')
				    		{
				    			echo "selected";
				    		} 
				    	?>
						>I Have</option>
	                    <option 
	                    <?php
				    		if($refill->fssai == 'Dont Have')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >Dont Have</option>
	                    <option 
	                    <?php
				    		if($refill->fssai == 'No Need')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >No Need</option>
	                    
	                    <option 
	                    <?php
				    		if($refill->fssai == 'Not Apply Yet')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >Not Apply Yet</option>
	                    <option 
	                    <?php
				    		if($refill->fssai == 'Under process')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >Under process</option>
	                </select>
				</div>
				<div class="col-sm-4">
					<select   name="lab_testing_report" class="form-control">
					    <option value="Lab Testing Report">Lab Testing Report</option>
				        <option 
				        <?php
				    		if($refill->lab_testing_report == 'Adhar Udhyog')
				    		{
				    			echo "selected";
				    		} 
				    	?>
				        >Adhar Udhyog</option>
						<option
						<?php
				    		if($refill->lab_testing_report == 'Didnt ask')
				    		{
				    			echo "selected";
				    		} 
				    	?>
						>Didnt ask</option>
						<option 
						<?php
				    		if($refill->lab_testing_report == 'I Have')
				    		{
				    			echo "selected";
				    		} 
				    	?>
						>I Have</option>
	                    <option 
	                    <?php
				    		if($refill->lab_testing_report == 'Dont Have')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >Dont Have</option>
	                    <option 
	                    <?php
				    		if($refill->lab_testing_report == 'No Need')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >No Need</option>
	                    
	                    <option 
	                    <?php
				    		if($refill->lab_testing_report == 'Not Apply Yet')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >Not Apply Yet</option>
	                    <option 
	                    <?php
				    		if($refill->lab_testing_report == 'Under process')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >Under process</option>
	                </select><br>
				</div>

				<div class="col-sm-4">
					<select   name="export_licence" class="form-control">
					    <option value="Export Licence">Export Licence</option>
				        <option 
				        <?php
				    		if($refill->export_licence == 'Adhar Udhyog')
				    		{
				    			echo "selected";
				    		} 
				    	?>
				        >Adhar Udhyog</option>
						<option
						<?php
				    		if($refill->export_licence == 'Didnt ask')
				    		{
				    			echo "selected";
				    		} 
				    	?>
						>Didnt ask</option>
						<option 
						<?php
				    		if($refill->export_licence == 'I Have')
				    		{
				    			echo "selected";
				    		} 
				    	?>
						>I Have</option>
	                    <option 
	                    <?php
				    		if($refill->export_licence == 'Dont Have')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >Dont Have</option>
	                    <option 
	                    <?php
				    		if($refill->export_licence == 'No Need')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >No Need</option>
	                    
	                    <option 
	                    <?php
				    		if($refill->export_licence == 'Not Apply Yet')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >Not Apply Yet</option>
	                    <option 
	                    <?php
				    		if($refill->export_licence == 'Under process')
				    		{
				    			echo "selected";
				    		} 
				    	?>
	                    >Under process</option>
	                </select><br>
				</div>
				<div class="col-sm-12">
					<input type="submit" class="btn-custom block-btn form-control">
				</div>
			</div>
			

			
		</form>
@endsection