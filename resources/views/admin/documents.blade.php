@extends('layouts.master-admin')
@section('content')

<table class="table table-hover" >
 	<tr>
 		<th>Emp Name & Documents (Aadhaar, Pan, Last Qualifications)</th>
    </tr>
  
 	@foreach($user as $documents)
 	<tr>
 	    @if($documents->aadhaar)
 	    <td>{{ $documents->name }}</td>
 	    @else
        @endif
 	</tr>
 	<tr>
       @if($documents->aadhaar)
        <td><img src="{{ ('storage/app/public/'.$documents->aadhaar) }}" alt="{{$documents->aadhaar}}" style="height:200px;width:300px;border-radius:0px;"></td><br>
        
        @else
        @endif
        
        @if($documents->pan)
        <td><img src="{{ ('storage/app/public/'.$documents->pan) }}" alt="{{$documents->pan}}" style="height:200px;width:300px;border-radius:0px;"></td>
        @else
        @endif
        
        @if($documents->last_qualification)
        <td><img src="{{ ('storage/app/public/'.$documents->last_qualification) }}" alt="{{$documents->last_qualification}}" style="height:200px;width:300px;border-radius:0px;"></td>
        @else
        @endif
 	</tr>
 	@endforeach
    
 </table>
@endsection