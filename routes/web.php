<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

Route::get('/', function () {
    return redirect('login');
});
Auth::routes();
});
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['admin', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function () {

    Route::get('/home', 'HomeController@index')->name('home');
////////////////////////////////Goal///////////////////
    Route::resource('goal','Backend\GoalController');
    Route::get('getgoal','Backend\GoalController@getAnyDate')->name('getgoal');
    Route::delete('delete_goal/{id}','Backend\GoalController@delete')->name('deletegoal');
//////////////////////////////////Bodypart/////////////////
    Route::get('getbody','Backend\BodypartController@getAnyDate')->name('getbody');
    Route::resource('body','Backend\BodypartController');
    Route::delete('delete_body/{id}','Backend\BodypartController@delete')->name('deletebody');
////////////////////////////////////////////////////////Category////
    Route::resource('cat','Backend\CategoryController');
    Route::get('getcat','Backend\CategoryController@getAnyDate')->name('getcat');
    Route::delete('delete_cat/{id}','Backend\CategoryController@delete')->name('deletecat');
///////////////////////////////////////Equipment///////////
    Route::resource('equipment','Backend\EquipmentController');
    Route::get('getequ','Backend\EquipmentController@getAnyDate')->name('getequ');
    Route::delete('delete_equipment/{id}','Backend\EquipmentController@delete')->name('deleteequipment');
/////////////////////////////////////////Level/////////////////
    Route::resource('level','Backend\LevelController');
    Route::get('getlevel','Backend\LevelController@getAnyDate')->name('getlevel');
    Route::delete('delete_level/{id}','Backend\LevelController@delete')->name('deletelevel');
//////////////////////////////////////////ex
    Route::resource('exercises','Backend\ExerciseController');
    Route::get('getex','Backend\ExerciseController@getAnyDate')->name('getex');
    Route::delete('delete_exercises/{id}','Backend\ExerciseController@delete')->name('delete_exercises');
    /////////////////////////////////////
    Route::resource('workout','Backend\WorkoutController');
    Route::get('getworkout','Backend\WorkoutController@getAnyDate')->name('getworkout');
    Route::delete('delete_workout/{id}','Backend\WorkoutController@delete')->name('delete_exercises');
    /////////////////////////////////////////////////////////////////////
    ///
    Route::get('getdites','Backend\RecipeController@getAnyDate')->name('getdites');
    Route::delete('delete_dites/{id}','Backend\RecipeController@delete')->name('delete_dites');
    Route::resource('dites','Backend\RecipeController');

    /////////////////////////////////post
    Route::get('getpost','Backend\PostController@getAnyDate')->name('getpost');
    Route::delete('delete_post/{id}','Backend\PostController@delete')->name('delete_post');
    Route::resource('post','Backend\PostController');

    /////////////////////////////////tag
    Route::get('gettag','Backend\TagController@getAnyDate')->name('gettag');
    Route::delete('delete_tag/{id}','Backend\TagController@delete')->name('delete_tag');
    Route::resource('tag','Backend\TagController');

    /////////////////////////////////users
    Route::get('getuser','Backend\UserController@getAnyDate')->name('getuser');
    Route::delete('delete_user/{id}','Backend\UserController@delete')->name('delete_user');
    Route::resource('user','Backend\UserController');

    /////////////////////////////////admin
    Route::get('getadmin','Backend\AdminController@getAnyDate')->name('getadmin');
    Route::delete('delete_admin/{id}','Backend\AdminController@delete')->name('delete_admin');
    Route::resource('admin','Backend\AdminController');

    //////////////////////////////slider
    Route::get('silder_all','Backend\SliderController@silder_all')->name('silder_all');
    Route::get('silder_edit/{id}','Backend\SliderController@silder_edit')->name('slider_edit');
    Route::put('silder_update/{id}','Backend\SliderController@silder_update')->name('silder_update');

    Route::resource('roles','Backend\RoleController');


});