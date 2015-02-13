<?php namespace App\Http\Controllers;


use Redirect;
use App\Game;
use Request;
use Validator;
use View;
use App\Http\Controllers\Controller;
use App;
use Input;


class SearchController extends Controller {

	public function index()
	{
		$query = $_GET['query'];

		$games = Game::where('title', 'LIKE', '%' . $query . '%')->limit(12)->get();

		return view('search.index', [
										'query' => $query,
										'games' => $games,								 									
		 								'current_page' => '/'

										]);
	}


}