<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CatCollection extends JsonResource
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
            'url'=>url($this->imgeCat->url)

            // 'url'=>  isset($this->imgeCat->url ) ? $this->imgeCat->url : '',


        ];
    }
}
