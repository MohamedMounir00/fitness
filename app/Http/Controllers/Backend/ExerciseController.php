<?php

namespace App\Http\Controllers\Backend;

use App\Bodypart;
use App\Equipment;
use App\Exercise;
use App\Helper;
use App\Http\Requests\Backend\ExerciseRequest;
use App\Http\Requests\Backend\UpdateExerciseRequest;
use App\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Alert;
class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:exercise-list');
        $this->middleware('permission:exercise-create', ['only' => ['create','store']]);
        $this->middleware('permission:exercise-edit', ['only' => ['edit','update']]);
    }
    public function index()
    {


        return view('exercises.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $levels= Level::all();
        $eqs= Equipment::all();
        $bodys= Bodypart::all();

        return view('exercises.create',compact('levels','eqs','bodys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExerciseRequest $request)
    {
        $data = Exercise::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'rest' => $request->rest,
            'sets' => $request->sets,
            'value_date' => $request->value_date,
            'reps' => $request->reps,
            'instructions_en' => $request->instructions_en,
            'instructions_ar'=> $request->instructions_ar,
            'tips_ar'=> $request->tips_ar,
            'tips_en'=> $request->tips_en,
            'level_id'=> $request->level_id,
            'eq_id'=> $request->eq_id,
            'body_id'=> $request->body_id,
        ]);
        Helper::UploadImge($request, 'image', 'imge', $data->id, 'exercises');
        Helper::UploadImge($request, 'video', 'video', $data->id, 'exercises');
        Alert::success(trans('backend.created'))->persistent("Close");

        return redirect()->route('exercises.index');
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
        $levels= Level::all();
        $eqs= Equipment::all();
        $bodys= Bodypart::all();
        $data = Exercise::findOrFail($id);

        return view('exercises.edit', compact('data','levels','eqs','bodys'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExerciseRequest $request, $id)
    {
        //
        $data = Exercise::findOrFail($id);
        $data->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'rest' => $request->rest,
            'sets' => $request->sets,
            'value_date' => $request->value_date,
            'reps' => $request->reps,
            'instructions_en' => $request->instructions_en,
            'instructions_ar'=> $request->instructions_ar,
            'tips_ar'=> $request->tips_ar,
            'tips_en'=> $request->tips_en,
            'level_id'=> $request->level_id,
            'eq_id'=> $request->eq_id,
            'body_id'=> $request->body_id,
        ]);
        Helper::UploadImge($request, 'image', 'imge', $data->id, 'exercises');
        Helper::UploadImge($request, 'video', 'video', $data->id, 'exercises');
        Alert::success(trans('backend.created'))->persistent("Close");


        return redirect()->route('exercises.index');
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
        $data = Exercise::findOrFail($id);

        $data->delete();
        Alert::success(trans('backend.deleteFlash'))->persistent("Close");

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }


    public function getAnyDate()
    {
        $data = Exercise::all();

        return Datatables::of($data)
            ->addColumn('level', function ($data) {
            return (app()->getLocale() == 'ar') ? $data->level->name_ar : $data->level->name_en;
        })
            ->addColumn('bodypart', function ($data) {
                return (app()->getLocale() == 'ar') ? $data->bodypart->name_ar : $data->bodypart->name_en;
            })
            ->addColumn('equipment', function ($data) {
                return (app()->getLocale() == 'ar') ? $data->bodypart->name_ar : $data->bodypart->name_en;
            })
            ->addColumn('action', function ($data) {
                return '<a href="' . route('exercises.edit', $data->id) . '" class="btn btn-outline-primary">' . trans("backend.update") . '</a>

            ';
            })
            ->addColumn('delete', function ($data) {
                return '

          <button class="btn btn-outline-danger" data-remote="delete_exercises/' . $data->id . '">' . trans("backend.delete") . '</button>
            ';
            })
            ->rawColumns(['action','delete'])
            ->make(true);
    }
}
