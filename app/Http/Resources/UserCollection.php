<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCollection extends JsonResource
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
                 'id'=> $this->id,
                 'name'=>$this->name,
                 'user_photo'=>url($this->imge),
                 'email'=>$this->email,
                 'token'=>$this->token,
                 'created_at'=>Carbon::createFromFormat('Y-m-d H:i:s',  $this->created_at)->format('Y-m-d'),

             ];

    }
}
