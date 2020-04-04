<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ajaxPanelController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $query = Picture::with('user:id,name,pic')->select('id', 'user_id', 'title', 'pic', 'created_at');


        switch($request->sort){
        case 0: 
            break;
        case 1: 
            $query = $query->latest('created_at');
            break;
        case 2: 
            $query = $query->oldest('created_at');
            break;
        default:
            break;
         }

        $pictures = $query->paginate(10);

        Log::debug($pictures);

        return $pictures;



        //return Picture::with('user:id,name,pic')->select('id', 'user_id', 'title', 'pic', 'created_at')->paginate(10);


    }
}
