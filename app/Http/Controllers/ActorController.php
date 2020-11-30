<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\ActorInMovie;
use App\ActorInSerial;
use App\MovieGenre;
use App\Genre;
use App\Movie;
use App\Serial;
use App\Actor;

class ActorController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.addactor');
	}

	public function actor_to_movie(Request $request)
	{

		$movie_id = Movie::where("title_geo", $request->input("movie"))->firstOrFail()->id;

		$actor_id = Actor::where("name_geo", $request->input("actor"))->firstOrFail()->id;

		ActorInMovie::create([
			"movie_id"=>$movie_id,
			"actor_id"=>$actor_id
		]);

		return "
		<div style='text-align: center;'>
		<h1>მსახიობი წარმატებით დაემატა ფილმში</h1> <a href='/admin/main'>საწყისზე დაბრუნება</a>
		</div>";
	}


	public function actor_to_serial(Request $request)
	{

		$serial_id = Serial::where("title_geo", $request->input("serial"))->firstOrFail()->id;

		$actor_id = Actor::where("name_geo", $request->input("actor"))->firstOrFail()->id;

		ActorInSerial::create([
			"serial_id"=>$serial_id,
			"actor_id"=>$actor_id
		]);

		return "
		<div style='text-align: center;'>
		<h1>მსახიობი წარმატებით დაემატა სერიალში</h1> <a href='/admin/main'>საწყისზე დაბრუნება</a>
		</div>";
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate( $request, [
			"name_geo"=>"required",
			"name_eng"=>"required",
			"actor_img"=>"required",
			"birth_date"=>"required",
			"birth_place"=>"required"
		]);

		if(Input::file("actor_img")){
			$destination = public_path('images');
			$filename = uniqid().".jpg";
			$img = Input::file("actor_img")->move($destination, $filename);

		Actor::create([
			"name_geo"=>$request->input("name_geo"),
			"name_eng"=>$request->input("name_eng"),
			"actor_img"=>$filename,
			"birth_date"=>$request->input("birth_date"),
			"birth_place"=>$request->input("birth_place")
		]);

		return "
		<div style='text-align: center;'>
		<h1>მსახიობი წარმატებით დაემატა</h1> <a href='/admin/main'>საწყისზე დაბრუნება</a>
		</div>";

		}

		return "
		<div style='text-align: center;'>
		<h1>დაფიქსირდა შეცდომა! თავიდან სცადეთ</h1> <a href='/admin/main'>საწყისზე დაბრუნება</a>
		</div>";
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
   		$movies_ids = array();
		foreach(ActorInMovie::where("actor_id", $id)->get() as $actmov) {
   			array_push($movies_ids, $actmov->movie_id);
		}
   		
   		// return $movies_ids;

   		$listofmovies = array();
   		foreach ($movies_ids as $movie_id) {
   			$movie = Movie::where("id", $movie_id)->get();
   			array_push($listofmovies, $movie);
   		}

		return view('user.singleactor', [
			"actor_id"=>$id,
			"movies"=>$listofmovies,
			"movies_ids"=>$movies_ids
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
