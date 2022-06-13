

<form method="post" action="{{ url('mail-form') }}">
	{{ csrf_field() }}
	<input type="text" name="name" placeholder="Name">
	<input type="text" name="fname" placeholder="Frient Name">
	<input type="email" name="email" placeholder="Email">
	<input type="email" name="email2" placeholder="Email">
	<input type="submit" value="send">
</form>