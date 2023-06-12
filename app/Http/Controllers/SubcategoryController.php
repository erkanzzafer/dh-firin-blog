<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index(){

        $datas=Subcategory::all();
        return view('back.pages.altkategoriler',compact('datas'));
    }

    public function updateSubcategory (Request $request){
        // dd(request()->cat_id);
         $datas=Subcategory::find(request()->subcat_id);

         return view('back.pages.altkategoriDuzenle',compact('datas'));
     }


     public function updateSubcategoryStore (Request $request){

        $request->validate([
            'subcat_name'=>'required|unique:subcategories,subcat_name',
            'parent_category' => 'required',
        ]);


        $subcat= Subcategory::find( $request->input('subcategory_id'));
        $subcat->subcat_name=$request->subcat_name;
        $subcat->parent_cat=$request->parent_category;

            $saved=$subcat->save();
            if($saved){
                return response()->json(['code'=>1,'msg'=>'Yazı başarıyla eklendi']);
            }else{
                return response()->json(['code'=>3,'msg'=>'Bir hata oluştu']);
            }
     }
}
