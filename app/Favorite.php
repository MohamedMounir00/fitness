<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{

    //

    protected $fillable = [
        'item_id', 'type_item', 'user_id',
    ];

    public function faveWork()
    {
        return $this->hasMany(Workout::class ,'id', 'item_id');
    }

    public function favedite()
    {
        return $this->hasMany(Recipe::class ,'id', 'item_id');

    }
    public function favepost()
    {
        return $this->hasMany(Post::class ,'id', 'item_id');

    }
}
