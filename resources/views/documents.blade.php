@extends('layouts.master-admin')
@section('content')

    <table class="table table-hover" >
			<tr>
				<th>Emp Name</th>
           </tr>
      
			@foreach($user as $documents)
			<tr>
           
            <td>{{ $documents->aadhaar }}</td>
            
			</tr>
			@endforeach
        
		</table>

@endsection