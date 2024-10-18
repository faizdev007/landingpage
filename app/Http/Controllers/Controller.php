<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Landingpage;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function landingpage(){
        return view('landingpages.layout1');
    }

    public function visitlandingpage($slug){
        $landingpagedata = Landingpage::where('slug',$slug)->first();
        return view('landingpages.layout1',compact('landingpagedata'));
    }
}
