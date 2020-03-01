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

        // dd($pictures);
        // dd($user);

        return view('action.mypage', compact('pictures', 'user'));
    }
}
