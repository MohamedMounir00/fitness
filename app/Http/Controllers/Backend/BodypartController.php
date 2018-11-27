<?php

namespace App\Http\Controllers\Backend;

use App\Bodypart;
use App\Helper;
use App\Http\Requests\Backend\BodypartRquest;
use App\Http\Requests\Backend\UpdateBodypartRquest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Alert;
class BodypartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:bodypart-list');
        $this->middleware('permission:bodypart-create', ['only' => ['create','store']]);
        $this->middleware('permission:bodypart-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:bodypart-delete', ['only' => ['destroy']]);
    }
    public function index()
    {


        return view('body.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('body.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BodypartRquest $request)
    {

        $data=  Bodypart::create([
            'name_ar'=> $request->name_ar,
            'name_en'=> $request->name_en,
        ]);
        Helper::UploadImge($request,'image','imge',$data->id,'bodyparts');
        Alert::success(trans('backend.created'))->persistent("Close");

        return redirect()->route('body.index');
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
        $data=Bodypart::findOrFail($id);

        return view('body.edit',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBodypartRquest $request, $id)
    {
        //
        $data=Bodypart::findOrFail($id);
        $data->update([
            'name_ar'=> $request->name_ar,
            'name_en'=> $request->name_en,
        ]);
        Helper::UpdateImge($request,'image','imge',$data->id,'bodyparts');
        Alert::success(trans('backend.updateFash'))->persistent("Close");

        return redirect()->route('body.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
    public function delete($id)
    {
        //
        $data=Bodypart::findOrFail($id);

        $data->delete();
        Alert::success(trans('backend.deleteFlash'))->persistent("Close");

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }



    public function getAnyDate()
    {
        $data = Bodypart::all();

        return Datatables::of($data)

            ->

            addColumn('action', function ($data) {

                return '<a href="' . route('body.edit', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i></a>
            ';
            })

            ->addColumn('delete', function ($data) {
                return '

          <button class="btn btn-delete btn btn-round  btn-danger" data-remote="delete_body/'.$data->id. '"><i class="fa fa-remove"></i></button>
            ';
            })
            ->rawColumns(['action','delete'])

            ->make(true);
    }

}
