<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //

    protected $fillable = [
        'url', 'type_url', 'item_id','type_item'
    ];

    protected $hidden = [
        'type_url', 'id','item_id','type_item','created_at','updated_at'
    ];
}
