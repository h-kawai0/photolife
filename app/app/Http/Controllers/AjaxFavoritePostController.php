<?php

namespace App\Http\Controllers;

use App\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AjaxFavoritePostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $all = $request->all();

        $favoriteData = [
            'user_id' => $all['userId'],
            'picture_id' => $all['pictureId']
        ];

        Log::debug($favoriteData);

        $isLike = Favorite::where('picture_id', '=', $favoriteData['picture_id'])->where('user_id', '=', $favoriteData['user_id'])->first();

        if(!empty($isLike)){

            log::debug($isLike);
            $resultCount = $isLike->count();

        }
        

        if(!empty($resultCount)){

            log::debug($resultCount);
            $isLike->delete();
        }else{

            log::debug('hage');

            $favorite = new Favorite();

            $favorite->fill($favoriteData)->save();


        }
    }
}
