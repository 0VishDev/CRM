<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Jquery</title>
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="">
</head>
<body>
	<h3><p id="city"></p></h3>
	<form action="{{ url('check') }}">
	    @csrf
	<input type="text" id="city" value="city" name="city" readonly>
	<input type="submit" >
	</form>
    <script>
    	$.get('https://ipinfo.io/',function(result)
    	{
          $('#city').append(result.city);
    	},'json');
    </script>

	<!-- <button type="btn" class="btn btn-success" >click</button>
	<script>
	$(document).ready(function(){
		alert("We r learing on jquery");
	});
	</script> -->
</body>
</html>