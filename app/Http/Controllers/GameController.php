<?php namespace App\Http\Controllers;

use Event;
use App\Comment;
use App\Game;
use Request;
use Auth;
use Validator;
use View;
use App\User;
use App\Http\Controllers\Controller;
use App;
use Intervention\Image\ImageManager;
use App\View as ViewModel;
use App\Category;

class GameController extends Controller {


	public function show($id){

		$game = Game::find($id);

		$comments = Comment::where('game_id', $game->getKey())->simplePaginate(10);

		$this->countView($game->id);

		return view('games.show', [
									'game' => $game, 									
		 							'comments' => $comments,
		 							'current_page' => '/'	 							
									]);
	}

	protected function countView($gameId)
	{
		$ip = ip2long(Request::getClientIp());

		$view = ViewModel::where('game_id',  $gameId)->where('user_ip', $ip)->first();

		if(!$view)
		{
			ViewModel::create(['game_id' => $gameId, 'user_ip' => $ip]);
		}
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
			return redirect('home')->withErrors('You Can Not Do That!');			
		}
		return redirect('home')->withErrors('Game Does Not Exist!');	
	}


	public function edit($id)
	{
		$game = Game::find($id);

		$categories = Category::all();

		return view('games/edit',[
									'game' => $game, 
		 							'categories' => $categories
									]);
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

			return redirect('home')->withErrors('Game Does Not Exist!');
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
				->resize(230, 230)
				->save($originalImagePath);

			$game->file_name = $fileName;

			$game->file_ext = $fileExt;
		}
		return $game;
	}



}


