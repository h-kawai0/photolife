<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;

class EditPhotoEditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        if(!ctype_digit($id)){
            return redirect('/photoEdit');
        }

        $picture = Picture::find($id);

        $tags = $picture->tags()->get();


        return view('action.editPhotoEdit', compact('picture', 'tags'));
    }
}
