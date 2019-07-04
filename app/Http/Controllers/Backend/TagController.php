<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\TagRequest;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Alert;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:tag-list');
        $this->middleware('permission:tag-create', ['only' => ['create','store']]);
        $this->middleware('permission:tag-edit', ['only' => ['edit','update']]);
    }
    public function index()
    {


        return view('tag.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {

        $data = Tag::create([
            'title'=>$request->title,
        ]);
        Alert::success(trans('backend.created'))->persistent("Close");

        return redirect()->route('tag.index');
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

        $data = Tag::findOrFail($id);

        return view('tag.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        //
        $data = Tag::findOrFail($id);
        $data->update([
            'title'=>$request->title,

        ]);
        Alert::success(trans('backend.updateFash'))->persistent("Close");

        return redirect()->route('tag.index');
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
        $data = Tag::findOrFail($id);

        $data->delete();
        Alert::success(trans('backend.deleteFlash'))->persistent("Close");

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }


    public function getAnyDate()
    {
        $data = Tag::all();

        return Datatables::of($data)

            ->addColumn('action', function ($data) {
                return '<a href="' . route('tag.edit', $data->id) . '" class="btn btn-outline-primary">' . trans("backend.update") . '</a>

            ';
            })
            ->addColumn('delete', function ($data) {
                return '

          <button class="btn btn-outline-danger" data-remote="delete_tag/' . $data->id . '">' . trans("backend.delete") . '</button>
            ';
            })
            ->rawColumns(['action','delete'])
            ->make(true);
    }
}
