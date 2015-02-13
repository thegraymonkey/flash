<?php namespace App\Http\Controllers;

use App\Add;
use Request;
use Auth;
use Validator;
use View;
use App\User;
use App\Http\Controllers\Controller;
use App;
use Intervention\Image\ImageManager;


class AddController extends Controller {


	public function store()
	{
		// validation
		$input = Request::all();

		$rules = [
		'title' => 'required|min:5',
		'photo' => 'image|max:2024',
		'description' => 'min:5',
		'link' => 'required|min:5',
		'position' => 'required',
		'thumbnail' => 'min:5'
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{
			
			$add = new Add;

			$add->title = $input['title'];

			$add->description = $input['description'];

			$add->link = $input['link'];

			$add->position = $input['position'];

			$add->thumbnail = $input['thumbnail'];
			
			$add->user_id = Auth::user()->id;
			
			
			$add = $this->withImage($add, Request::file('photo'));
			

			$add->save();

			return redirect('home')->with('message', 'Add Published!');
		}	

		return redirect('home')->withErrors($validation);
	}

	
	public function destroy($addId)
	{
		if ($add = Add::find($addId))
		{
			if (Auth::user())
			{
				$add->delete();

				return redirect('home')->with('message', 'Add Deleted!');
			}			
			return redirect('home')->withErrors('You Can Not Do That!');			
		}
		return redirect('home')->withErrors('Add Does Not Exist!');	
	}	
	

	public function edit($id)
	{
		$add = Add::find($id);

		return view('adds/edit')->with('add', $add);
	}
	

	public function update($id)
	{
		$input = Request::all();

		$rules = [
		'title' => 'required|min:5',
		'photo' => 'image|max:2024',
		'description' => 'required|min:5',
		'link' => 'required|min:5',
		'position' => 'required',
		'thumbnail' => 'min:5'
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{
			$add = Add::find($id);

			$image = Request::file('photo');

			if ($add)
			{

				$add->title = $input['title'];

				$add->description = $input['description'];

				$add->link = $input['link'];

				$add->position = $input['position'];

				$add->thumbnail = $input['thumbnail'];
				
				$add->user_id = Auth::user()->id;
				
				
				$add = $this->withImage($add, Request::file('photo'));
				

				$add->save();

				return redirect('home')->with('message', 'Add Changed!');
			}

			return redirect('home')->withErrors('Add Does Not Exist!');
		}

		return redirect('home')->withErrors($validation);
	}


	protected function withImage(Add $add, $image)
	{
		if ($image)
		{
			// file name factory
			$fileName = time() . md5($image->getClientOriginalName());
			$fileExt = $image->getClientOriginalExtension();

			// image path
			$originalImagePath = public_path().'/upload/adds/' . $fileName . '.' . $fileExt;
			
			// save original
			$imager = new ImageManager;
			$imager->make($image)
				
				->save($originalImagePath);

			$add->file_name = $fileName;

			$add->file_ext = $fileExt;
		}

		return $add;
	}

}


