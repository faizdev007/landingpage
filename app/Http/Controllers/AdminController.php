<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\RoleMiddleware;
use App\Models\User;
use App\Models\LandingPage;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:0');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function userslist(){
        $users = User::select('id','name','email','role','created_at')->where('role','!=',0)->get();
        return view('admin.users',compact('users'));
    }

    public function landingpage(){
        $landingpages = LandingPage::select('id')->get();
        return view('admin.landingpage',compact('landingpages'));
    }

    public function savelandingpage(Request $request){
        dd($request);
    }
}
