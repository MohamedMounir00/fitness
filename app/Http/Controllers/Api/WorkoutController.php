<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Workout\GetWorkoutsByGols;
use App\Workout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkoutController extends Controller
{
    //

    public function  getWorkoutsByGols(Request $request){
     //   $lang =$request->lang;
        $id = $request->id;
        $work= Workout::with('imgeWork','gole','level','days','favorit')->where('gol_id',$id)->get();
    return  GetWorkoutsByGols::collection($work);


    }


    public  function getWorkoutsByLevel (Request $request)
    {
        $id = $request->id;
        $work= Workout::with('imgeWork','gole','level','days','favorit')->where('level_id',$id)->get();

        return  GetWorkoutsByGols::collection($work);
    }
}
