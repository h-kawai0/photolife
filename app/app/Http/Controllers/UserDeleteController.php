<?php

namespace App\Http\Controllers;

use App\Mail\WithdrawMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;


class UserDeleteController extends Controller
{
    public function userDelete (Request $request){


        $user = Auth::user();

        $user->delete();

        Mail::to($user)
        ->send(new WithdrawMail($user));

        return redirect('/')->with('flash_message', '退会しました!');
    }
}
