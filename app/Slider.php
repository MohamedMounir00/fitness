<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected $fillable = [
        'id'
    ];
    public function imgeSlider()
    {

        return $this->hasOne(File::class,'item_id')->where('type_item','slider')->where('type_url','imge');
    }
}
