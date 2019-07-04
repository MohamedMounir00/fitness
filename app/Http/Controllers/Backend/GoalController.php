<?php

namespace App\Http\Controllers\Backend;

use App\Goal;
use App\Helper;
use App\Http\Requests\Backend\GoalRequest;
use App\Http\Requests\Backend\UpdateGoalRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Alert;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:goal-list');
        $this->middleware('permission:goal-create', ['only' => ['create','store']]);
        $this->middleware('permission:goal-edit', ['only' => ['edit','update']]);
    }
    public function index()
    {
        //

        return view('gole.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('gole.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoalRequest $request)
    {

      $gole=  Goal::create([
           'name_ar'=> $request->name_ar,
           'name_en'=> $request->name_en,
        ]);
       Helper::UploadImge($request,'image','imge',$gole->id,'gole');
        Alert::success(trans('backend.created'))->persistent("Close");

        return redirect()->route('goal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $goal=Goal::findOrFail($id);

        return view('gole.edit',compact('goal'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGoalRequest $request, $id)
    {
        //
        $goal=Goal::findOrFail($id);
        $goal->update([
            'name_ar'=> $request->name_ar,
            'name_en'=> $request->name_en,
        ]);
        Helper::UpdateImge($request,'image','imge',$goal->id,'gole');
        Alert::success(trans('backend.updateFash'))->persistent("Close");

        return redirect()->route('goal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $goal=Goal::findOrFail($id);

        $goal->delete();
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
    public function delete($id)
    {
        //
        $goal=Goal::findOrFail($id);

        $goal->delete();
         Alert::success(trans('backend.deleteFlash'))->persistent("Close");

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }



    public function getAnyDate()
    {
        $goal = Goal::all();

        return Datatables::of($goal)

            ->addColumn('action', function ($goal) {
                return '<a href="'.route('goal.edit',$goal->id).'" class="btn btn-outline-primary"> ' . trans("backend.update") . ' </a>

            ';
            })
            ->addColumn('delete', function ($goal) {
                return '

          <button class="btn btn-outline-danger" data-remote="delete_gole/'.$goal->id. '">' . trans("backend.delete") . '</button>
            ';
            })
          ->rawColumns(['action','delete'])

            ->make(true);
    }

}
