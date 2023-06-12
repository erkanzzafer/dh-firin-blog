<?php

namespace App\Http\Livewire;

use App\Models\Subcategory;
use Livewire\Component;

class AddSubCategory extends Component
{
    public $parent_category,$subcat_name;
    public function render()
    {
        return view('livewire.add-sub-category');
    }

    public function AddSubCategory(){

        $this->validate([
            'subcat_name'=>'required|unique:subcategories,subcat_name',
            'parent_category'=>'required'
        ],
        [
            'subcat_name.required'=>'Bu alan zorunludur',
            'parent_category.required'=>'Bu alan zorunludur',
            'subcat_name.unique' => 'Bu AltKategori adında bir alt kategori var.'
        ]);

        $subcategory = new Subcategory();
        $subcategory->subcat_name = $this->subcat_name;
        $subcategory->parent_cat = $this->parent_category;
        $saved=$subcategory->save();
        if ($saved){
            $this->showToastr('Alt Kategori Başarıyla Eklendi','success');
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
