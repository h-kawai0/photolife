<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoDeleteController extends Controller
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
            return redirect('/mypage');
        }

        $picture = Picture::find($id);

        Storage::delete('images/photo/'. $picture->pic);
        $picture->delete();

        return redirect('/mypage')->with('flash_message', '写真を削除しました!');
    }
}
