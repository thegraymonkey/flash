<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingObserver {

    public function created($model)
    {
         $game = $model->game;

         $ratings = $game->ratings()->lists('rating');

         $ratingsCount = count($ratings);

         $ratingsSum = array_sum($ratings);
          
         $avg = $ratingsSum / $ratingsCount;

		 $game->rating = $avg;

		 $game->save();
    }

}