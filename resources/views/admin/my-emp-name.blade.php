@extends('layouts.master-admin')
@section('content')
<h3>Filter Record According Emp</h3>
<br>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<table class="table table-hover" >
 				
 				@foreach($emp as $company)
 				<tr>
 					<th>Emp. Name</th>
                   <td><a href="{{url('/single-emp/'.$company->id)}}">{{ $company->name }}</a></td>
 				</tr>
 				@endforeach
           </table>
		</div>
	</div>
</div>

@endsection