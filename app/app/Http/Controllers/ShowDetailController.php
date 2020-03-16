<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;

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

        return view('action.detail', compact('picture'));
    }
}
