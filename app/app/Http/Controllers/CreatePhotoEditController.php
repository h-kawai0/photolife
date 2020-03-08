<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Picture;
use App\Http\Requests\CreatePhotoEditRequest;
use Illuminate\Support\Facades\Auth;

class CreatePhotoEditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreatePhotoEditRequest $request)
    {
        
        $pic = $request->pic->store('images/photo');


        $picture = new Picture;
        
        $picture->user_id = Auth::id();
        $picture->title = $request->title;
        $picture->detail = $request->detail;
        $picture->pic = basename($pic);
        
        $picture->save();

        return redirect('/mypage');
    }
}
