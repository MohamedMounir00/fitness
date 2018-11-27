<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentCollection extends JsonResource
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
            'comment'=>$this->comment,
            'post_id'=>$this->post_id,
            'user_name'=>$this->user->name,
            'user_photo'=>url($this->user->imge),
        ];
    }
}
