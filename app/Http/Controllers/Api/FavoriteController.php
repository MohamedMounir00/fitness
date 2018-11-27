<?php

namespace App\Http\Controllers\Api;

use App\Favorite;
use App\Http\Resources\Fave\FaveCollection;
use App\Http\Resources\ReturnStatusCollection;
use App\Http\Resources\Workout\GetWorkoutsByGols;
use App\User;
use App\Workout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    //

    public function addfavorite(Request $request)
    {
        $f = Favorite::where('item_id', $request->item_id)->where('type_item', $request->type_item)->where('user_id', auth()->user()->id)->count();
        if ($f < 1) {


            $add = Favorite::create([
                'item_id' => $request->item_id,
                'type_item' => $request->type_item,
                'user_id' => auth()->user()->id,

            ]);
            return new ReturnStatusCollection(true,'تم الحفظ بنجاح');
        }
        else{
            $f =Favorite::where('item_id', $request->item_id)->where('type_item', $request->type_item)->where('user_id', auth()->user()->id)->first();
          $f->delete();
            return new ReturnStatusCollection(true,'تم حذف المفضله ');

        }


    }


    public function get_fave(Request $request)

    {
        $type = $request->type;
        $id = $request->id;
        $user_id = auth()->user()->id;
         $fas = Favorite::with('faveWork','favedite','favepost')->where('type_item',$type)->where('user_id',auth()->user()->id)->get();
        return  FaveCollection::collection($fas);




    }
}
