@extends('layouts.master')
@section('mytitle', 'Transfer Leads')
@section('content')
       <button type="button" class=" btn-success block-btn-shift" data-toggle="modal" data-target="#exampleModalCenter">
       Shift Data
      </button> 
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
                    <form  method="POST" action="{{ url('vendor-leads-change') }}">
                        @csrf
                        
                        <div class="col-sm-12 col-md-12">
                            <select  id="country-dd" name="category" class="form-control">
                               <option value="">Select Reciever Name</option>
                                @foreach ($shift as $data)
                                <option value="{{ $data->user_id }}">
                                    {{$data->emp_name}}
                                </option>
                               @endforeach
                            </select>
                        </div> <hr>

                       <div class="col-sm-12 col-md-12">
                            <input type="text" class="form-control" value="{{ $check->uuid }}" name="select" readonly="">
                       </div>
                       
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
 @endsection