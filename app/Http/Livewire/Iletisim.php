<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class Iletisim extends Component
{
    public $adres_baslik,$adres_icerik,$telefon_baslik,$telefon_icerik,$mail_baslik,$mail_icerik;
    public $data;


    public function mount()
    {
        $this->data = Contact::find(1);
        $this->adres_baslik=Contact::find(1)->adres_baslik;
        $this->adres_icerik=Contact::find(1)->adres_icerik;
        $this->telefon_baslik=Contact::find(1)->telefon_baslik;
        $this->telefon_icerik=Contact::find(1)->telefon_icerik;
        $this->mail_baslik=Contact::find(1)->mail_baslik;
        $this->mail_icerik=Contact::find(1)->mail_icerik;


    }

    public function render()
    {
        return view('livewire.iletisim');
    }
    public function addIletisim(){
        $this->validate([
            'adres_baslik'   => 'required',
            'adres_icerik'   => 'required',
            'telefon_baslik' => 'required',
            'telefon_icerik' => 'required',
            'mail_baslik'    => 'required',
            'mail_icerik'    => 'required'
        ],[
            'adres_baslik.required'   => 'Bu alan zorunlu',
            'adres_icerik.required'   => 'Bu alan zorunlu',
            'telefon_baslik.required' => 'Bu alan zorunlu',
            'telefon_icerik.required' => 'Bu alan zorunlu',
            'mail_baslik.required'    => 'Bu alan zorunlu',
            'mail_icerik.required'    => 'Bu alan zorunlu'
        ]);

        $datas=Contact::find(1);
        $datas->adres_baslik=$this->adres_baslik;
        $datas->adres_icerik = $this->adres_icerik;
        $datas->telefon_baslik = $this->telefon_baslik;
        $datas->telefon_icerik = $this->telefon_icerik;
        $datas->mail_baslik = $this->mail_baslik;
        $datas->mail_icerik=$this->mail_icerik;

        $saved=$datas->save();
        if($saved){

            $this->showToastr('Güncelleme başarılı','success');
        }else{
            $this->showToastr('Hata oluştu','error');
        }
    }


    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr',[
            'type' => $type,
            'message' => $message,
        ]);
    }
}
