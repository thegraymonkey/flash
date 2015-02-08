<?php namespace App\Http\Controllers;

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

		return view('games/show', ['game' => $game]);
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
		'thumbnail' => 'min:5'
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
			
			$game->user_id = Auth::user()->id;
			
			if ($image)
			{
				$game = $this->withImage($game, Request::file('photo'));
			}

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
			else
			{
				return redirect('home')->with('message', 'Game Does Not Exist!');
			}
		}

		App::abort(404);
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
		'thumbnail' => 'min:5'
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{
			$game = Game::find($id);

			$image = Request::file('photo');

			if ($game)
			{

				if($image)
				{
					// file name factory
					$fileName = time() . md5($image->getClientOriginalName());
					$fileExt = $image->getClientOriginalExtension();

					// image path
					$originalImagePath = public_path().'/upload/games/' . $fileName . '.' . $fileExt;
					
					// save original
					$imager = new ImageManager;
					$imager->make($image)
					//Image::make($image)
					->widen(400)
					->save($originalImagePath);


					$game->title = $input['title'];

					$game->description = $input['description'];

					$game->code = $input['code'];

					$game->file_name = $fileName;

					$game->file_ext = $fileExt;

					$game->instructions = $input['instructions'];

					$game->thumbnail = $input['thumbnail'];

					$game->save();
					
					return redirect('home')->with('message', 'Game Changed!');
					
				}				

				$game->title = $input['title'];

				$game->description = $input['description'];

				$game->code = $input['code'];

				$game->instructions = $input['instructions'];

				$game->thumbnail = $input['thumbnail'];

				$game->save();

				return redirect('home')->with('message', 'Game Changed!');
			}

			App::abort(400);
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


