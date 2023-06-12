<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;

class MenuEkle extends Component
{
    public $menu_name;

    public function render()
    {
        return view('livewire.menu-ekle');
    }

    public function AddMenu(){
        $this->validate([
            'menu_name' => 'required|unique:menus,menu_name,'
        ],[
            'menu_name.unique' => 'Bu menü adı girilmiş.'
        ]);

        $menus=new Menu();
        $menus->menu_name = $this->menu_name;
        // Diğer gerekli alanları burada atayabilirsiniz
        $saved=$menus->save();
        if($saved){
            $this->showToastr('Menü Ekleme Başarılı','success');
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
