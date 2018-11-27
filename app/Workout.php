<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workout extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name_ar', 'name_en', 'image',
        'description_ar', 'description_en', 'duration',
        'status', 'level_id', 'gol_id',
    ];

    public function imgeWork()
    {

        return $this->hasOne(File::class,'item_id')->where('type_item','workout')->where('type_url','imge');
    }
    public function favorit()
    {
        return $this->belongsTo(Favorite::class,'id', 'item_id')->where('type_item','workouts')->where('user_id',auth()->user()->id);
    }

    public function gole()
    {
        return $this->belongsTo(Goal::class,'gol_id')->withTrashed();
    }
    public function level()
    {
        return $this->belongsTo(Level::class,'level_id')->withTrashed();
    }

    public function days()
    {
        return $this->hasMany(Day::class,'work_id');
    }

    public function day1()
    {
        return $this->hasMany(Day::class,'work_id')->where('day_number',1);
    }
    public function day2()
    {
        return $this->hasMany(Day::class,'work_id')->where('day_number',2);
    }
    public function day3()
    {
        return $this->hasMany(Day::class,'work_id')->where('day_number',3);
    }
    public function day4()
    {
        return $this->hasMany(Day::class,'work_id')->where('day_number',4);
    }
    public function day5()
    {
        return $this->hasMany(Day::class,'work_id')->where('day_number',5);
    }
    public function day6()
    {
        return $this->hasMany(Day::class,'work_id')->where('day_number',6);
    }
    public function day7()
    {
        return $this->hasMany(Day::class,'work_id')->where('day_number',7);
    }
}
