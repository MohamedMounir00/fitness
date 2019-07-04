<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Helper;
use App\Http\Requests\Backend\RecipeRequest;
use App\Http\Requests\Backend\UpdateRecipeRequest;
use App\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Alert;
class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:recipe-list');
        $this->middleware('permission:recipe-create', ['only' => ['create','store']]);
        $this->middleware('permission:recipe-edit', ['only' => ['edit','update']]);
    }
    public function index()
    {


        return view('dites.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cat =Category::all();
        return view('dites.create',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipeRequest $request)
    {

        $data = Recipe::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'description_ar' => $request->description_ar,
            'description_en'=> $request->description_en,
            'ingredients_ar'=> $request->ingredients_ar,
            'ingredients_en'=> $request->ingredients_en,
            'directions_ar'=> $request->directions_ar,
            'directions_en'=> $request->directions_en,
            'calories'=> $request->calories,
            'carbs'=> $request->carbs,
            'protein'=> $request->protein,
            'fat'=> $request->fat,
            'servings'=> $request->servings,
            'total_time'=> $request->total_time,
            'status'=>1,
            'cat_id'=> $request->cat_id
        ]);
        Helper::UploadImge($request, 'image', 'imge', $data->id, 'recipes');
        Alert::success(trans('backend.created'))->persistent("Close");

        return redirect()->route('dites.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cat =Category::all();

        $data = Recipe::findOrFail($id);

        return view('dites.edit', compact('data','cat'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecipeRequest $request, $id)
    {
        //
        $data = Recipe::findOrFail($id);
        $data->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'description_ar' => $request->description_ar,
            'description_en'=> $request->description_en,
            'ingredients_ar'=> $request->ingredients_ar,
            'ingredients_en'=> $request->ingredients_en,
            'directions_ar'=> $request->directions_ar,
            'directions_en'=> $request->directions_en,
            'calories'=> $request->calories,
            'carbs'=> $request->carbs,
            'protein'=> $request->protein,
            'fat'=> $request->fat,
            'servings'=> $request->servings,
            'total_time'=> $request->total_time,
            'status'=>1,
            'cat_id'=> $request->cat_id
        ]);
        Helper::UpdateImge($request, 'image', 'imge', $data->id, 'recipes');
        Alert::success(trans('backend.updateFash'))->persistent("Close");

        return redirect()->route('dites.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function delete($id)
    {
        //
        $data = Recipe::findOrFail($id);

        $data->delete();
        Alert::success(trans('backend.deleteFlash'))->persistent("Close");

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }


    public function getAnyDate()
    {
        $data = Recipe::all();

        return Datatables::of($data)
            ->addColumn('cat', function ($data) {
                return (app()->getLocale() == 'ar') ? $data->cat->name_ar : $data->cat->name_en;
            })
            ->addColumn('action', function ($data) {
                return '<a href="' . route('dites.edit', $data->id) . '" class="btn btn-outline-primary">' . trans("backend.update") . '</a>

            ';
            })
            ->addColumn('delete', function ($data) {
                return '

          <button class="btn btn-outline-danger" data-remote="delete_dites/' . $data->id . '">' . trans("backend.delete") . '</button>
            ';
            })
            ->rawColumns(['action','delete'])
            ->make(true);
    }
}
