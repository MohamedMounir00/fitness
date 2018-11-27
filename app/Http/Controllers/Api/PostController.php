<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use App\Http\Resources\CommentCollection;
use App\Http\Resources\Post\TowarayPostCollection;
use App\Http\Resources\PostCollection;
use App\Http\Resources\ReturnStatusCollection;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //
    public function AllPost()
    {
        $sliderPost= Post::with('tag','imgepost','favorit')->orderByDesc('created_at')->take(3)->get();
        $posts= Post::with('tag','imgepost','favorit')->get();

     //   return PostCollection::collection($posts);
        return new TowarayPostCollection($posts,$sliderPost);

    }


    public  function createComent(Request $request)
    {
        Comment::create([
            'comment'=>$request->comment,
            'user_id'=>auth()->user()->id,
            'post_id'=>$request->post_id,

        ]);
        return new ReturnStatusCollection(true,'تم اضافه كمنت ');
    }
    public  function getComents($id)
    {
        $comment=Comment::with('user')->where('post_id',$id)->get();
        return CommentCollection::collection($comment);
    }
}
