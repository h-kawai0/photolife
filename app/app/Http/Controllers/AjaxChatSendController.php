<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AjaxChatSendController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        Log::debug($request);

        $comment = new Comment();

        $all = $request->all();

        $commentData = [
            'user_id' => $all['userId'],
            'picture_id' => $all['pictureId'],
            'msg' => $all['msg']
        ];

        Log::debug($commentData);

        $comment->fill($commentData)->save();

    }
}
