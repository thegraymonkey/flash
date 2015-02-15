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
use Input;
use DB;


class ArchiveController extends Controller {


	public function show()
	{

		$month = Input::get('month');

		//$games = DB::select( DB::raw("SELECT * FROM games WHERE MONTHNAME(created_at) = :month"), array('month' => $month));
		//$games = App\Game::select( DB::raw("SELECT * FROM games WHERE MONTHNAME(created_at) = :month"), array('month' => $month));
		
		$games = App\Game::whereRaw( "MONTHNAME(created_at) = '$month'")->get();

		return view('archives.show', [
									'games' => $games,																		
		 							'current_page' => '/',		 							
		 							'month' => $month
									]);

	}

}