<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function mypage()
    {
        $pictures = Auth::user()->pictures()->get();
        return view('action.mypage', compact('pictures'));
    }
}
