<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipment extends Model
{
    use SoftDeletes;

    //
    protected $fillable = [
        'name_ar', 'name_en', 'image',
    ];

    public function imgeEq()
    {

        return $this->hasOne(File::class,'item_id')->where('type_item','equipment')->where('type_url','imge');
    }
}
