@extends('layouts.master')
@section('content')

 <div class="container">
 	<div class="row">
 		<div class="col-sm-12 col-md-12">
 			<h3>
                <span>Filter Data According Date</span>
                <span><a  type="btn" class="btn btn-secondary float-right m-1" href="{{ url('filter-data') }}"> Back</a></span>
                <span class="float-right"> Tolal Company <?php echo $totalcompany; ?></span>
            </h3>
 			
 			<table class="table table-hover ">
                <tr>
                    <th>Slct</th>
                    <th>Company Name</th>
                    <th>Mobile No.</th>
                    <th>Allocated To</th>
                    <th>Created At</th>
                    <th>Next Follow Up</th>
                    <th>Status</th>
                    <th>Data Sources</th>
                    
                    
                </tr>
                <form action="{{ url('vendor-shift-leads') }}" method="get">
                    @csrf
                @foreach($query as $company)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $company->uuid }}" name="select">
                    </td>
                    
                    <td><a href="{{url('/all-info/'.$company->uuid)}}">{{ $company->company_name }}</a></td>
                    <td>{{ $company->mobile_no }}</td>
                    <td>{{ $company->emp_name }}</td>
                    <td>{{ $company->created_at }}</td>
                    <td style="color:green;">{{ $company->next_call_timing }}</td>
                    <td style="color:red;">{{ $company->status }}</td>
                    
                    <td>{{ $company->data_source }}</td>
                     <td><a class="btn btn-success" href="{{url('/comment/'.$company->uuid)}}">Update</a></td>
                    <td><a class="btn btn-success" href="{{url('/refill/'.$company->uuid)}}">ReFill</a></td>

                 </tr>
                @endforeach
                <input type="submit" value="Move Selected Field" type="btn" class="btn-success">
                </form>
            </table>
        </div>
 	</div>
 </div>

@endsection

