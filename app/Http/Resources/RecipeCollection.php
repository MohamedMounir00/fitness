<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipeCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'name'=>($request->lang == 'ar') ? $this->name_ar : $this->name_en,
            'description'=>($request->lang == 'ar') ? $this->description_ar : $this->description_en,
            'ingredients'=>($request->lang == 'ar') ? $this->ingredients_ar : $this->ingredients_en,
            'directions'=>($request->lang == 'ar') ? $this->directions_ar : $this->directions_en,
            'calories'=>$this->calories,
            'carbs'=>$this->carbs,
            'protein'=>$this->protein,
            'fat'=>$this->fat,
            'servings'=>$this->servings,
            'total_time'=>$this->total_time,
            'status'=>$this->status,
            'cat'=>($request->lang == 'ar') ? $this->cat->name_ar : $this->cat->name_en,
            'url'=>  url($this->imgeRE->url),
            'favorit'=>($this->favorit != '') ? 1 : 0,

        ];
    }
}
