@extends('layouts.master')
@section('mytitle', 'All Company')
@section('content')

 <div class="container">
 	<div class="row">
 		<div class="col-sm-12 col-md-12" style="overflow-x:auto;">
 			<h3><span>All Company Details</span><span class="float-right"> Tolal Company <?php echo $totalcompany; ?></span></h3>
 			<table class="table table-hover ">
 				<tr>
 					<<th>Emp. Name</th>
                    <th>Data Sources</th>
                    <th>Mobile No.</th>
                    <th>Company Name</th>
                    <th>Address</th>
                    <th>Gst No.</th>
                    <th>Established Year</th>
                    <th>Com. Req Date</th>
                    <th>Register By</th>
                    <th>Brand Name</th>
                   
                    <th>Firm Type</th>
                    <th>Remark</th>
                    <th>Buy</th>
                    <th>Sale</th>
                    <th>Customer Name</th>
                    <th>Alternate No.</th>
                    <th>Whats App No.</th>
                    <th>Website Url</th>
                    <th>Designation</th>
                    <th>Buy/Sell </th>
                    <th>Major Product</th>
                    <th>Min To Max</th>
                    <th><a type="btn">Feedback</a></th>
                    <th><a type="btn">Edit</a></th>
                    <th><a type="btn">Dlt</a></th>
                   
 				</tr>
 				@foreach($allcompany as $company)
 				<tr>
                    <td>{{ $company->emp_name }}</td>
 					<td>{{ $company->data_source }}</td>
                    <td>{{ $company->mobile_no }}</td>
 					<td><a href="{{url('/all-info/'.$company->uuid)}}">{{ $company->company_name }}</a></td>
 				    <td>{{ $company->address }}</td>
                    <td>{{ $company->gst_no }}</td>
                    <td>{{ $company->established_year }}</td>
                    <td>{{ $company->com_reg_date }}</td>
                    <td>{{ $company->reg_by }}</td>
                    <td>{{ $company->brand_name }}</td>
                    
                    <td>{{ $company->firm_type }}</td>
                    <td>{{ $company->remark }}</td>
                    <td>{{ $company->sale }}</td>
                    <td>{{ $company->buy }}</td>
                    <td>{{ $company->cus_name }}</td>
                    <td>{{ $company->alternate_no }}</td>

                    <td>{{ $company->whats_no }}</td>
                    <td>{{ $company->website_url }}</td>
                    <td>{{ $company->designation }}</td>
                    <td>{{ $company->buy_sell }}</td>
                    <td>{{ $company->major_product }}</td>
                    <td>{{ $company->min_to_max }}</td>
                    <td><a type="btn" class="btn btn-secondary"  href="/comment/{{ $company->uuid }}">Fdbck</a></td>
                    <td><a type="btn" class="btn btn-secondary"  href="/chng-status/{{ $company->uuid }}">chng Status</a></td>
                   <td><a type="btn" class="btn btn-secondary" href="/company-edit/{{ $company->uuid }}">Edit</a></td>
                   <td><a type="btn" onclick="return myFunction();" class="btn btn-secondary" href="/company-dlt/{{ $company->uuid }}"><i  class="fa fa-trash" aria-hidden="true"></i></a></td>
                 </tr>
 				@endforeach
 			</table>
        </div>
 	</div>
 </div>
  <!-- Modal -->
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Send Client Feedback</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                       <div class="container">
                <div class="">
                    <form >
                        <div class="col-sm-12 col-md-12 modal-footer">
                            <select  id="country-dd" name="category" class="form-control">
                                <option value="">Select Reciever Name</option>
                                @foreach ($allcompany as $company)
                                <option value="{{$company->name}}">
                                    {{$company->name}}
                                </option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="col-sm-12 col-md-12 modal-footer">
                            <input type="text" class="form-control" name="company_name" placeholder="Company Name">
                        </div>
                        <div class="col-sm-12 col-md-12 modal-footer">
                            <input type="text" class="form-control" name="user_id" placeholder="User Id">
                        </div>
                        <div class="col-sm-12 col-md-12 modal-footer">
                            <textarea class="form-control" name="comment" placeholder="Enter Client Comment" rows="4" cols="45"></textarea>
                        </div>
                        
                    </form>
                </div>
            </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
          <!-- end model -->
@endsection

