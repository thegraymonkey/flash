<?php namespace App\Http\Controllers;

use App\Add;
use App\Game;
use Request;
use Auth;
use Validator;
use View;
use App\User;
use App\Http\Controllers\Controller;
use App;
use Intervention\Image\ImageManager; 

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$topAdds = Add::where('position', 'top')->get();

		$bottomAdds = Add::where('position', 'bottom')->get();

		$picAdds = Add::where('position', 'picture')->get();

		$linkAdds = Add::where('position', 'link')->get();

		$adds = Add::orderBy('created_at', 'desc');

		$games = Game::orderBy('created_at', 'desc')->paginate(12);

		return view('home', [
								'games' => $games, 
								'adds' => $adds,		 						
		 						'linkAdds' => $linkAdds, 
		 						'picAdds' => $picAdds, 
		 						'bottomAdds' => $bottomAdds, 
		 						'topAdds' => $topAdds
		 					]);		
	}

}
