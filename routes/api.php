<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('getAllBodyparts', 'Api\AllCatsController@getAllBodyparts');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', 'Api\UserController@store');

Route::post('login', 'Api\UserController@login');
Route::middleware(['auth:api'])->group(function () {



///////////////////////////cats////////////////////
    Route::get('getAllEquipment', 'Api\AllCatsController@getAllEquipment');
    Route::get('getAllGoles', 'Api\AllCatsController@getAllGoles');
    Route::get('getAlllevels', 'Api\AllCatsController@getAlllevels');
////////////////////////////////////Workouts////////////////////
    Route::get('getWorkoutsByGols', 'Api\WorkoutController@getWorkoutsByGols');
    Route::get('getWorkoutsByLevel', 'Api\WorkoutController@getWorkoutsByLevel');
/////////////////////////////////////////////////Exercise///////////////////////
    Route::get('getExerciseByDay', 'Api\ExerciseController@getExerciseByDay');
    Route::get('getExerciseByBodyParts', 'Api\ExerciseController@getExerciseByBodyParts');
    Route::get('getExerciseByEquipment', 'Api\ExerciseController@getExerciseByEquipment');
/////////////////////////////////  dite
///
    Route::get('AllCatDite', 'Api\RecipeController@AllCatDite');

    Route::get('Allrecipe', 'Api\RecipeController@Allrecipe');
    Route::get('slider', 'Api\RecipeController@slider');
    Route::get('AllrecipeBYCat', 'Api\RecipeController@AllrecipeBYCat');
    Route::get('getrecipeBYid', 'Api\RecipeController@getrecipeBYid');



    Route::get('AllPost', 'Api\PostController@AllPost');
    Route::post('post_comment', 'Api\PostController@createComent');
    Route::get('get_goments/{id}', 'Api\PostController@getComents');

//////////////////////////////favoirte //////////

    Route::post('addfavorite', 'Api\FavoriteController@addfavorite');
    Route::get('get_fave', 'Api\FavoriteController@get_fave');

    Route::post('update', 'Api\UserController@update');

});