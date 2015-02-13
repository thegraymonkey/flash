<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewObserver {

    public function created($model)
    {
         $game = $model->game;

         $views = $game->views()->count();

         
		 $game->views = $views;

		 $game->save();
    }

}