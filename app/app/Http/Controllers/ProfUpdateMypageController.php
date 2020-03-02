<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;

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
        
        $pic = (!empty($request->pic)) ? $request->pic->store('images/profile') : '';

        $pic = (empty($pic) && !empty($user->pic) ) ? $user->pic : $pic;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile = $request->profile;
        $user->pic = basename($pic);

        $user->save();

        return redirect('/mypage');


    }
}
