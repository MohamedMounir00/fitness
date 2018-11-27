<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use SoftDeletes;

    //
    protected $fillable = [
        'name_ar', 'name_en', 'image',
    ];

    public function imgeLevel()
    {

        return $this->hasOne(File::class,'item_id')->where('type_item','levels')->where('type_url','imge');
    }
}
