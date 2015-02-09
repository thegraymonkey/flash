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

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
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

		return view('welcome', [
								'games' => $games,								 
								'adds' => $adds,		 						
		 						'linkAdds' => $linkAdds, 
		 						'picAdds' => $picAdds, 
		 						'bottomAdds' => $bottomAdds, 
		 						'topAdds' => $topAdds
								]);
	}

}
