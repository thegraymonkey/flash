<?php namespace App\Http\Controllers;

use Redirect;
use App\Comment;
use App\Game;
use Request;
use Auth;
use Validator;
use View;
use App\User;
use App\Http\Controllers\Controller;
use App;


class CommentController extends Controller {


	public function store(){

		$input = Request::all();

		$rules = [
		'name' => 'required|min:2',
		'content' => 'required|min:5'
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{
			
			$comment = new Comment;

			$comment->fill($input);

			$comment->save();

			return Redirect::back()->with('message', 'Comment Published!');
		}	

		return Redirect::back()->withErrors($validation);
	}
	

	public function destroy($commentId)
	{
		if ($comment = Comment::find($commentId))
		{
			if (Auth::user())
			{
				$comment->delete();

				return Redirect::back()->with('message', 'Comment Deleted!');
			}			
			return Redirect::back()->withErrors('You Can Not Do That!');			
		}
		return Redirect::back()->withErrors('Comment Does Not Exist!');	
	}
	
}