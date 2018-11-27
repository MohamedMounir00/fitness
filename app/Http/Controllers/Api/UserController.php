<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\UpdateUserRequest;
use App\Http\Resources\ReturnStatusCollection;
use App\Http\Resources\UpdateUserCollection;
use App\Http\Resources\UserCollection;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //


    public function store(RegisterRequest $request)
    {
        //
        $user= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>'user',
            'password'=> bcrypt($request->password),

        ]);
        $client = \Laravel\Passport\Client::where('password_client', 1)->first();

        $request->request->add([
            'grant_type'    => 'password',
            'client_id'     => $client->id,
            'client_secret' => $client->secret,
            'username'      => $user['email'],
            'password'      => $user['password'],
            'scope'         => null,
            //'type'         => $user->hasRole('translator') ? 'translator' : 'user',
        ]);

        // Fire off the internal request.
        $proxy = Request::create(
            'oauth/token',
            'POST'
        );

        //return \Route::dispatch($proxy);
        $user['token'] =  $user->createToken('MyApp')->accessToken;
        return new UserCollection($user);
    }


    public function update(UpdateUserRequest $request)
    {
        //


        $user = User::findOrFail(auth()->user()->id);

        if ($request->hasFile('imge')) {
            if ($user->imge !='') {

                if (File::exists(public_path($user->imge))) { // unlink or remove previous image from folder
                    unlink(public_path($user->imge));
                }
                $img_name = time() . '.' . $request->imge->getClientOriginalExtension();
                $request->imge->move(public_path('files/users/'), $img_name);
                $db_name = 'files/users/' . $img_name;
            }
            else{
                $img_name = time() . '.' . $request->imge->getClientOriginalExtension();
                $request->imge->move(public_path('files/users/'), $img_name);
                $db_name = 'files/users/' . $img_name;
            }
        } else
            $db_name = $user->imge;


            $user->name=$request->name;
            $user->email=$request->email;
            $user->imge=$db_name;
            if (isset($request->password))
            $user->password= bcrypt($request->password);
           $user->save();

        return new UpdateUserCollection($user);
    }



    public function login(Request $request){

        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $user= User::where('email',$request->email)->first();
        if(!$user){
            return new ReturnStatusCollection(false,'اسم المستخدم او كلمه المرور خطاء ');

        }
        if(Hash::check($request->password, $user->password)){
            $client = \Laravel\Passport\Client::where('password_client', 1)->first();

            $request->request->add([
                'grant_type'    => 'password',
                'client_id'     => $client->id,
                'client_secret' => $client->secret,
                'username'      => $user['email'],
                'password'      => $user['password'],
                'scope'         => null,
                //'type'         => $user->hasRole('translator') ? 'translator' : 'user',
            ]);

            // Fire off the internal request.
            $proxy = Request::create(
                'oauth/token',
                'POST'
            );

            //return \Route::dispatch($proxy);
            $user['token'] =  $user->createToken('MyApp')->accessToken;


            return new UserCollection($user);



        }else{
            return new ReturnStatusCollection(false,'اسم المستخدم او كلمه المرور خطاء ');
        }
    }




}
