<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
         // $pictures = Picture::paginate('10');

       // $pictures = Picture::pictureFilter(request('created_at'))->get();

       $query = Picture::select('id', 'user_id', 'title', 'pic', 'created_at');

       
        switch($request->sort){
            case 0: 
                $sortBy = 0;
                break;
            case 1: 
                $query = $query->latest('created_at');
                $sortBy = 1;
                break;
            case 2: 
                $query = $query->oldest('created_at');
                $sortBy = 2;
                break;
            default: 
                $sortBy = null;
                break;
        }

        $pictures = $query->paginate('10');



        return view('action.index', compact('pictures', 'sortBy'));
    }
}
