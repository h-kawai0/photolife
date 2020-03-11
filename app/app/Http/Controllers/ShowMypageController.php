<?php

namespace App\Http\Controllers;

use App\Picture;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowMypageController extends Controller
{
    public function showMypage(User $user)
    {
        $user = Auth::user();

        $pictures = Picture::where('user_id', $user->id)->get();





        if( !empty($user->pic)){

            $is_pic = true;
        }else{
            $is_pic = false;
        }




        return view('action.mypage', compact('pictures', 'user', 'is_pic'));
    }
}
