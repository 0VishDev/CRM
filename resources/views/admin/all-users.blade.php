@extends('layouts.master-admin')
@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <h3 class=" mb-3">All Users Details</h3>
        </div>
        <!--<div class="col-sm-12 col-md-6">
            <form action="aceess">
                <input type="text" class="form-control" name="search" placeholder="Enter User Name" >
                
            </form>
        </div>-->
    </div>
</div>
<br>
<div class="container">
   <div class="row">
      <div class="col-sm-12 col-md-12"  style="overflow-x:auto;">
         <div class="panel-body">
            <div class="form-group">
               <input type="text" class="form-controller" id="search" name="search">
            </div>
            <table class="table table-bordered table-dark">
               <thead>
                  <tr class="table-hover">
                     <th>Emp Id</th>
                     <th>Emp Name</th>
                     <th>Email Id</th>
                     <th>Mobile No.</th>
                     <th>Rept. Mang.</th>
                     <th>Dept. </th>
                     <th>D.O.J. </th>
                     <th>D.O.B. </th>
                     <th>Desig. </th>
                  </tr>
               </thead>
               <tbody></tbody>
            </table>
         </div>
      </div>
   </div>
</div>

@section('scripts')
<script type="text/javascript">
   $('#search').on('keyup',function(){
   $value=$(this).val();
   $.ajax({
   type : 'get',
   url : '{{URL::to('search')}}',
   data:{'search':$value},
   success:function(data){
   $('tbody').html(data);
   }
   });
   })
</script>
<script type="text/javascript">
   $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Update Emp Password</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach($user->take(1) as $userdata)
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <form action="{{ url('update-password') }}" method="post">
                    @csrf
                    <input type="text" class="form-control" name="newpassword" placeholder="Enter New Password">
                    <input type="text" class="form-control" name="newpassword" placeholder="Enter New Password" value="{{ $userdata->name }}">
                    <input type="submit" class="btn btn-success" >
                </form>
            </div>
        </div>
        @endforeach
      </div>
      
    </div>
  </div>
</div>

<!-- Add User Bootstrap Model Form -->
<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>-->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
       
        <form>
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Name" required="">
            </div>
  
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
            </div>
   
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" placeholder="Email" required="">
            </div>
   
            <div class="form-group">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
  
        </form>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection

