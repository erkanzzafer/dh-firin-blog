<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
class AdminController extends Controller
{
    //
    public function index(Request $request){
        return view('back.dashboard');
    }

    public function logout (Request $request){
        Auth::guard('web')->logout();
        return redirect()->route('admin.login');
    }

    public function changePassword (){
        return view('back.pages.changePassword');
    }

    public function changeBlogLogo (Request $request){


        $settings=Setting::find(1);
        $logo_path='back/image/logo-favicon';
        $old_logo=$settings->getAttributes()['favicon'];

        $file=$request->file('blog_logo');
        $filename=time().'_'.rand(1,100000).".". $file->getClientOriginalExtension();

         if($request->hasFile('blog_logo')){
            if ($old_logo != null && File::exists(public_path($logo_path.$old_logo))){
                File::delete(public_path($logo_path.$old_logo));
                dd('yes');
            }

            $upload=$file->move(public_path($logo_path),$filename);
            if ($upload){
                $settings->update([
                    'favicon'=>$filename
                ]);
                session()->flash('success', 'Görsel Güncellendi');

             return redirect()->back();

            }else{
                return response()->json(['status'=>0,'msg'=>'something went wrong']);
            }
         }
}

}
