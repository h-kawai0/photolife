<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPhotoEditRequest;
use App\Picture;
use App\Tag;
use Illuminate\Http\Request;

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
            return redirect('/photoedit');
            
        }
        
        $picture = Picture::find($id);

        $requestPic = (!empty($request->pic)) ? $request->pic->store('images/photo') : '';

        $requestPic = (empty($pic) && !empty($picture->pic) ) ? $picture->pic : $requestPic;

        $picture->title = $request->title;
        $picture->detail = $request->detail;
        $picture->pic = basename($requestPic);
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

        return redirect('/mypage');

    }
}
