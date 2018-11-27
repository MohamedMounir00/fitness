<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecipeRequest extends FormRequest
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
            //

            'name_ar'=>'required',
            'name_en'=>'required',
            //'image'=>'required',
            'description_ar'=>'required',
            'description_en'=>'required',
            'ingredients_ar'=>'required',
            'ingredients_en'=>'required',
            'directions_ar'=>'required',
            'directions_en'=>'required',
            'calories'=>'required',
            'carbs'=>'required',
            'protein'=>'required',
            'fat'=>'required',
            'servings'   =>'required',
            'total_time' =>'required',
            'cat_id'     =>'required'
        ];
    }
}
