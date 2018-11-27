<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use SoftDeletes;

    //
    protected $fillable = [
        'name_ar', 'name_en', 'image',
        'description_ar', 'description_en', 'ingredients_ar',
        'ingredients_en', 'directions_ar', 'directions_en',
        'calories', 'carbs', 'protein',
        'fat', 'servings', 'total_time',
        'status', 'cat_id'

    ];
    public  function  cat(){
        return $this->belongsTo(Category::class,'cat_id')->withTrashed();
    }

    public function imgeRE()
    {

        return $this->hasOne(File::class,'item_id')->where('type_item','recipes')->where('type_url','imge');
    }

    public function favorit()
    {
        return $this->belongsTo(Favorite::class,'id', 'item_id')->where('type_item','diets')->where('user_id',auth()->user()->id);
    }
}
