<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'games';


	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [

		'title',
		'code',
		'file_name',
		'file_ext',
		'description',
		'instructions',
		'thumbnail',
		'category_id'
	
	];

	
	public function categories()
	{
		return $this->belongsTo('App\Category');
	}

	public function comments()
	{
		return $this->hasMany('App\Comment');
	}

	public function ratings()
	{
		return $this->hasMany('App\Rating');
	}

	public function getImagePath()
	{
		return sprintf('/upload/games/%s.%s', $this->file_name, $this->file_ext);
	}

	public function getRating()
	{
		
	}
}
