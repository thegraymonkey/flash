<?php namespace App\Http\Controllers;


use App\Add;
use App\Category;
use App\Game;
use Request;
use Auth;
use Validator;
use View;
use App\User;
use App\Http\Controllers\Controller;
use App;
use Intervention\Image\ImageManager;


class CategoryController extends Controller {


	public function show($id)
	{
		$category = Category::find($id);

		$categories = Category::all();

		$topAdds = Add::where('position', 'top')->get();

		$bottomAdds = Add::where('position', 'bottom')->get();

		$picAdds = Add::where('position', 'picture')->get();

		$linkAdds = Add::where('position', 'link')->get();

		$games = Game::where('category_id', $category->id )->paginate(12);

		return view('categories/show', [
									'category' => $category,
									'linkAdds' => $linkAdds, 
		 							'picAdds' => $picAdds, 
		 							'bottomAdds' => $bottomAdds, 
		 							'topAdds' => $topAdds,
		 							'current_page' => '/',
		 							'categories' => $categories,
		 							'games' => $games

								]);
	}

	public function index()
	{

		$categories = Category::orderBy('created_at', 'desc');

		return view('home', ['categories' => $categories]);

	}


	public function store()
	{
		// validation
		$input = Request::all();

		$rules = [
		'name' => 'required'
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{
			
			$category = new Category;

			$category->fill($input);
								
			$category->save();

			return redirect('home')->with('message', 'Category Created!');
		}	

		return redirect('home')->withErrors($validation);
	}


	public function destroy($categoryId)
	{
		if ($category = Category::find($categoryId))
		{
			if (Auth::user())
			{
				$category->delete();

				return redirect('home')->with('message', 'Category Deleted!');
			}			
			return redirect('home')->withErrors('You Can Not Do That!');			
		}
		return redirect('home')->withErrors('Category Does Not Exist!');	
	}


	public function edit($id)
	{
		$category = Category::find($id);

		return view('categories/edit')->with('category', $category);
	}
	

	public function update($id)
	{
		$input = Request::all();

		$rules = [
		'name' => 'required'
		];

		$validation = Validator::make($input, $rules);

		if ($validation->passes())
		{
			$category = Category::find($id);

			$image = Request::file('photo');

			if ($category)
			{

				$category->fill($input);
								
				$category->save();

				return redirect('home')->with('message', 'Category Changed!');
			}

			return redirect('home')->withErrors('Category Does Not Exist!');
		}

		return redirect('home')->withErrors($validation);
	}


}