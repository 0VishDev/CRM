@extends('layouts.app-fast')
@section('content')
<br><br><br>
<div class="container">
    <div class="row justify-content-center">
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
        <div class="col-md-12">
            <h3 class="text-center">Registration Form</h3>
            <div class="card">
                <!-- <div class="card-header">{{ __('Register') }}</div> -->

                <div class="card-body">
                    <form method="POST" action="{{ url('register-user') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Employee Name') }}</label>

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Mobile No.') }}</label>

                            <div class="col-md-4">
                                <input  type="number" class="form-control" name="mobile" >

                            </div>
                        </div>
                         
                        

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Reporting Manager') }}</label>

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="rept_mang" value="{{ old('rept_mang') }}" required autocomplete="name" autofocus>

                            </div>
                        </div>
                         
                       <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Department') }}</label>

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="dept" value="{{ old('rept_mang') }}" required autocomplete="name" autofocus>

                            </div>
                            
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Date Of Joing') }}</label>

                            <div class="col-md-4">
                                <input id="name" type="date" class="form-control @error('name') is-invalid @enderror" name="doj" value="{{ old('doj') }}" required autocomplete="name" autofocus>

                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Designation') }}</label>

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="desig" value="{{ old('doj') }}" required autocomplete="name" autofocus>

                            </div>
                            
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Image') }}</label>
                            <div class="col-md-4">
                            <input type="file" name="image" class="form-control" placeholder="select image" required>        
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Aadhaar Card') }}</label>

                            <div class="col-md-4">
                                <input id="file" type="file" class="form-control @error('name') is-invalid @enderror" name="aadhaar" value="{{ old('aadhaar') }}" required autocomplete="name" autofocus>

                            </div>
                            
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Pan Card') }}</label>
                            <div class="col-md-4">
                            <input type="file" name="pan" class="form-control" placeholder="select image" required>        
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            
                            
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Last Qualification') }}</label>
                            <div class="col-md-4">
                            <input type="file" name="last_qualification" class="form-control" placeholder="select image" required>        
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-4">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-4">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br>
@endsection
