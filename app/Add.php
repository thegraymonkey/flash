<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Add extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'adds';


	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [

		'title',
		'link',
		'file_name',
		'file_ext',
		'description',
		'position',
		'thumbnail',
	
	];

	public function getImagePath()
	{
		return sprintf('/upload/adds/%s.%s', $this->file_name, $this->file_ext);
	}
	
}

