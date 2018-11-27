<?php

namespace App\Http\Resources\Fave;

use App\Http\Resources\PostCollection;
use App\Http\Resources\RecipeCollection;
use App\Http\Resources\Workout\GetWorkoutsByGols;
use Illuminate\Http\Resources\Json\JsonResource;

class FaveCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($request->type == 'workouts')
            return ['workout'=> GetWorkoutsByGols::collection($this->faveWork)];
        elseif ($request->type == 'diets')
            return ['diets'=> RecipeCollection::collection($this->favedite)];
        else
            return ['posts'=> PostCollection::collection($this->favepost)];



    }
}
