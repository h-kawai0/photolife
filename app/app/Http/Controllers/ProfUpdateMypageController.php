<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfUpdateMypageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        
        
        $this->validate($request, [
            'pic' => 'file|image|mimes:jpeg,png'
            ]);
            
        // $filename = $request->file()->store('public/images/profile');
        $user = Auth::user();

        //$file = $request->file('pic');
        
        $pic = $request->pic->store('images');




        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile = $request->profile;
        $user->pic = basename($pic);

        $user->save();

        return redirect('/mypage');


    }
}
