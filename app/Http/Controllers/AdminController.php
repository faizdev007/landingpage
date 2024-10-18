<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\RoleMiddleware;
use App\Models\User;
use App\Models\LandingPage;
use Illuminate\Support\Str;

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
        $landingpages = LandingPage::select('id','title','slug','description','backgroundimg','sheet_id','sheet_name','updated_at')->get();
        return view('admin.landingpage',compact('landingpages'));
    }

    public function savelandingpage(Request $request){
        $request->validate([
            'title'=>'required',
            'backgroundimg'=>'',
            'sheet_id'=>'required',
            'sheet_name'=>'required',
        ]);

        if($request->id){
            LandingPage::where('id',$request->id)->update([
                'title'=>$request->title,
                'slug'=>Str::slug($request->title),
                'sheet_id'=>$request->sheet_id,
                'sheet_name'=>$request->sheet_name,
            ]);

            if($request['backgroundimg']){
                $thumb = uploadFile($request['backgroundimg'],'LandingPage','image','landingpagethumbnail',1920);
                
                LandingPage::where('id',$request->id)->update([
                    'backgroundimg'=>$thumb[0]
                ]);
            }


        }else{
            $record = LandingPage::create($request->all());
        }

        if(isset($record)){
            if($request['backgroundimg']){
                $thumb = uploadFile($request['backgroundimg'],'LandingPage','image','landingpagethumbnail',1920);
                
                LandingPage::where('id',$record->id)->update([
                    'slug'=>Str::slug($record->title),
                    'backgroundimg'=>$thumb[0]
                ]);
            }

        }

        if(isset($record)){
            return back()->withSuccess('Landing Page Created Successfully!');
        }else{
            return back()->withSuccess('Landing Page Updated Successfully!');
        }
    }

    public function moverecycleLpage(Request $request){
        LandingPage::where('id',$request->id)->delete();

        return back()->withSuccess('Landing Page Move to Recycle Bin Successfully!');
    }

    public function landingpagerecyclebin(){
        $recycledata = LandingPage::onlyTrashed()->get();

        return view('admin.landingpagerecyclebee',compact('recycledata'));
    }

    public function recoverLpage(Request $request){
        $recycledata = LandingPage::where('id',$request->id)->restore();

        return back()->withSuccess('Landing Page Recoverd from Recycle Bin Successfully!');
    }

    public function deleteLpage(Request $request){
        $recycledata = LandingPage::where('id',$request->id)->forceDelete();

        return back()->withSuccess('Landing Page Delete Permanently!');
    }
}
