<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comments';


	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		
		'name',
		'content',
		'game_id'
	
	];

	
	public function game()
	{
		return $this->belongsTo('App\Game');
	}

}