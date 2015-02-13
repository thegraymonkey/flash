<?php namespace App\Http\Controllers;


use Redirect;
use App\Game;
use Request;
use Validator;
use View;
use App\Http\Controllers\Controller;
use App;
use Input;
use App\Add;
use App\Category;


class SearchController extends Controller {

	public function index()
	{
		$query = $_GET['query'];

		$games = Game::where('title', 'LIKE', '%' . $query . '%')->limit(12)->get();

		$topAdds = Add::where('position', 'top')->get();

		$bottomAdds = Add::where('position', 'bottom')->get();

		$picAdds = Add::where('position', 'picture')->get();

		$linkAdds = Add::where('position', 'link')->get();

		$adds = Add::orderBy('created_at', 'desc');

		$categories = Category::all();

		return view('search.index', [
										'query' => $query,
										'games' => $games,								 
										'adds' => $adds,		 						
		 								'linkAdds' => $linkAdds, 
		 								'picAdds' => $picAdds, 
		 								'bottomAdds' => $bottomAdds, 
		 								'topAdds' => $topAdds,
		 								'current_page' => '/',
		 								'categories' => $categories

										]);
	}


}