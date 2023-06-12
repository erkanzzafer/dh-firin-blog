<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AuthorLoginForm extends Component
{
    public $password,$email;

    public function render()
    {
        return view('livewire.author-login-form');
    }

    public function LoginHandler(){
        $this->validate(
            [
                'email' => 'required|email',
                'password'=> 'required|min:2',

             ],[
                'email.required' => 'Bu alan zorunludur',
                'password.min'=>'En az 6 karakter girmelisin',
                'password.required'=>'Bu alan zorunludur'
             ]
        );

        $creds= array('email'=>$this->email,'password'=>$this->password);

        if (Auth::guard('web')->attempt($creds)){
           $checkUser= User::where('email',$this->email)->first();

           if ($checkUser->blocked==1){
               Auth::guard('web')->logout();
               return redirect()->route('admin.login')->with('fail','Hesap Blokeli');
           }else{

               return redirect()->route('admin.index');

           }
        }else{
           session()->flash('fail','Incorrect email or password');
        }
    }

}
