<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Setting;

use function PHPUnit\Framework\isNull;

class GenelAyarlar extends Component
{
    public $setting;
    public $site_isim, $site_email, $site_aciklama, $sosyal_facebook, $sosyal_instagram, $sosyal_twitter, $sosyal_youtube;

    public function mount(){
        $this->setting=Setting::find(1);
        $this->site_isim=$this->setting->name;
        $this->site_email=$this->setting->email;
        $this->site_aciklama=$this->setting->description;
        $this->sosyal_facebook=$this->setting->facebook;
        $this->sosyal_instagram=$this->setting->instagram;
        $this->sosyal_twitter=$this->setting->twitter;
        $this->sosyal_youtube = $this->setting->youtube;
    }

    public function render()
    {
        return view('livewire.genel-ayarlar');
    }

    public function BlogOn(){
        $this->validate([
            'site_isim'=>'required',
            'site_email'=>'required',
            'site_aciklama'=>'required',
        ],[
            'site_isim.required'=> 'Bu alan zorunludur',
            'site_email.required'=> 'Bu alan zorunludur',
            'site_aciklama.required' => 'Bu alan zorunludur'
        ]);

        $update=$this->setting->update([
            'name'=>$this->site_isim,
            'email'=> $this->site_email,
            'description'=> $this->site_aciklama
        ]);
        if($update){
            $this->showToastr('Genel Ayarlar Güncellendi','success');
            $this->emit('updateAdminFooter');
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
