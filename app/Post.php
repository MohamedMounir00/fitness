<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    //

    protected $fillable = [
        'title', 'description', 'tag_id','user_id','status'
    ];

    public  function  tag(){
        return $this->belongsTo(Tag::class,'tag_id')->withTrashed();
    }


    public function imgepost()
    {

        return $this->hasOne(File::class,'item_id')->where('type_item','post')->where('type_url','imge');
    }
    public function favorit()
    {
        return $this->belongsTo(Favorite::class,'id', 'item_id')->where('type_item','post')->where('user_id',auth()->user()->id);
    }
}
