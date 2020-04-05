<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowDetailController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        if(!ctype_digit($id)){
            return redirect('/');
        }

        $picture = Picture::find($id);

        $user = Auth::user();

        $tags = $picture->tags()->get();

        return view('action.detail', compact('picture', 'tags', 'user'));
    }
}
