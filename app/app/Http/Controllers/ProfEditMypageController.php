<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfEditMypageController extends Controller
{
    public function __invoke()
    {

        $user = Auth::user();


        return view('action.profEdit', compact('user'));
    }
}
