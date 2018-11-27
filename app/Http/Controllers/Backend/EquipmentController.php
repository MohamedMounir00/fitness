<?php

namespace App\Http\Controllers\Backend;

use App\Bodypart;
use App\Equipment;
use App\Helper;
use App\Http\Requests\Backend\EquipmentRequest;
use App\Http\Requests\Backend\UpdateEquipmentRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Alert;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    }
     *
     * /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     *
     *    * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('equipment.index');
    }

    function __construct()
    {
        $this->middleware('permission:equipment-list');
        $this->middleware('permission:equipment-create', ['only' => ['create','store']]);
        $this->middleware('permission:equipment-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:equipment-delete', ['only' => ['destroy']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('equipment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipmentRequest $request)
    {

        $data = Equipment::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
        ]);
        Helper::UploadImge($request, 'image', 'imge', $data->id, 'equipment');
        Alert::success(trans('backend.created'))->persistent("Close");

        return redirect()->route('equipment.index');
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
        $data = Equipment::findOrFail($id);

        return view('equipment.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEquipmentRequest $request, $id)
    {
        //
        $data = Equipment::findOrFail($id);
        $data->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
        ]);
        Helper::UpdateImge($request, 'image', 'imge', $data->id, 'equipment');
        Alert::success(trans('backend.updateFash'))->persistent("Close");

        return redirect()->route('equipment.index');
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
        $data = Equipment::findOrFail($id);

        $data->delete();
        Alert::success(trans('backend.deleteFlash'))->persistent("Close");

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }


    public function getAnyDate()
    {
        $data = Equipment::all();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('equipment.edit', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i></a>

            ';
            })
            ->addColumn('delete', function ($data) {
                return '

          <button class="btn btn-delete btn btn-round  btn-danger" data-remote="delete_equipment/' . $data->id . '"><i class="fa fa-remove"></i></button>
            ';
            })
            ->rawColumns(['action','delete'])
            ->make(true);
    }
}
