@extends('layouts.master')
@section('content')

<form class="form" action="/update-status/{{ $status->uuid }}" method="post">
			{{ csrf_field() }}
	        {{ method_field('PUT') }}
			<div class="row">
				<div class="col-sm-12 col-md-6">
                    <label>Change Status</label>
	                <select   name="remark" class="form-control">
	                    <option value="Remark">Remark</option>
	                    <option value="Not Open">Not Open</option>
	                    <option value="Ringing">Ringing</option>
	                    <option value="Call Back">Call Back</option>
	                    <option value="DMU">DMU</option>
	                    <option value="PG">PG</option>
	                    <option value="Non Target">Non Target</option>
	                </select>
	            </div>
			   <div class="col-sm-12 col-md-6 mt-4">
					<input type="submit" class=" btn btn-secondary block-btn form-control" value="Update" >
				</div>
			</div><br>
			
		</form>

@endsection