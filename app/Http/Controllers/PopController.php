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


class PopController extends Controller {


	public function index()
	{

		$games = Game::orderBy('views', 'desc')->paginate(12);

		return view('pops.index', [
									'games' => $games,									
		 							'current_page' => 'pops.index'
									]);

	}

}