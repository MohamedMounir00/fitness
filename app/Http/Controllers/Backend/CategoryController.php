<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Helper;
use App\Http\Requests\Backend\CategoryRquest;
use App\Http\Requests\Backend\UpdateCategoryRquest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Alert;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:category-list');
        $this->middleware('permission:category-create', ['only' => ['create','store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    public function index()
    {


        return view('cat.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRquest $request)
    {

        $data = Category::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
        ]);
        Helper::UploadImge($request, 'image', 'imge', $data->id, 'cat');
        Alert::success(trans('backend.created'))->persistent("Close");

        return redirect()->route('cat.index');
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
        $data = Category::findOrFail($id);

        return view('cat.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRquest $request, $id)
    {
        //
        $data = Category::findOrFail($id);
        $data->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
        ]);
        Helper::UpdateImge($request, 'image', 'imge', $data->id, 'cat');
        Alert::success(trans('backend.updateFash'))->persistent("Close");

        return redirect()->route('cat.index');
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
        $data = Category::findOrFail($id);

        $data->delete();
        Alert::success(trans('backend.deleteFlash'))->persistent("Close");

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }


    public function getAnyDate()
    {
        $data = Category::all();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . route('cat.edit', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i></a>

            ';
            })   ->addColumn('delete', function ($data) {
                return '

          <button class="btn btn-delete btn btn-round  btn-danger" data-remote="delete_cat/' . $data->id . '"><i class="fa fa-remove"></i></button>
            ';
            })
            ->rawColumns(['action','delete'])
            ->make(true);
    }
}
