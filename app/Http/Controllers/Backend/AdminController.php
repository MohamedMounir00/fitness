<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\AdminCreate;
use App\Http\Requests\Backend\Adminupdate;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use Alert;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:admin-list');
        $this->middleware('permission:admin-create', ['only' => ['create','store']]);
        $this->middleware('permission:admin-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:admin-delete', ['only' => ['destroy']]);
    }
    public function index()
    {


        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();

        return view('admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCreate $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'admin',
            'password' => bcrypt($request->password),

        ]);
        $user->assignRole($request->input('roles'));

        Alert::success(trans('backend.created'))->persistent("Close");

        return redirect()->route('admin.index');
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
        $roles = Role::all();

        $data = User::findOrFail($id);

        return view('admin.edit', compact('data', 'roles'));

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
        $data = User::findOrFail($id);
        $request->validate([
            //   'decs'=>'required',

            'name'=>'required',
            'email' => 'required|email|unique:users,email,'. $data->id,
            'password' => 'nullable|min:6',

        ]);
        if ($request->hasFile('imge')) {
            if ($data->imge != '') {

                if (File::exists(public_path($data->imge))) { // unlink or remove previous image from folder
                    unlink(public_path($data->imge));
                }
                $img_name = time() . '.' . $request->imge->getClientOriginalExtension();
                $request->imge->move(public_path('files/users/'), $img_name);
                $db_name = 'files/users/' . $img_name;
            } else {
                $img_name = time() . '.' . $request->imge->getClientOriginalExtension();
                $request->imge->move(public_path('files/users/'), $img_name);
                $db_name = 'files/users/' . $img_name;
            }
        } else
            $db_name = $data->imge;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->imge = $db_name;
        if (isset($request->password))
            $data->password = bcrypt($request->password);
        $data->update();

        if (!$data->hasRole('admin')) {
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $data->assignRole($request->input('roles'));
        }
        Alert::success(trans('backend.updateFash'))->persistent("Close");

        return redirect()->route('admin.index');
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
        $data = User::findOrFail($id);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $data->delete();

        Alert::success(trans('backend.deleteFlash'))->persistent("Close");
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }


    public function getAnyDate()
    {
        $data = User::where('role', 'admin');

        return Datatables::of($data)
            ->addColumn('roles', function ($data) {
                return $data->roles[0]->name;
            })

            ->addColumn('action', function ($data) {


                return '<a href="' . route('admin.edit', $data->id) . '" class="btn btn-outline-primary"> ' . trans("backend.update") . '  </a>';

            })
            ->addColumn('delete', function ($data) {

                if (auth()->user()->id!=$data->id) {

                    return '
          <button class="btn btn-outline-danger" data-remote="delete_admin/' . $data->id . '"> '.trans("backend.delete").' </button>';
                }
            })
            ->rawColumns(['action','delete'])
            ->make(true);
    }
}
