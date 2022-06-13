@extends('layouts.master')
@section('mytitle', 'All Company')
@section('content')


<div class="container">
	<div class="row">
		<form>
			<input type="text" name="name" class="form-control" placeholder="Name">
			<input type="text" name="email" class="form-control" placeholder="Email">

		</form>
	</div>
</div>

@endsection