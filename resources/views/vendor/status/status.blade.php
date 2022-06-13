@extends('layouts.master')
@section('mytitle', 'All Company')
@section('content')
<style>
.hide {
  margin-top:-100px;
  display: none;
}
    
.myDIV:hover + .hide {
  display: block;
  color: red;
}
</style>
 <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12" style="overflow-x:auto;">
            <h3><span>All Company Details</span><span class="float-right"> Tolal Company <?php  ?></span></h3>
            <table class="table table-hover ">
                <tr>
                    <th>Slct</th>
                    <th>Company Name</th>
                    @foreach($data->take(1) as $company)
                    @if( $company->status  == "Cnvrt")
                       
                       <th>Package Name</th>
                    @else
                    @endif
                    @endforeach
                   
                    <th>Customer Name</th>
                    <th>Mobile No.</th>
                    <th>Allocated To</th>
                    <th>Created At</th>
                    <th>Next Follow Up</th>
                    <th>Status</th>
                 </tr>
                <form action="{{ url('vendor-shift-leads') }}" method="get">
                    @csrf
                @foreach($data as $company)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $company->uuid }}" name="select">
                    </td>
                    
                    <td><a target="_blank" href="{{url('/all-info/'.$company->uuid)}}">{{ $company->company_name }}</a></td>
                    
                    @if( $company->status  == "Cnvrt")
                        <td  class="myDIV">
                           <img src="{{ asset('uploads/'.$company->package_name) }}" style="width:150px;border-radius: 0px !important;"  height="60px;" alt="Package Img">
                        </td>
                        
                    @else
                    @endif
                    
                    <td>{{ $company->cus_name }}</td>
                    <td>{{ $company->mobile_no }}</td>
                    <td>{{ $company->emp_name }}</td>
                    <td>{{ $company->created_at }}</td>
                    <td style="color:green;">{{ $company->next_call_timing }}</td>
                    <td style="color:red;">{{ $company->status }}</td>
                    <td><a target="_blank" class="btn-custom" href="{{url('/comment/'.$company->uuid)}}">Update</a></td>
                    <td><a target="_blank" class="btn-custom" href="{{url('/refill1/'.$company->uuid)}}">ReFill</a></td>
                </tr>
                @endforeach
                <input type="submit" value="Move Selected Field" type="btn" class="btn-custom">
                </form>
            </table>
            <span>{{ $data->links() }}</span>
        </div>
    </div>
 </div>
  

@endsection

