<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $datas=Category::all();
        return view('back.pages.kategoriler',compact('datas'));
    }

    public function updateCategory (Request $request){
       // dd(request()->cat_id);
        $datas=Category::find(request()->cat_id);

        return view('back.pages.kategoriDuzenle',compact('datas'));
    }


    public function updateCategoryStore (Request $request){


        $request->validate([
            'category_name'=>'required|unique:categories,cat_name',

        ]);



            $cat= Category::find( $request->input('category_id'));
            $cat->cat_name=$request->category_name;

                $saved=$cat->save();
                if($saved){
                    return response()->json(['code'=>1,'msg'=>'Yazı başarıyla eklendi']);
                }else{
                    return response()->json(['code'=>3,'msg'=>'Bir hata oluştu']);
                }

    }
}
