<?php namespace App\Http\Controllers;

use App\Comment;
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


class GameController extends Controller {


	public function show($id){

		$game = Game::find($id);

		$comments = Comment::where('game_id', $game->getKey())->paginate(10);

		$topAdds = Add::where('position', 'top')->get();

		$bottomAdds = Add::where('position', 'bottom')->get();

		$picAdds = Add::where('position', 'picture')->get();

		$linkAdds = Add::where('position', 'link')->get();

		$adds = Add::orderBy('created_at', 'desc');

		

		return view('games/show', [
									'game' => $game, 
									'adds' => $adds,		 						
		 							'linkAdds' => $linkAdds, 
		 							'picAdds' => $picAdds, 
		 							'bottomAdds' => $bottomAdds, 
		 							'topAdds' => $topAdds,
		 							'comments' => $comments,
		 							'current_page' => '/'
									]);
	}


	public function index(){

		$games = Game::orderBy('created_at', 'desc')->paginate(12);

		return view('home', ['games' => $games]);

	}


	public function store()
	{
		// validation
		$input = Request::all();

		$rules = [
		'title' => 'required|min:5',
		'photo' => 'image|max:2024',
		'description' => 'min:5',
		'code' => 'required|min:10',
		'instructions' => 'min:5',
		'thumbnail' => 'min:5',
		'category_id' => 'required'
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{
			
			$game = new Game;

			$game->title = $input['title'];

			$game->description = $input['description'];

			$game->code = $input['code'];

			$game->instructions = $input['instructions'];

			$game->thumbnail = $input['thumbnail'];

			$game->category_id = $input['category_id'];
			
			$game->user_id = Auth::user()->id;
						
			$game = $this->withImage($game, Request::file('photo'));
			
			$game->save();

			return redirect('home')->with('message', 'Game Published!');
		}	

		return redirect('home')->withErrors($validation);
	}


	public function destroy($gameId)
	{
		if ($game = Game::find($gameId))
		{
			if (Auth::user())
			{
				$game->delete();

				return redirect('home')->with('message', 'Game Deleted!');
			}			
			return redirect('home')->withErrors('message', 'You Can Not Do That!');			
		}
		return redirect('home')->withErrors('message', 'Game Does Not Exist!');	
	}


	public function edit($id)
	{
		$game = Game::find($id);

		return view('games/edit')->with('game', $game);
	}
	

	public function update($id)
	{
		$input = Request::all();

		$rules = [
		'title' => 'required|min:5',
		'photo' => 'image|max:2024',
		'description' => 'required|min:5',
		'code' => 'required|min:10',
		'instructions' => 'min:5',
		'thumbnail' => 'min:5',
		'category_id' => 'required'
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{
			$game = Game::find($id);

			$image = Request::file('photo');

			if ($game)
			{

				$game->title = $input['title'];

				$game->description = $input['description'];

				$game->code = $input['code'];

				$game->instructions = $input['instructions'];

				$game->thumbnail = $input['thumbnail'];

				$game->category_id = $input['category_id'];
				
				$game->user_id = Auth::user()->id;
				
				$game = $this->withImage($game, Request::file('photo'));

				$game->save();

				return redirect('home')->with('message', 'Game Changed!');
			}

			return redirect('home')->withErrors('message', 'Game Does Not Exist!');
		}

		return redirect('home')->withErrors($validation);
	}


	protected function withImage(Game $game, $image)
	{
		if ($image)
		{
			// file name factory
			$fileName = time() . md5($image->getClientOriginalName());
			$fileExt = $image->getClientOriginalExtension();

			// image path
			$originalImagePath = public_path().'/upload/games/' . $fileName . '.' . $fileExt;
			
			// save original
			$imager = new ImageManager;
			$imager->make($image)
				->widen(400)
				->save($originalImagePath);

			$game->file_name = $fileName;

			$game->file_ext = $fileExt;
		}
		return $game;
	}


}


