<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mail</title>
</head>
<body>
 <form action="{{ url('mail-form') }}" method="post">
 	@csrf
 	<input type="text" placeholder="name" name="name">
 	<input type="text" placeholder="F name" name="fname">
 	<input type="text" placeholder="EMAIL" name="email">
 	<input type="submit" value="send">
 </form>
</body>
</html>