<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserDeleteController extends Controller
{
    public function userDelete (Request $request){

        $user = Auth::user();

        $user->delete();

        return redirect('/');
    }
}
