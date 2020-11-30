<!DOCTYPE html>
<html>
<head>
	<title>Add Genre To Movie</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body class="body p-0 sign_body" style="background: #0e0e0e url(https://movie.ge/theme/img/authorization-cover.png);  background-size: cover; background-repeat: no-repeat;">
	<div class="container" style="text-align: center; margin-top: 8%; background-color: #ffffff; width: 30%">
		<form method="POST" action="{{ route('storegenreformovie') }}">
			@csrf
			<br>
			<select id="movie" name="movie">
				@foreach(App\Movie::get() as $movie)
				<option>
					{{ $movie->title_geo }}
				</option>
				@endforeach
			</select>
			<br>
			@foreach(App\Genre::get() as $genre)
			<?php
			$i = ++$loop->index
			?>
				<input type="checkbox" id="{{ 'genre'.$i }}" name="genre[]" value="{{ $genre->genre }}">
				<label for="{{'genre'.$i}}" >{{ $genre->genre }}</label>
				<br>

			@endforeach
			
			<br>
			<button class="btn btn-success" type="submit">Save</button>
		</form>
	</div>
</body>
</html>