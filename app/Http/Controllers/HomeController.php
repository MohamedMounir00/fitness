<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Post;
use App\Recipe;
use App\Workout;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ex= Exercise::count();
    $work=Workout::count();
        $dites=Recipe::count();
            $post=Post::count();
        return view('home',compact('ex','work','dites','post'));
    }
}
