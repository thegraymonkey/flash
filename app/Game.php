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
	
	];

	
	public function categories(){
		return $this->belongsToMany(App\Category);
	}

	public function rating(){
		
	}

	public function getImagePath()
	{
		return sprintf('/upload/games/%s.%s', $this->file_name, $this->file_ext);
	}

}
