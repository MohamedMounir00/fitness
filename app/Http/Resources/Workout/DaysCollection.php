<?php

namespace App\Http\Resources\Workout;

use Illuminate\Http\Resources\Json\JsonResource;

class DaysCollection extends JsonResource
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
            'day'=>$this->day_number,
        ];
    }
}
