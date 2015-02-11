<?php namespace App\Http\Controllers;

use App\RatingObserver;
use Redirect;
use App\Rating;
use App\Game;
use Request;
use Validator;
use View;
use App\Http\Controllers\Controller;
use App;
use Input;


class RatingController extends Controller {


	 public function show($id){
	
		$game = Game::find($id);
	
		return view('games/$gameId');
	}


	public function store()
	{
		$ip = Request::getClientIp();

		$input = Request::all();

		$gameId = Input::get('game_id');

		$rules = [
		'rating' => 'required',
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{
			$rating = Rating::where('game_id',  $gameId)->where('user_ip', ip2long(Request::getClientIp()))->first();

			if(!$rating)
			{
				$rating = new Rating;

				$rating->fill($input);

				$rating->user_ip = ip2long($ip);

				$rating->save();

				return Redirect::back()->with('message', 'Rating Recorded!');
			}
			return Redirect::back()->withErrors('You Already Rated This Game!');
		}	
		return Redirect::back()->withErrors($validation);
	}


}
	

	