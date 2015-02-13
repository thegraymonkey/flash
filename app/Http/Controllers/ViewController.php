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
use App\View;


class ViewController extends Controller {


	public function store()
	{
		$ip = Request::getClientIp();

		$input = Request::all();

		$gameId = $game->getKey();

		$rules = [
		'view' => 'required',
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{
			$view = View::where('game_id',  $gameId)->where('user_ip', ip2long(Request::getClientIp()))->first();

			if(!$view)
			{
				$view = new View;

				$view->fill($input);

				$view->user_ip = ip2long($ip);

				$view->save();

				return Redirect::back()->with('message', 'Rating Recorded!');
			}
			return Redirect::back()->withErrors('You Already Rated This Game!');
		}	
		return Redirect::back()->withErrors($validation);
	}


}
	

	