<?php

namespace App\Http\Controllers\Api;

use App\Bodypart;
use App\Equipment;
use App\Goal;
use App\Http\Resources\BodypartCollection;
use App\Http\Resources\EquipmentCollection;
use App\Http\Resources\GoleCollection;
use App\Http\Resources\LevelCollection;
use App\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllCatsController extends Controller
{
    //

    public function  getAllBodyparts(Request $request)
    {
       $body= Bodypart::with('imgebody')->get();
       return BodypartCollection::collection($body);
    }

    public function getAllEquipment(){


    $equipment=Equipment::with('imgeEq')->get();
    return EquipmentCollection::collection($equipment);

    }


    public function getAllGoles(){
    $gole = Goal::with('imgeGo')->get();
    return GoleCollection::collection($gole);
    }

    public function getAlllevels(){
        $level = Level::with('imgeLevel')->get();
        return  LevelCollection::collection($level);
    }
}
