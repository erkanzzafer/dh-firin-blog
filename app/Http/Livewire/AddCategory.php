<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
class AddCategory extends Component
{
    public $cat_name;
    public function render()
    {
        return view('livewire.add-category');
    }

    public function AddCategory(){
        $this->validate([
            'cat_name' => 'required|unique:categories,cat_name',
        ],
        [
            'cat_name.required' =>'Bu alan zorunludur',
            'cat_name.unique' =>'Bu isimde bir kategori mevcut.',
        ]);

        $kategori = new Category();
        $kategori->cat_name = $this->cat_name;
        // Diğer gerekli alanları burada atayabilirsiniz
        $saved=$kategori->save();
        if($saved){
            $this->showToastr('Kategori ekleme Başarılı','success');
        }else{
            $this->showToastr('Bir hata oluştu','error');
        }
    }

    public function showToastr($message,$type){
        return $this->dispatchBrowserEvent('showToastr',[
                'type' => $type,
                'message' => $message
        ]);
    }
}
