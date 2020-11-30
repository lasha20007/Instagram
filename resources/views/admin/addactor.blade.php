<!DOCTYPE html>
<html>
<head>
	<title>Add Actor</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


</head>
<body class="body p-0 sign_body" style="background: #0e0e0e url(https://movie.ge/theme/img/authorization-cover.png);  background-size: cover; background-repeat: no-repeat;">
	<div class="container" style="text-align: center; margin-top: 5%; background-color: #ffffff; width: 30%">
		<h1>Add Actor</h1>
		
		<form method="POST" action="{{ route('storeactor') }}" enctype="multipart/form-data">
			@csrf
			<label>Actor Full Name Geo</label>
			<input type="text" name="name_geo">
			<br>

			<label>Actor Full Name Eng</label>
			<input type="text" name="name_eng">
			<br>

			<label style="margin-left: 6%" >Photo</label>
			<input type="file" name="actor_img">
			<br>

			<label>Birth Date</label>
			<input type="Date" name="birth_date">
			<br>

			<label>Birth Place</label>
			<input type="text" name="birth_place">
			<br>

			<button class="btn btn-success" type="submit">Save</button>

		</form>
	</div>
</body>
</html>