<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class ChangePasswordPage extends Component
{
    public $guncelSifre,$sifre1,$sifre2;

    public function render()
    {
        return view('livewire.change-password-page');
    }


    public function PasswordHandler(){
        $this->validate([
            'guncelSifre' => ['required',function($attribute, $value,$fail){
                if(!Hash::check($value,User::find(auth('web')->id())->password)){
                    return $fail(__('Güncel şifre hatalı'));
                }
            }],
            'sifre1' =>'required',
            'sifre2' =>'required',
            'sifre2' => 'same:sifre1',
            ],
            [
                'guncelSifre.required' => 'Bu alan zorunludur.',
                'sifre1.required' => 'Bu alan zorunludur.',
                'sifre2.required' => 'Bu alan zorunludur.',
                'sifre2.same'=>'Girilen yeni şifreler eşleşmedi',
            ]);
        $query=User::find(auth('web')->id())->update([
            'password' => Hash::make($this->sifre1)
        ]);

        if ($query){
            $this->showToastr('Şifre Güncelleme Başarılı','success');
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
