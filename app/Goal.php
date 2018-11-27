<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goal extends Model
{
    use SoftDeletes;

    //
    protected $fillable = [
        'name_ar', 'name_en', 'image',
    ];

    public function imgeGo()
    {

        return $this->hasOne(File::class,'item_id')->where('type_item','gole')->where('type_url','imge');
    }
}
