<?php namespace App\Http\Controllers;

use Redirect;
use App\Game;
use Request;
use Auth;
use Validator;
use View;
use App\User;
use App\Http\Controllers\Controller;
use App;
use App\Add;
use App\Category;


class TopController extends Controller {


	public function index()
	{

		$games = Game::orderBy('rating', 'desc')->paginate(12);

		return view('tops.index', [
									'games' => $games,									
		 							'current_page' => 'tops.index'		 							
									]);

	}

}