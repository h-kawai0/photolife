<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPhotoEditRequest;
use App\Picture;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UpdatePhotoEditController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(EditPhotoEditRequest $request, $id)
    {
        
        if(!ctype_digit($id)){
            return redirect('/photoedit')->with('flash_message', '不正な操作が行われました。');
            
        }

        Log::debug($request);

        $picture = Picture::find($id);
        log::debug($picture->pic);

        $requestPic = (!empty($request->pic)) ? $request->pic->store('images/photo') : '';

        Log::debug($requestPic);

        $requestPic = (empty($request->pic) && !empty($picture->pic) ) ? $picture->pic : $requestPic;

        Log::debug($requestPic);

        $picture->title = $request->title;
        $picture->detail = $request->detail;
        
        if(!empty($request->pic)){

            Storage::delete('images/photo/'. $picture->pic);
            $picture->pic = basename($requestPic);
        }

        $picture->save();

        $tags_name = $request->input('tags');


        $tag_ids = [];

        foreach($tags_name as $tag_name){
            if(!empty($tag_name)){
                $tag = Tag::firstOrCreate([
                    'name' => $tag_name
                ]);
                $tag_ids[] = $tag->id;
            }
        }
        $picture->tags()->syncWithoutDetaching($tag_ids);

        return redirect('/mypage')->with('flash_message', '写真を編集しました!');

    }
}
