<?php

namespace App\Http\Controllers;

use App\Picture;
use Illuminate\Http\Request;

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
        // return Picture::paginate(10);
        return Picture::with('user:id,name,pic')->select('id', 'user_id', 'title', 'pic', 'created_at')->paginate(10);
    }
}
