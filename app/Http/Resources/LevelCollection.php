<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LevelCollection extends JsonResource
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
            'url'=>url($this->imgeLevel->url)

           // 'url'=>  isset($this->imgeLevel->url ) ? $this->imgeLevel->url : '',


        ];
    }
}
