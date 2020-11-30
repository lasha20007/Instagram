<!DOCTYPE html>
<html>
<head>
	<title>Add Actor To Movie</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body class="body p-0 sign_body" style="background: #0e0e0e url(https://movie.ge/theme/img/authorization-cover.png);  background-size: cover; background-repeat: no-repeat;">
	<div class="container" style="text-align: center; margin-top: 10%; background-color: #ffffff; width: 30%">
		<form method="POST" action="{{ route('storeactortomovie') }}">
			@csrf
			<h3>Add Actor To Movie</h3>
			<select id="movie" name="movie">
			@foreach(App\Movie::get() as $movie)
				<option>
					{{ $movie->title_geo }}
				</option>
			@endforeach
			</select>
			<br>
			<br>
			<select id="actor" name="actor">
			@foreach(App\Actor::get() as $actor)
				<option>
					{{ $actor->name_geo }}
				</option>
			@endforeach
			</select>
			<br>
			<br>
			<button class="btn btn-success">Save</button>
		</form>
	</div>
</body>
</html>