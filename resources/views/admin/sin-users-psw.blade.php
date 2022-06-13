@extends('layouts.master-admin')
@section('content')
<br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <h3 class=" mb-3">Update Emp Password</h3>
        </div>
        <div class="col-sm-12 col-md-6">
            
        </div>
    </div>
</div>
<br>
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
<div class="container-fluid">
	<div class="row">
	    @foreach($user as $userdata)
            <div class="col-sm-12 col-md-12">
                <form action="{{ url('update-password/'.$userdata->id) }}" method="post">
                    @csrf
                    <input type="text" class="form-control"  placeholder="Enter New Password" value="{{ $userdata->name }}" readonly><br>
                    <input type="text" class="form-control" placeholder="Email" value="{{ $userdata->email }}" readonly><br>
                    <label for="txtPassword">Password</label><br>
                      <div class="input-group">
                        
                        <input type="password" id="txtPassword" class="form-control" name="newpassword" />
                        <button type="button" id="btnToggle" class="toggle"><i id="eyeIcon" class="fa fa-eye"></i></button>
                      </div>
                    <input type="submit" class="btn btn-success" >
                </form>
            </div>
         @endforeach
        </div>
</div>



@endsection

