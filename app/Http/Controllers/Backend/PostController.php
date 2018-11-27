<?php

namespace App\Http\Controllers\Backend;

use App\Helper;
use App\Http\Requests\Backend\PostRequest;
use App\Http\Requests\Backend\UpostPostRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Alert;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:post-list');
        $this->middleware('permission:post-create', ['only' => ['create','store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit','update']]);
    }
    public function index()
    {


        return view('post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tag =Tag::all();
        return view('post.create',compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $data = Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'tag_id'=>$request->tag_id,
            'user_id'=>auth()->user()->id,

            'status'=>1

        ]);
        Helper::UploadImge($request, 'image', 'imge', $data->id, 'post');
        Alert::success(trans('backend.created'))->persistent("Close");

        return redirect()->route('post.index');
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
        $tag =Tag::all();

        $data = Post::findOrFail($id);

        return view('post.edit', compact('data','tag'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpostPostRequest $request, $id)
    {
        //
        $data = Post::findOrFail($id);
        $data->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'tag_id'=>$request->tag_id,
            'user_id'=>auth()->user()->id,

            'status'=>1
        ]);
        Helper::UpdateImge($request, 'image', 'imge', $data->id, 'post');
        Alert::success(trans('backend.updateFash'))->persistent("Close");

        return redirect()->route('post.index');
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
        $data = Post::findOrFail($id);

        $data->delete();
        Alert::success(trans('backend.deleteFlash'))->persistent("Close");

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }


    public function getAnyDate()
    {
        $data = Post::all();

        return Datatables::of($data)
            ->addColumn('tag', function ($data) {
                return  $data->tag->title ;
            })
            ->addColumn('action', function ($data) {
                return '<a href="' . route('post.edit', $data->id) . '" class="btn btn-round  btn-primary"><i class="fa fa-edit"></i></a>

            ';
            })
            ->addColumn('delete', function ($data) {
                return '

          <button class="btn btn-delete btn btn-round  btn-danger" data-remote="delete_post/' . $data->id . '"><i class="fa fa-remove"></i></button>
            ';
            })
            ->rawColumns(['action','delete'])
            ->make(true);
    }
}
