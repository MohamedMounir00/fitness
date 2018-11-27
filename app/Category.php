<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    //
    protected $fillable = [
        'name_ar', 'name_en', 'image',
    ];

    public function imgeCat()
    {

        return $this->hasOne(File::class,'item_id')->where('type_item','cat')->where('type_url','imge');
    }
}
