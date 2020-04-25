<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class AjaxChatRequestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        Log::debug(Comment::with('user:id,name,pic')->select('id','user_id','msg','created_at')->where('picture_id',$request['picture_id'])->get());

       // return Comment::with('user:id,name,pic')->get();

       return Comment::with('user:id,name,pic')->select('id','user_id','msg','created_at')->where('picture_id',$request['picture_id'])->get();


    }
}
