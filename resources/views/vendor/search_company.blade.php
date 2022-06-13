@extends('layouts.master')
@section('content')
<script>
	BASE_URL="<?php echo url(''); ?>";
</script>

        @if(Session::has('jsAlert'))

        <script type="text/javascript" >
            alert({{ session()->get('jsAlert') }});
        </script>

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
            <form action="{{ url('search-company') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-3">
        
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label>Profile Id</label>
                        <input type="number"   class="form-control rounded" name="profile_id" placeholder="Profile ID">
                        
                        <label>Mobile No</label>
                        <input type="number"   class="form-control rounded" name="mobile" placeholder="Mobile No">
        
                        <label>Email ID</label>
                        <input type="text"   class="form-control rounded" name="email" placeholder="Email Id">
                        
        
                        <label>Company Name</label>
                        <input type="text"   class="form-control rounded" name="company_name" placeholder="Company Name">
                        <br>
        
                        <input type="submit" value="Search Company" class=" btn-custom btn-block">
                    </div>
        
                    <div class="col-sm-12 col-md-3">
        
                    </div>
                </div>
            </form>
        </div>

       <div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12" style="overflow-x:auto;">
            @if(isset($data))
            <table class="table table-hover" >
               <h3><span>All Company Details</span><span class="float-right">Tolal Company <?php echo $datacount; ?></span></h3>
                <tr>
                    <th>Emp. Name</th>
                    <th>Mobile No.</th>
                    @foreach($data->take(1) as $company)
                    @if( $company->status  == "Cnvrt")
                       <th>Package Name</th>
                    @else
                    @endif
                    @endforeach
                    
                    <th>Company Name</th>
                    <th>Address</th>
                    
                </tr>
                @foreach($data as $company)
                <tr>
                   <td ><b style="color:red;"><a href="{{ '/admin-all-info/'.$company->uuid }}">{{ $company->emp_name }}</a></b></td>
                   
                   @if( $company->status  == "Cnvrt")
                        <td  class="myDIV">
                           <img src="{{ asset('uploads/'.$company->package_name) }}" style="width:150px;border-radius: 0px !important;" height="60px;" alt="Package Img">
                        </td>
                        
                    @else
                    @endif
                   <td>{{ $company->mobile_no }}</td>
                   <td>{{ $company->company_name }}</td>
                   <td>{{ $company->address }}</td>
                </tr>
                @endforeach
              
            </table>
            
            @else
            @endif
           

       </div>
    </div>
</div>



@endsection

