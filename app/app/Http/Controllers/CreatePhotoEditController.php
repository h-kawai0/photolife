<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Picture;
use App\Http\Requests\CreatePhotoEditRequest;
use App\Tag;
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
        dd($request);
        
        $pic = $request->pic->store('images/photo');


        $picture = new Picture;
        
        $picture->user_id = Auth::id();
        $picture->title = $request->title;
        $picture->detail = $request->detail;
        $picture->pic = basename($pic);
        $picture->save();

        $tags_name = $request->input('tags');

        
        $tag_ids = [];

        foreach($tags_name as $tag_name){
            if(!empty($tag_name)){
                $tag = Tag::firstOrCreate([
                    'name' => $tag_name,
                ]);
                $tag_ids[] = $tag->id;
            }
        }
        $picture->tags()->attach($tag_ids);

        

        return redirect('/mypage')->with('flash_message', '写真を投稿しました!');
    }
}
