<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Resources\CatCollection;
use App\Http\Resources\RecipeCollection;
use App\Http\Resources\SliderCollection;
use App\Recipe;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecipeController extends Controller
{
    //


    public function AllCatDite(){
        $cat = Category::with('imgeCat')->get();
        return CatCollection::collection($cat);
    }


    public function Allrecipe(Request $request)
    {
        $recipe = Recipe::with('cat','favorit')->get();
        return RecipeCollection::Collection($recipe);
    }

    public function AllrecipeBYCat(Request $request)
    {
        $id = $request->id;
        $recipe = Recipe::with('cat','favorit')->where('cat_id',$id)->get();
        return RecipeCollection::Collection($recipe);
    }


    public function getrecipeBYid(Request $request)
    {
        $id = $request->id;
        $recipe = Recipe::with('cat','favorit')->findOrFail($id);
        return new RecipeCollection($recipe);
    }

    public function slider(){
        $slider= Slider::with('imgeSlider')->get();
        return SliderCollection::collection($slider);
    }

}
