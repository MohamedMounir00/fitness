<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PostCollection extends JsonResource
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
            'title'=>$this->title,
            'description'=>$this->description,
            'tag'=>$this->tag->title,
            'url'=> url($this->imgepost->url ),
            'favorit'=>($this->favorit != '') ? 1 : 0,
            'date'=>$this->created_at,



        ];
    }
}
