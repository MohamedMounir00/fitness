<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercise extends Model
{
    use SoftDeletes;

    //
    protected $fillable = [
        'name_ar', 'name_en', 'image','rest', 'sets',
        'reps','instructions_ar', 'instructions_en', 'tips_ar','tips_en',
        'level_id','eq_id', 'body_id','value_date'
    ];

    public function day()
    {
        return $this->belongsToMany(Day::class,'day_exes','ex_id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class,'level_id')->withTrashed();
    }
    public function equipment()
    {
        return $this->belongsTo(Equipment::class,'eq_id')->withTrashed();
    }
    public function bodypart()
    {
        return $this->belongsTo(Bodypart::class,'body_id')->withTrashed();
    }

    public function imgeEx()
    {

        return $this->hasOne(File::class,'item_id')->where('type_item','exercises')->where('type_url','imge');
    }
    public function video_url()
    {

        return $this->hasOne(File::class,'item_id')->where('type_item','exercises')->where('type_url','video');
    }
}
