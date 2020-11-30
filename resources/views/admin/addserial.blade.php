<!DOCTYPE html>
<html>
<head>
	<title>Add Serial</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


</head>
<body class="body p-0 sign_body" style="background: #0e0e0e url(https://movie.ge/theme/img/authorization-cover.png);  background-size: cover; background-repeat: no-repeat;">
	<div class="container" style="text-align: center; margin-top: 5%; background-color: #ffffff; width: 30%">
		<h1>Add Serial</h1>
		
		<form method="POST" action="{{ route('storeserial') }}" enctype="multipart/form-data">
			@csrf
			<label>Serial Title Geo</label>
			<input type="text" name="title_geo">
			<br>
			<label>Serial Title Eng</label>
			<input type="text" name="title_eng">
			<br>
			<label>IMDB</label>
			<input type="text" name="imdb">
			<br>
			<label>Release Date</label>
			<input type="Date" name="release_date">
			<br>
			<label style="margin-left: 6%" >Photo</label>
			<input type="file" name="serial_img">
			<br>
			<label>Directed By</label>
			<input type="text" name="directed_by">
			<br>
			<label>Duration</label>
			<input type="text" name="duration">
			<br>
			<label>Country</label>
			<input type="text" name="country">
			<br>
			<label>Description</label>
			<textarea name="description"></textarea>
			<br>

			<button class="btn btn-success" type="submit">Save</button>

		</form>
	</div>
</body>
</html>