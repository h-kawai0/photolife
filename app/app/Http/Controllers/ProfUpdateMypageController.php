<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;

class ProfUpdateMypageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ProfileRequest $request)
    {
    
        $user = Auth::user();
        
        $requestPic = (!empty($request->pic)) ? $request->pic->store('images/profile') : '';

        $$requestPic = (empty($request->pic) && !empty($user->pic) ) ? $user->pic : $requestPic;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile = $request->profile;

        if(!empty($request->pic)){

            Storage::delete('images/profile/'. $user->pic);
            $user->pic = basename($requestPic);

        }


        $user->save();

        return redirect('/mypage')->with('flash_message', 'プロフィールを編集しました!');


    }
}
