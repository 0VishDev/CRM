@extends('layouts.master-birthday')
@section('mytitle', 'All Company')
@section('content')
<style>
		

		* {
			font-family: 'Patua One',cursive;
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			user-select: none;
			-webkit-font-smoothing:antialiased;
		}

		canvas {
			background-color: transparent;
			position: absolute;
			top: 0px;
			left: 0px;
			z-index: -1;
		}

		html {
			overflow: auto;
			background-color: rgba(0, 48, 48, 1.0);
			background-image: radial-gradient(circle, rgba(0, 96, 96, 1.0), rgba(0, 0, 0, 0.5));
			width: 100%;
			height: 100%;
		}
		html, body {
			overflow: auto;
			width: 100%;
			height: 100%;
		}

		h2 {
			margin-top: 15%;
			font-size: 100px;
			color: white;
			text-shadow: 0px 0px 8px white;
			justify-content: center;
			vertical-align: middle;
			text-align: center;
			z-index: 10;
		}

		h1 {
			color: white;
			font-size: 90px;
			text-shadow: 0px 0px 8px white;
			justify-content: center;
			font-weight: bold;
			vertical-align: middle;
			text-align: center;
			z-index: 10;
		}
		.form-control
		{
			margin-left:40%;
			padding:30px;
			padding-right: 150px;
      background-color:black;
      border: 1px solid #000;
		}

</style>
<canvas id="screen"></canvas>
	<h2> Happy Happy Company Anniversary For All </h2>
	<h1></h1>
    <a style="padding-left:45%;" class="text-center" href="{{ url('filter-data') }}" >Back To Work</a><br>
   <!--<form >
      
     <input  type="submit" name="name1" class="form-control" >  	
   </form>-->
 
@endsection

