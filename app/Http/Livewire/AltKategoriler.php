<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Subcategory;
use Livewire\Component;

class AltKategoriler extends Component
{

    protected $listeners=[
        'deleteSubCategoryAction'
    ];

    public function render()
    {
        return view('livewire.alt-kategoriler',[
            'datas'=>Subcategory::all()
        ]);
    }

    public function deleteSubCategory ($id){

        $category=Subcategory::find($id);
        $this->dispatchBrowserEvent('deleteCategory',[
           'title' => 'Kategori Silinecek',
           'html'  => 'Silmek istediğinize emin misiniz?',
           'id'    => $id
        ]);
    }

    public function deleteSubCategoryAction($id){

        $subcategory = Subcategory::where('id',$id)->first();
        $posts=Post::where('category',$subcategory->id)->get()->toArray();
        if (!empty($posts) && count($posts)>0){

            $this->showToastr('Bu kategori (' .count($posts). ') yazı ile ilişkilidir. Silinemez','error');
        }else
        {
            $subcategory->delete();
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
