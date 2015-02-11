<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'ratings';


	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [

		'rating',
		'game_id',
		'user_ip'
	
	];

	public function game()
	{
		return $this->belongsTo('App\Game');
	}


}