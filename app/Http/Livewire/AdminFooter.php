<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Setting;
class AdminFooter extends Component
{
    public $setting;

    protected $listeners=[
        'updateAdminFooter'=>'$refresh'
    ];
    public function mount(){
        $this->setting=Setting::find(1);
    }

    public function render()
    {
        return view('livewire.admin-footer');
    }
}
