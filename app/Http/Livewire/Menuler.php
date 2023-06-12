<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;

class Menuler extends Component
{
    protected $listeners=[
        'updateMenuOrdering'];
    public function render()
    {
        return view('livewire.menuler');
    }

    public function updateMenuOrdering ($positions){

            foreach($positions as $position){
             $index=$position[0];
             $newPosition=$position[1];
             Menu::where('id',$index)->update([
                 'ordering' => $newPosition
             ]);

            }
            $this->showToastr('Menü sıralaması güncellendi', 'success');
    }

    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr',[
            'type' => $type,
            'message' => $message,
        ]);
    }
}
