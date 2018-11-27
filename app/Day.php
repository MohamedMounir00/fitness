<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{

    //
    protected $fillable = [
        'day_number', 'work_id', 'ex_id',
    ];
    public function day_exs()
    {
        return $this->hasMany(Day_ex::class,'day_id');
    }
}
