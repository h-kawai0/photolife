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
        $pictures = Picture::paginate('10');

        return view('action.index', compact('pictures'));
    }
}
