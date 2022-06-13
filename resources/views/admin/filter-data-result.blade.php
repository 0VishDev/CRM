@extends('layouts.master-admin')
@section('mytitle', 'All Company')
@section('content')
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
 <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12" style="overflow-x:auto;">
            <h3><span>All Company Details</span><span class="float-right"> Tolal Company <?php  ?></span></h3>
            <table class="table table-hover ">
                <tr>
                    <th>Slct</th>
                    <th>Company Name</th>
                    <th>Mobile No.</th>
                    <th>Allocated To</th>
                    <th>Created At</th>
                    <th>Next Follow Up</th>
                    <th>Status</th>
                </tr>
                <form action="{{ url('shift-data2') }}" method="get">
                    @csrf
                @foreach($query as $company)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $company->uuid }}" name="select">
                    </td>
                     <td><a href="{{url('/admin-all-info/'.$company->uuid)}}" target="_blank">{{ $company->company_name }}</a></td>
                    <td>{{ $company->mobile_no }}</td>
                    <td>{{ $company->emp_name }}</td>
                    <td>{{ $company->created_at }}</td>
                    <td style="color:green;">{{ $company->next_call_timing }}</td>
                    <td style="color:red;">{{ $company->status }}</td>
                    
                  
                     <td><a class="btn btn-success" href="{{url('/admin-comment/'.$company->uuid)}}" target="_blank" >Update</a></td>
                    <td><a class="btn btn-success" href="{{url('/admn-refill/'.$company->uuid)}}" target="_blank">ReFill</a></td>
                  </tr>
                @endforeach
                <input type="submit" value="Move Selected Field" type="btn" class="btn-success">
                </form>
            </table>
            <span>{{ $query->links() }}</span>
        </div>
    </div>
 </div>
  
@endsection

