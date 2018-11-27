<?php

namespace App\Http\Resources\Workout;

use App\Http\Resources\GoleCollection;
use App\Http\Resources\LevelCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class GetWorkoutsByGols extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>($request->lang == 'ar') ? $this->name_ar : $this->name_en,
            'description'=>($request->lang == 'ar') ? $this->description_ar : $this->description_en,
            'duration'=>$this->duration,
            'level'=> ($request->lang == 'ar') ? $this->level->name_ar : $this->level->name_en,
            'gole'=>($request->lang == 'ar') ? $this->gole->name_ar : $this->gole->name_en,
            'days'=>DaysCollection::collection($this->days) ,
            'url'=>url($this->imgeWork->url),
            'favorit'=>($this->favorit != '') ? 1 : 0,

        ];
    }
}
