<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Setting;
class SosyalMedyaAyarlari extends Component
{
    public $setting;
    public $sosyal_facebook, $sosyal_instagram, $sosyal_twitter, $sosyal_youtube;
    public function mount(){
        $this->setting=Setting::find(1);
        $this->sosyal_facebook=$this->setting->facebook;
        $this->sosyal_instagram=$this->setting->instagram;
        $this->sosyal_twitter=$this->setting->twitter;
        $this->sosyal_youtube = $this->setting->youtube;
    }

    public function SosyalOn(){
        $update=$this->setting->update([
            'facebook'=>$this->sosyal_facebook,
            'youtube'=> $this->sosyal_youtube,
            'twitter'=> $this->sosyal_twitter,
            'instagram'=>$this->sosyal_instagram,
        ]);
        if($update){
            $this->showToastr('Sosyal Medyalar Güncellendi','success');

        }else{
            $this->showToastr('Bir hata oluştu','error');
        }
    }

    public function render()
    {
        return view('livewire.sosyal-medya-ayarlari');
    }

    public function showToastr($message,$type){
        return $this->dispatchBrowserEvent('showToastr',[
                'type' => $type,
                'message' => $message
        ]);
    }
}
