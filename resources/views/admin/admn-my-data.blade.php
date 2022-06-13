@extends('layouts.master-admin')
@section('content')

<div class="container">

 	<div class="row">
 		<div class="col-sm-12 col-md-12" style="overflow-x:auto;">
 			<h3><span>All Company Details</span><span class="float-right"> Tolal Company <?php  ?></span></h3>
 			<table class="table table-hover ">
 				<tr>
                    <th>Slct For Move</th>
 					<th>Company Name</th>
                    <th>Data Sources</th>
                    <th>Mobile No.</th>
                    <th>Allocated To</th>
                    <th>Next Follow Up</th>
                    <th>Status</th>
                </tr>
                <form action="{{ url('vendor-shift-leads') }}" method="get">
                    @csrf
 				@foreach($sinCom as $company)
 				<tr>
                    <td>
                        <input type="checkbox" value="{{ $company->uuid }}" name="select">
                    </td>
                    
                    <td><a href="/all-info/{{ $company->uuid }}">{{ $company->company_name }}</a></td>
                    <td>{{ $company->data_source }}</td>
                    <td>{{ $company->mobile_no }}</td>
                    <td>{{ $company->emp_name }}</td>
                    <td style="color:green;">{{ $company->next_call_timing }}</td>
 					<td style="color:red;">{{ $company->status }}</td>
                    <td><a class="btn btn-success" href="{{url('/comment/'.$company->uuid)}}">Update</a></td>
                    <td><a class="btn btn-success" href="{{url('/admn-refill/'.$company->uuid)}}">ReFill</a></td>
                   
                 </tr>
 				@endforeach
                <input type="submit" value="Move Selected Field" type="btn" class="btn-success">
                </form>
 			</table>
 			 <span>{{ $sinCom->links() }}</span>
        </div>
 	</div>
 </div>

@endsection