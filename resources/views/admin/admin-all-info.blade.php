@extends('layouts.master-admin')
@section('content')
<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h3 class="text-left">Company Info </h3><br>
			</div>
			<div class="col-sm-12 col-md-6">
				<!--<a  type="btn" class="btn btn-secondary float-right" href="{{ url('admin/all_company_details') }}"> Back</a>-->
			</div>
		</div>
	</div>
 <div class="container">
 	<div class="row">
 		<div class="col-sm-12 col-md-12">
 		
 			
 			<table class="table table-hover">
                @if($showcomment!==0)
                
                @foreach($showcomment as $company)
                <tr>
                    <h6><mark>Company Profile</mark></h6>
                    <!-- <th>Emp Name</th>
                    <td style="color:red;">{{ $company->emp_name }}</td> -->
                    <th><span>1. </span>Comp. Reg. Date</th>
                    <td>{{ $company->com_reg_date }}</td>
                    
                   
                </tr>
                <tr>
                    <th><span>2. </span>Unique Profile Id</th>
                    <td>{{ $company->uuid }}</td>    
                </tr>
                <tr>
                    <th><span>3. </span>Profile Reg. By</th>
                    <td>{{ $company->reg_by }}</td>
                </tr>
                
                
                
                <tr>
                   <th><h6><mark>Company Details</mark></h6></th>
                </tr>
                <tr>
                    <th><span>4. </span>Company Name</th>
                    <td>{{ $company->company_name }}</td>
               </tr>
               <tr>
                    <th><span>5. </span>Brand Name</th>
                    <td>{{ $company->brand_name }}</td>
               </tr>
               <tr>
                    @if(isset($company->established_year))
                    <th><span>6. </span>Established Year</th>
                    <td>{{ 2021-$company->established_year }} Year Old</td>
                    @else
                    <th><span>6. </span>Established Year</th>
                    @endif
                </tr>
                
                <tr>
                    <th><span>7. </span>Firm Type</th>
                    <td>{{ $company->firm_type }}</td>
                </tr>
                <tr>
                    <th><span>. </span>Nature Of Business</th>
                    <td>{{ $company->category }}</td>
                </tr>
                <tr>
                    <th><span>. </span>Status</th>
                    <td>{{ $company->status }}</td>
                </tr>
                <tr>
                    <th><span>8. </span>Sale</th>
                    <td>{{ $company->sale }}</td>
                </tr>
                
                <tr>
                    <th><span>9. </span>Buy (As a Row Material)</th>
                    <td>{{ $company->buy }}</td>
                </tr>
                <tr>
                   <th><h6><mark>Customer Contact Details</mark></h6></th>
                </tr>

                <tr>
                    <th><span>10. </span> Name</th>
                    <td>{{ $company->cus_name }}</td>
                </tr>
                <tr>
                    <th><span>11. </span>Designation</th>
                    <td>{{ $company->designation }}</td>
                </tr>
                <tr>
                    <th><span>12. </span>Mobile No.</th>
                    <td>{{ $company->mobile_no }}</td>
                </tr>
                <tr>
                    <th><span>13. </span>Alternate No.</th>
                    <td>{{ $company->alternate_no }}</td>
                </tr>
                <tr>
                    <th><span>14. </span>Whats App No.</th>
                    <td>{{ $company->whats_up }}</td>
                </tr>
                <tr>
                    <th><span>15. </span>Email</th>
                    <td>{{ $company->email }}</td>
                </tr>
                <tr>
                    <th><span>16. </span>Address</th>
                    <td>{{ $company->address }}</td>
                </tr>
                <tr>
                   <th><h6><mark>Purpose Of Registration</mark></h6></th>
                </tr>

                <tr>
                    <th><span>17. </span>Buy/Sell</th>
                    <td>{{ $company->buy_sell }}</td>
                </tr>
                
                <tr>
                    <th><span>18. </span>Major Product & Other Product</th>
                    <td>{{ $company->major_product }}</td>
                </tr>
                <tr>
                    <th><span>19. </span>Min to Max Quantity</th>
                    <td>{{ $company->min_to_max }}</td>
                </tr>
                <tr>
                    <th><span>20. </span>Requirment Frequency</th>
                    <td>{{ $company->req_frequ }}</td>
                </tr>
                <tr>
                    <th><span>21. </span>Product Quality/Size/Specification</th>
                    <td>{{ $company->quality_size_speci }}</td>
                </tr>
                <tr>
                    <th><span>22. </span>Purpose Of Requirement</th>
                    <td>{{ $company->purpose_of_req }}</td>
                </tr>
                <tr>
                    <th><span>23. </span>Packaging Size</th>
                    <td>{{ $company->packaging_size }}</td>
                </tr>
                <tr>
                    <th><span>24. </span>Delivery Place</th>
                    <td>{{ $company->delivery_place }}</td>
                </tr>
                <tr>
                    <th><span>25. </span>Target of Business Area</th>
                    <td>{{ $company->tar_of_busi_area }}</td>
                </tr>
                <tr>
                    <th><span>26. </span>Payment Terms</th>
                    <td>{{ $company->paymentterm }}</td>
                </tr>

                <tr>
                    <th><span>27. </span>Requirement Urgency</th>
                    <td>{{ $company->req_urgen }}</td>
                </tr>
                <tr>
                   <th><h6><mark>Previous Marketing Source</mark></h6></th>
                </tr>
                <tr>
                    <th><span>28. </span>Website Link</th>
                    <td><a href="{{ $company->website_url }}" target="_blank">{{ $company->website_url }}</a></td>
                </tr>
                <tr>
                    <th><span>29. </span>Othe Investments For Marketing Online/Offline</th>
                    <td>{{ $company->other_investment }}</td>
                </tr>
                <tr>
                    <th><span>30. </span>Response</th>
                    <td>{{ $company->response }}</td>
                </tr>
                <tr>
                   <th><h6><mark>Company Documents</mark></h6></th>
                </tr>
                <tr>
                    <th><span>31. </span>Company Gst.No</th>
                    <td>{{ $company->gst_no }}</td>
                </tr>
                <tr>
                    <th><span>32. </span>Pan</th>
                    <td>{{ $company->pan_no }}</td>
                </tr>
                <tr>
                    <th><span>33. </span>Tan</th>
                    <td>{{ $company->tan_no }}</td>
                </tr>
                <tr>
                    <th><span>34. </span>Cin No</th>
                    <td>{{ $company->cin_no }}</td>
                </tr>
                <tr>
                    <th><span>35. </span>Bank Name </th>
                    <td>{{ $company->bank_name }}</td>
                </tr>
                <tr>
                    <th><span>36. </span>Account Type</th>
                    <td>{{ $company->account_type }}</td>
                </tr>
                
                <tr>
                   <th><h6><mark>Optional Documents</mark></h6></th>
                </tr>
                <tr>
                    <th><span>37. </span>Adhar</th>
                    <td>{{ $company->adhar_no }}</td>
                </tr>
                <tr>
                    <th><span>38. </span>FSSAI</th>
                    <td>{{ $company->fssai }}</td>
                </tr>
                <tr>
                    <th><span>39. </span>Lab Testing Report</th>
                    <td>{{ $company->lab_testing_report }}</td>
                </tr>
                <tr>
                    <th><span>40. </span>Export Licence</th>
                    <td>{{ $company->export_licence }}</td>
                </tr>
                <tr>
                   <th><h6><mark>Follow-up Details</mark></h6></th>
                </tr>
                <tr>
                    <th><span>41. </span>Data Source </th>
                    <td><a target="_blank" href="{{ $company->data_source }}">{{ $company->data_source }}</a></td>
                </tr>
                <!--<tr>
                    <th><span>42. </span>Remark </th>
                    <td>{{ $company->remark }}</td>
                </tr>-->
                <tr>
                    <th><span>43. </span>From To Date And Time (Next Call Timing)</th>
                    <td>{{ $company->next_call_timing }}</td>
                </tr>
                <!--<tr>
                    <th><span>44. </span>Conversation Details</th>
                    <td>{{ $company->conversation_details }}</td>
                </tr>-->
                <tr>
                    <th><span>45. </span>Online Demo</th>
                    <td>{{ $company->online_demo }}</td>
                </tr>
                <tr>
                    <th><span>46. </span>Exective Feedback (For Client)</th>
                    <td>{{ $company->executive_feedback }}</td>
                </tr>
                <tr>
                   <th><h6><mark>Work On Profile For Client Connectivity</mark></h6></th>
                </tr>
                <tr>
                    <th><span>47. </span>Email :-Propsal Name/Price</th>
                    <td>{{ $company->propsal_name }}</td>
                </tr>
                <tr>
                    <th><span>48.</span>Products Images Uplode </th>
                    <td>{{ $company->product_img }}</td>
                </tr>
                <tr>
                    <th><span>49.</span> P. User ID</th>
                    <td>{{ $company->fp_user_id }}</td>
                </tr>
                <tr>
                    <th><span>50.</span> FP Password </th>
                    <td>{{ $company->fp_psw }}</td>
                </tr>
                <tr>
                    <th><span>51.</span> BWT. Catalog Link</th>
                    <td><a target="_blank" href="{{ $company->bwt_catalog_link }}">{{ $company->bwt_catalog_link }} </a></td>
                </tr>
                <tr>
                    <th><span>52.</span> Whats Up:- Signature & Fp Link</th>
                    <td>{{ $company->whats_up }}</td>
                </tr>
                <tr>
                    <th><span>53.</span> Executive Name</th>
                    <td>{{ $company->executive_name }}</td>
                </tr>
                <tr>
                    <th><span>54.</span> TL Manger Follower Name</th>
                    <td>{{ $company->tl_manager_name }}</td>
                </tr>

                <tr>
                    <th><span>55. Whats Up:- Signature & Fp Link</span></th>
                    <td>{{ $company->user_fp_link }}</td>
                </tr>

                <tr>
                    <th><span>56. Visitors Count</span> </th>
                    <td>{{ $company->visitors_coun }}</td>
                </tr>

                <tr>
                    <th><span>57.</span> Inquery Send</th>
                    <td>{{ $company->inquery_send }}</td>
                </tr>

                <tr>
                    <th><span>58.</span>Veryfy Buy Lead</th>
                    <td>{{ $company->verify_buy_lead }}</td>
                </tr>

                <tr>
                    <th><span>59.</span>Customer Rating</th>
                    <td>{{ $company->ratiing }}</td>
                </tr>
                <tr>
                    <th><span>60.</span>Convert Rs. ( Sale Flash )</th>
                    <td>{{ $company->convert_rs }}</td>
                </tr>
                
                
                  <!--<tr>
                    <td><a class="btn btn-success" href="{{url('/admin-comment/'.$company->uuid)}}">Update</a></td>
                    <td><a class="btn btn-success" href="{{url('/admn-refill/'.$company->uuid)}}">ReFill</a></td>
                </tr>-->
                
                
                
            @endforeach
            
            @else
              <td>Data Not Match No</td>
            @endif

            </table><br>
            <div class="container">
                <div class="row">
                    @foreach($showcomment as $company)
                        <div class="col-sm-12 col-md-6">
                            <p  style="color:red;">Conversation Details (Between Employee & Client)</p>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <p><mark>{{ $company->conversation_details }} </mark></p>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    @foreach($showcomment as $company)
                        <div class="col-sm-12 col-md-6">
                            <a target="_blank" class="btn btn-success" href="{{url('/admin-comment/'.$company->uuid)}}">Update</a>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <a target="_blank" class="btn btn-success" href="{{url('/admn-refill/'.$company->uuid)}}">ReFill</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
 	</div>
 </div>

@endsection

