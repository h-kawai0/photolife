<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PassRequest;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\ChangePasswordMail;

class updatePassEditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(PassRequest $request)
    {
        $user = Auth::user();

        $user->password = bcrypt($request->pass_new);

        $user->save();

        Mail::to($user)
        ->send(new ChangePasswordMail($user));

        return redirect('mypage');
    }
}
