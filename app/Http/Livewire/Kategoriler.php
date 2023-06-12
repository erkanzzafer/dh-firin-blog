<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Post;
use App\Models\Subcategory;
class Kategoriler extends Component
{


    protected $listeners=[
        'deleteCategoryAction'
    ];

    public function render()
    {
        return view('livewire.kategoriler',[
            'datas'=>Category::all()
        ]);
    }

    public function deleteCategory($id){
         $category=Category::find($id);
         $this->dispatchBrowserEvent('deleteCategory',[
            'title' => 'Kategori Silinecek',
            'html'  => 'Silmek istediğinize emin misiniz?',
            'id'    => $id
         ]);
    }

    public function deleteCategoryAction($id){
        $category = Category::where('id',$id)->first();
        $subcategories=Subcategory::where('parent_cat',$category->id)->whereHas('posts')->with('posts')->get();
        if (!empty($subcategories) && count($subcategories)>0){
            $totalPosts=0;
            foreach($subcategories as $subcat){
                $totalPosts+=Post::where('category',$subcat->id)->get()->count();
            }
            $this->showToastr('Bu kategori ('.$totalPosts.') ürün ile ilişkili. Silinemez','error');
        }else
        {
            Subcategory::where('parent_cat',$category->id)->delete();
            $category->delete();
            $this->showToastr('Kategori Silindi','info');
        }
    }





    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr',[
            'type' => $type,
            'message' => $message,
        ]);
    }

}
