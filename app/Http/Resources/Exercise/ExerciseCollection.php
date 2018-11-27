<?php

namespace App\Http\Resources\Exercise;

use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseCollection extends JsonResource
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
            // 'lang'=>$request->lang
            'id'=>$this->id,
            'name'=>($request->lang == 'ar') ? $this->name_ar : $this->name_en,
            'instructions'=>($request->lang == 'ar') ? $this->instructions_ar : $this->instructions_en,
            'tips'=>($request->lang == 'ar') ? $this->tips_ar : $this->tips_en,
            'rest'=>$this->rest,
            'sets'=>$this->sets,
            'reps'=>$this->reps,
            'level'=> ($request->lang == 'ar') ? $this->level->name_ar : $this->level->name_en,
            'bodypart'=>($request->lang == 'ar') ? $this->bodypart->name_ar : $this->bodypart->name_en,
            'equipment'=>($request->lang == 'ar') ? $this->equipment->name_ar : $this->equipment->name_en,



            'imge'=>url($this->imgeEx->url ),
            'video'=>url($this->video_url->url ),


        ];    }
}
