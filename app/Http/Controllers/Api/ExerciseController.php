<?php

namespace App\Http\Controllers\Api;

use App\Exercise;
use App\Http\Resources\Exercise\ExerciseCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExerciseController extends Controller
{
    //

    public function getExerciseByDay(Request $request)
    {
        $id = $request->id;

        $esx= Exercise::with('level','bodypart','equipment','video_url','imgeEx')->whereHas('day', function ($q) use ($id) {
        $q->where('day_id', $id);
    })->get();
        return  ExerciseCollection::collection($esx);
    }




    public function getExerciseByBodyParts(Request $request)
    {
        $id = $request->id;
        $esx= Exercise::with('level','bodypart','equipment','video_url','imgeEx')->where('body_id',$id)
        ->get();
        return  ExerciseCollection::collection($esx);

    }

    public function getExerciseByEquipment(Request $request)
    {
        $id = $request->id;
        $esx= Exercise::with('level','bodypart','equipment','video_url','imgeEx')->where('eq_id',$id)
            ->get();
        return  ExerciseCollection::collection($esx);

    }


}
