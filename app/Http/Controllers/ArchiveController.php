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
use Input;
use DB;


class ArchiveController extends Controller {


	public function show()
	{
		$topAdds = Add::where('position', 'top')->get();

		$bottomAdds = Add::where('position', 'bottom')->get();

		$picAdds = Add::where('position', 'picture')->get();

		$linkAdds = Add::where('position', 'link')->get();

		$adds = Add::orderBy('created_at', 'desc');

		$categories = Category::all();

		$month = Input::get('month');

		$games = DB::select( DB::raw("SELECT * FROM games WHERE MONTHNAME(created_at) = :month"), array('month' => $month));
		//$games = App\Game::select( DB::raw("SELECT * FROM games WHERE MONTHNAME(created_at) = :month"), array('month' => $month));
		//$games = App\Game::select( DB::raw("SELECT * FROM games WHERE MONTHNAME(created_at) = :month"), array('month' => $month))->get();

		return view('archives.show', [
									'games' => $games,									
									'adds' => $adds,		 						
		 							'linkAdds' => $linkAdds, 
		 							'picAdds' => $picAdds, 
		 							'bottomAdds' => $bottomAdds, 
		 							'topAdds' => $topAdds,
		 							'current_page' => '/',
		 							'categories' => $categories,
		 							'month' => $month
									]);

	}

}