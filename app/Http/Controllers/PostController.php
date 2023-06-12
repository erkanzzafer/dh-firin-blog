<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function createPost (Request $request){
        $request->validate([
            'post_title'=>'required',
            'post_content'=>'required',
            'parent_category'=>'required',
            'sayfa_gorsel' => 'required',
            'seo_baslik' => 'required',
            'seo_etiket' => 'required',
            'seo_icerik' => 'required'
        ]);

        if ($request->hasFile('sayfa_gorsel')){
            $path='back/images/post_images/';
            $file=$request->file('sayfa_gorsel');
            $filename=$file->getClientOriginalName();
            $new_filename=time().'_'.$filename;
              //$filename=time().'_'.rand(1,2000).'_larablog_favicon.co';
          //  $upload = Storage::disk('public')-> put($new_filename,(string)file_get_contents($file));
             $upload=$file->move(public_path($path),$new_filename);
            if($upload){
                $post= new Post();
                $post->category=$request->parent_category;
                $post->title=$request->post_title;
                $post->content=$request->post_content;
                $post->seo_baslik=$request->seo_baslik;
                $post->seo_etiket=$request->seo_etiket;
                $post->seo_icerik=$request->seo_icerik;
                $post->sayfa_gorsel=$new_filename;
                $saved=$post->save();
                if($saved){
                    return response()->json(['code'=>1,'msg'=>'Yazı başarıyla eklendi']);
                }else{
                    return response()->json(['code'=>3,'msg'=>'Bir hata oluştu']);
                }
            }else{
                return response()->json(['code' =>3, 'msg' =>'Görsel Yüklenirken hata oluştu.']);
            }
        }
    }


    public function allPost (){
        $datas=Post::all();
        return view('back.pages.yazilar',compact('datas'));
    }

    public function editPost(Request $request){
        if(!request()->post_id){
            return abort(404);
        }else{
            $post = Post::find(request()->post_id);
            $data=[
                'post'=>$post,
                'pageTitle' => 'Yazı Düzenle',
            ];
            return view('back.pages.yazi_duzenle',$data);
        }
    }

    public function updatePost(Request $request){

        $request->validate([
            'post_title'=>'required',
            'post_content'=>'required',
            'parent_category'=>'required',
            'seo_baslik' => 'required',
            'seo_etiket' => 'required',
            'seo_icerik' => 'required'
        ]);


        if ($request->hasFile('sayfa_gorsel')){

            $path='back/images/post_images/';
            $old_post_image=Post::find($request->post_id)->sayfa_gorsel;
            if ($old_post_image!=null && Storage::disk('public')->exists($path.$old_post_image)){
                Storage::disk('public')->delete($path.$old_post_image);
            }


            $file=$request->file('sayfa_gorsel');
            $filename=$file->getClientOriginalName();
            $new_filename=time().'_'.$filename;

            $post= Post::find($request->post_id);

            $post->category=$request->parent_category;
            $post->title=$request->post_title;
            $post->content=$request->post_content;
            $post->sayfa_gorsel=$request->sayfa_gorsel;
            $post->seo_baslik=$request->seo_baslik;
            $post->seo_etiket=$request->seo_etiket;
            $post->seo_icerik=$request->seo_icerik;
            $post->sayfa_gorsel=$new_filename;

            $upload=$file->move(public_path($path),$new_filename);

            $saved=$post->save();
            if($saved){
                return response()->json(['code'=>1,'msg'=>'Yazı başarıyla güncellendi']);
            }else{
                return response()->json(['code'=>3,'msg'=>'Bir hata oluştu']);
            }

    }else{
        $request->validate([
            'post_title'=>'required',
            'post_content'=>'required',
            'parent_category'=>'required',
            'seo_baslik' => 'required',
            'seo_etiket' => 'required',
            'seo_icerik' => 'required'
            ]);

            $post= Post::find($request->post_id);

            $post->category=$request->parent_category;
            $post->title=$request->post_title;
            $post->content=$request->post_content;
            $post->seo_baslik=$request->seo_baslik;
            $post->seo_etiket=$request->seo_etiket;
            $post->seo_icerik=$request->seo_icerik;
            $saved=$post->save();
            if($saved){
                return response()->json(['code'=>1,'msg'=>'Yazı başarıyla güncellendi']);
            }else{
                return response()->json(['code'=>3,'msg'=>'Bir hata oluştu']);
            }

    }

}
}
