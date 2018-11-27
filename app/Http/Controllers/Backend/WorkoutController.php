<?php

namespace App\Http\Controllers\Backend;

use App\Day;
use App\Day_ex;
use App\Exercise;
use App\Goal;
use App\Helper;
use App\Http\Requests\Backend\WorkoutRequest;
use App\Level;
use App\Workout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Alert;
class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:workout-list');
        $this->middleware('permission:workout-create', ['only' => ['create','store']]);
        $this->middleware('permission:workout-edit', ['only' => ['edit','update']]);
    }
    public function index()
    {


        return view('workout.index');
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
        $exs= Exercise::all();
        $goal= Goal::all();

        return view('workout.create',compact('levels','goal','exs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkoutRequest $request)
    {

        $data = Workout::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'duration' => $request->duration,
            'status' =>1,
            'level_id' => $request->level_id,
            'gol_id' => $request->gol_id,
        ]);
        $day_number = 1;
        foreach ($request->ex_id as $main_select) {
            $day = Day::create([
                'day_number'    => $day_number,
                'work_id'       => $data->id,
            ]);
            foreach ($main_select as $select) {
                Day_ex::create([
                    'ex_id'         => $select,
                    'day_id'        => $day->id,
                ]);
            }
            $day_number++;
        }
        Helper::UploadImge($request, 'image', 'imge', $data->id, 'workout');
        Alert::success(trans('backend.created'))->persistent("Close");




        return redirect()->route('workout.index');
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
        $goal= Goal::all();

        $data = Workout::with('days')->findOrFail($id);
        $exs= Exercise::all();

        return view('workout.edit', compact('data','levels','exs','goal'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = Workout::findOrFail($id);
        $data->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'duration' => $request->duration,
            'status' =>1,
            'level_id' => $request->level_id,
            'gol_id' => $request->gol_id,
        ]);

        $day_number = 1;

            foreach ($request->ex_id as $main_select) {
            $day = Day::updateOrCreate([
                'day_number'    => $day_number,
                'work_id'       => $data->id,
            ]);
            foreach ($main_select as $select) {
                Day_ex::updateOrCreate([
                    'ex_id'         => $select,
                    'day_id'        => $day->id,
                ]);
            }
            $day_number++;
        }
        Helper::UploadImge($request, 'image', 'imge', $data->id, 'exercises');
        Alert::success(trans('backend.created'))->persistent("Close");


        return redirect()->route('workout.index');
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
        $data = Workout::findOrFail($id);

        $data->delete();
        Alert::success(trans('backend.deleteFlash'))->persistent("Close");

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }


    public function getAnyDate()
    {
        $data = Workout::all();

        return Datatables::of($data)
            ->addColumn('level', function ($data) {
                return (app()->getLocale() == 'ar') ? $data->level->name_ar : $data->level->name_en;
            })
            ->addColumn('gole', function ($data) {
                return (app()->getLocale() == 'ar') ? $data->gole->name_ar : $data->gole->name_en;
            })

            ->addColumn('action', function ($data) {
                return '<a href="' . route('workout.edit', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i></a>

            ';
            })
            ->addColumn('delete', function ($data) {
                return '

          <button class="btn btn-delete btn btn-round  btn-danger" data-remote="delete_workout/' . $data->id . '"><i class="fa fa-remove"></i></button>
            ';
            })
            ->rawColumns(['action','delete'])
            ->make(true);
    }
}
