<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bodypart extends Model
{
    use SoftDeletes;

    //

    protected $fillable = [
        'name_ar', 'name_en', 'image',
    ];

    public function imgebody()
    {

        return $this->hasOne(File::class,'item_id')->where('type_item','bodyparts')->where('type_url','imge');
    }
}
