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
        $landingpages = LandingPage::select('id','title','description','backgroundimg','sheet_id','sheet_name','updated_at')->get();
        return view('admin.landingpage',compact('landingpages'));
    }

    public function savelandingpage(Request $request){
        $request->validate([
            'title'=>'required',
            'backgroundimg'=>'required',
            'sheet_id'=>'required',
            'sheet_name'=>'required',
        ]);

        $record = LandingPage::create($request->all());

        if($record){
            if($request['backgroundimg']){
                $thumb = uploadFile($request['backgroundimg'],'LandingPage','image','landingpagethumbnail',1920);
            }
            LandingPage::where('id',$record->id)->update([
                'backgroundimg'=>$thumb[0]
            ]);
        }
        return back()->withSuccess('Landing Page Created Successfully!');
    }

    public function deleteLpage(Request $request){
        LandingPage::where('id',$request->id)->delete();

        return back()->withSuccess('Landing Page Move to Recycle Bin Successfully!');
    }

    public function landingpagerecyclebin(){
        $recycledata = LandingPage::whereNotNull('deleted_at')->get();

        return view('admin.landingpagerecyclebee',compact('recycledata'));
    }
}
