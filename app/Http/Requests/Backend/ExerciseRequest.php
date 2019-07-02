<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ExerciseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_ar'=>'required',
            'name_en'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'video'=>'required|mimes:mp4,mov,ogg,qt|max:40240',
            'rest'=>'required|numeric',
            'sets'=>'required|numeric',
            'reps'=>'required|numeric',
            'instructions_ar'=>'required',
            'instructions_en'=>'required',
            'tips_ar'=>'required',
            'tips_en'=>'required',
            'level_id'=>'required',
            'eq_id'=>'required',
            'body_id'=>'required',
        ];
    }
}
