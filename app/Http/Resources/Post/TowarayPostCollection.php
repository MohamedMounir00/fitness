<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\PostCollection;
use Illuminate\Http\Resources\Json\Resource;

class TowarayPostCollection extends Resource
{
    private  $posts , $sliderPos;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function __construct($posts , $sliderPos)
    {
        $this->posts = $posts;
        $this->sliderPos = $sliderPos;
    }
    public function toArray($request)
    {
        return [
            'post'=>PostCollection::collection($this->posts),
            'sliderPos'=>PostCollection::collection($this->sliderPos),
        ];
    }
}
