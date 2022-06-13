@extends('layouts.master-admin')
@section('content')

 <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12" style="overflow-x:auto;">
            <h3><span>All Company Details</span><span class="float-right"> Tolal Company <?php  echo $Company; ?></span></h3>
            <table class="table table-hover ">
                <tr>
                    
                    <th>Company Name</th>
                    <th>Customer Name</th>
                    <th>Mobile No.</th>
                    <th>Allocated To</th>
                    <th>Created At</th>
                    <th>Next Follow Up</th>
                    <th>Status</th>
                   
                    
                    
                </tr>
                
                @foreach($data as $company)
                <tr>
                    
                    
                    <td><a href="{{url('/admin-all-info/'.$company->uuid)}}">{{ $company->company_name }}</a></td>
                    <td>{{ $company->cus_name }}</td>
                    <td>{{ $company->mobile_no }}</td>
                    <td>{{ $company->emp_name }}</td>
                    <td>{{ $company->created_at }}</td>
                    <td style="color:green;">{{ $company->next_call_timing }}</td>
                    <td style="color:red;">{{ $company->status }}</td>
                    
                   
                     <td><a class="btn-custom" href="{{url('/admin-comment/'.$company->uuid)}}">Update</a></td>
                    <td><a class="btn-custom" href="{{url('/admn-refill/'.$company->uuid)}}">ReFill</a></td>

                 </tr>
                @endforeach
                
            </table>
            <span>{{ $data->links() }}</span>
        </div>
    </div>
 </div>

@endsection

