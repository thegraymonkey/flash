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
		$topAdds = Add::where('position', 'top')->get();

		$bottomAdds = Add::where('position', 'bottom')->get();

		$picAdds = Add::where('position', 'picture')->get();

		$linkAdds = Add::where('position', 'link')->get();

		$adds = Add::orderBy('created_at', 'desc');

		$categories = Category::all();

		$games = Game::orderBy('rating', 'desc')->paginate(12);

		return view('tops.index', [
									'games' => $games,
									'adds' => $adds,		 						
		 							'linkAdds' => $linkAdds, 
		 							'picAdds' => $picAdds, 
		 							'bottomAdds' => $bottomAdds, 
		 							'topAdds' => $topAdds,
		 							'current_page' => 'tops.index',
		 							'categories' => $categories
									]);

	}

}