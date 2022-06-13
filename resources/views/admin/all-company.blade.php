@extends('layouts.master-admin')
@section('content')

 <div class="container">
 	<div class="row">
 		<div class="col-sm-12 col-md-12" style="overflow-x:auto;">
 			<h3><span>All Company Details</span><span class="float-right"> Tolal Company <?php echo $totalcompany; ?></span></h3>
 			
 			<table class="table table-hover" >
 				<tr>
 					<!-- <th>
                        <a href="{{ url('shift-data') }}" type="btn" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">send</a>
                    </th> -->
                    <th>Slct For Move</th>
 					<th>Emp. Name</th>
 					<th>Data Sources</th>
                    <th>Mobile No.</th>
 					<th>Company Name</th>
 					<th>Address</th>
 					<th>Gst No.</th>
 					<th>Established Year</th>
 					<th>Com. Req Date</th>
 					<th>Register By</th>
                    <<th>Brand Name</th>
                    <th>Category</th>
                    <th>Firm Type</th>
                    
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
                    
                    <th><a type="btn">Edit</a></th>
                    <th><a type="btn">Dlt</a></th>
 				</tr>
                <form action="{{ url('shift-data2') }}" method="get">
                    @csrf
 				@foreach($allcompany as $company)
 				<tr>
                    <td>
                        <input type="checkbox" value="{{ $company->uuid }}" name="select">
                    </td>
                    <td ><b style="color:red;"><a href="/admin-all-info/{{ $company->uuid }}">{{ $company->emp_name }}</a></b></td>
                    <td>{{ $company->data_source }}</td>
                    <td>{{ $company->mobile_no }}</td>
 					<td>{{ $company->company_name }}</td>
 					<td>{{ $company->address }}</td>
 					<td>{{ $company->gst_no }}</td>
 					<td>{{ $company->established_year }}</td>
 					<td>{{ $company->com_reg_date }}</td>
 					<td>{{ $company->reg_by }}</td>
                    <td>{{ $company->brand_name }}</td>
                    <td>{{ $company->category }}</td>
                    <td>{{ $company->firm_type }}</td>
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
                    

                   <td><a type="btn" class="btn btn-secondary" href="admin-company-edit/{{ $company->uuid }}">Edit</a></td>

                   <td><a type="btn" onclick="return myFunction();" class="btn btn-secondary" href="/admin-company-dlt/{{ $company->uuid }}"><i  class="fa fa-trash" aria-hidden="true"></i></a></td>
                    
 				</tr>
 				@endforeach
                <input type="submit" value="Move Selected Field" type="btn" class="btn-success">
                </form>
 			</table>
            <span>{{ $allcompany->links() }}</span>

        </div>
 	</div>
 </div>


 <!-- Model For Shift Data -->
      <!-- Button trigger modal -->
      <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
       Launch demo modal
      </button> -->

<!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Shift Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <div class="container">
                <div class="">
                    <form >
                        <div class="col-sm-12 col-md-12">
                            <select  id="country-dd" name="category" class="form-control">
                                <option value="">Select Reciever Name</option>
                                @foreach ($allcompany as $company)
                                <option value="{{$company->name}}">
                                    {{$company->name}}
                                </option>
                                @endforeach
                            </select>
                        </div> <hr>
                        <div class="col-sm-12 col-md-12 modal-footer">
                            <input type="submit" class="btn btn-success block-btn" value="Shift Data">
                        </div>
                    </form>
                </div>
            </div>
          </div>
         
        </div>
      </div>
    </div>
 <!--End Model For Shift Data -->

 <!-- Modal For Show Content-->
    <div class="modal fade" id="exampleModalCentercomment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Shift Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <div class="container">
                <div class="">
                    <div class="col-sm-12 col-md-12">
                          <p><?php  echo "$showcomment";  ?></p>
                    </div> 
                </div>
            </div>
          </div>
         
        </div>
      </div>
    </div>
 <!--End Model For Show Content -->
@endsection

