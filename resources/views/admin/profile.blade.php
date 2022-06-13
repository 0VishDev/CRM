@extends('layouts.master-admin')
@section('content')
<br><br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<h3 class="mb-3">Admin Profile</h3>
			<table class="table table-hover table-border table-dark">
				@foreach($user_check as $user)
				<tr>
					<th>Admin Id</th>
					<td>{{ $user->emp_id }}</td>
				</tr>
				<tr>
					<th>Name</th>
					<td>{{ $user->name }}</td>
				</tr>
				<tr>
					<th>Email</th>
					<td>{{ $user->email }}</td>
				</tr>
			
				
				
				@endforeach
			</table>
		</div>
	</div>
</div>

@endsection

