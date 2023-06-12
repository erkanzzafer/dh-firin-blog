<?php

namespace App\Http\Controllers;

use App\Models\Home_Content;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SliderController extends Controller
{

    public function index(){
        $datas=Slider::find(1);
        return view('back.pages.anasayfa.slider',compact(['datas']));
    }

    public function addSlider (Request $request){
        $request->validate([
            'photo_name' => 'required',
            'photo' => 'required'
        ]);
        $data = new Slider();
        $data->name = $request->photo_name;
        $data->photo = $request->photo;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('back/images/slider_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('back/images/slider_images/'),$filename);
            $data['photo'] = $filename;
        }


        $saved=$data->save();
        if($saved){
            return response()->json(['code'=>1,'msg'=>'Yazı başarıyla güncellendi']);
        }else{
            return response()->json(['code'=>3,'msg'=>'Bir hata oluştu']);
        }
    }

    public function HomeContent(){
        $datas=DB::table('home_contents')->get();


        return view('back.pages.anasayfa.content',compact('datas'));
    }

    public function HomeContent1(Request $request){
        $request->validate([
            'c1_title' => 'required',
            'c1_content' => 'required'
        ],[
            'c1_title.required' => 'Bu alan zorunludur',
            'c1_content.required' => 'Bu alan zorunludur',
        ] );

        $datas=Home_Content::find($request->c1_id);
        if ($request->file('c1_photo')) {
            $file = $request->file('c1_photo');
            @unlink(public_path('back/images/slider_images/'.$datas->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('back/images/slider_images/'),$filename);
            $datas['photo'] = $filename;
        }



            $datas->title = $request->c1_title;

            $datas->c_name = $request->c1_content;

            $saved=$datas->save();
            if($saved){
                return response()->json(['code'=>1,'msg'=>'İçerik başarıyla eklendi']);
            }else{
                return response()->json(['code'=>3,'msg'=>'Bir hata oluştu']);
            }
        }


        public function HomeContent2(Request $request){

            $request->validate([
                'c2_title' => 'required',
                'c2_content' => 'required'
            ],[
                'c2_title.required' => 'Bu alan zorunludur',
                'c2_content.required' => 'Bu alan zorunludur',
            ] );

            $datas=Home_Content::find($request->c2_id);
            if ($request->file('c2_photo')) {
                $file = $request->file('c2_photo');
                @unlink(public_path('back/images/slider_images/'.$datas->photo));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('back/images/slider_images/'),$filename);
                $datas['photo'] = $filename;
            }
            $datas->title = $request->c2_title;

            $datas->c_name = $request->c2_content;

            $saved=$datas->save();
            if($saved){
                return response()->json(['code'=>1,'msg'=>'İçerik başarıyla eklendi']);
            }else{
                return response()->json(['code'=>3,'msg'=>'Bir hata oluştu']);
            }
        }

        public function HomeContent3(Request $request){

            $request->validate([
                'c3_title' => 'required',
                'c3_content' => 'required'
            ],[
                'c3_title.required' => 'Bu alan zorunludur',
                'c3_content.required' => 'Bu alan zorunludur',
            ] );

            $datas=Home_Content::find($request->c3_id);
            if ($request->file('c3_photo')) {
                $file = $request->file('c3_photo');
                @unlink(public_path('back/images/slider_images/'.$datas->photo));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('back/images/slider_images/'),$filename);
                $datas['photo'] = $filename;
            }
            $datas->title = $request->c3_title;

            $datas->c_name = $request->c3_content;

            $saved=$datas->save();
            if($saved){
                return response()->json(['code'=>1,'msg'=>'İçerik başarıyla eklendi']);
            }else{
                return response()->json(['code'=>3,'msg'=>'Bir hata oluştu']);
            }
        }

        public function HomeContent4(Request $request){

            $request->validate([
                'c4_title' => 'required',
                'c4_content' => 'required'
            ],[
                'c4_title.required' => 'Bu alan zorunludur',
                'c4_content.required' => 'Bu alan zorunludur',
            ] );

            $datas=Home_Content::find($request->c4_id);
            if ($request->file('c4_photo')) {
                $file = $request->file('c4_photo');
                @unlink(public_path('back/images/slider_images/'.$datas->photo));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('back/images/slider_images/'),$filename);
                $datas['photo'] = $filename;
            }
            $datas->title = $request->c4_title;

            $datas->c_name = $request->c4_content;

            $saved=$datas->save();
            if($saved){
                return response()->json(['code'=>1,'msg'=>'İçerik başarıyla eklendi']);
            }else{
                return response()->json(['code'=>3,'msg'=>'Bir hata oluştu']);
            }
        }





}
