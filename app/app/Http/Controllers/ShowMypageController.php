<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowMypageController extends Controller
{
    public function showMypage()
    {
        $user = Auth::user();
        $pictures = Auth::user()->pictures();

        if( !empty($user->pic)){

            $is_pic = true;
        }else{
            $is_pic = false;
        }

        // dd($pictures);
        // dd($user);

        return view('action.mypage', compact('pictures', 'user', 'is_pic'));
    }
}
