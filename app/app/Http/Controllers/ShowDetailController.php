<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ShowDetailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        if(!ctype_digit($id)){
            return redirect('/');
        }
        
        $picture = Picture::find($id);

        $user = Auth::user();

        $tags = $picture->tags()->get();

        if(!empty($user)){

            $isLike = Favorite::where('picture_id', '=', $id)->where('user_id', '=', $user->id )->first();
        }else{
            $isLike =  null;
            $user = null;

        }



        return view('action.detail', compact('picture', 'tags', 'user', 'isLike' ));
    }
}
