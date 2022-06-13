<form method="post" action="{{ url('fetch') }}"> 
	@csrf
	<input type="text" name="id">
</form>