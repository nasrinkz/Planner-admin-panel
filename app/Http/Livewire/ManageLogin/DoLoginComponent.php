<?php

namespace App\Http\Livewire\ManageLogin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DoLoginComponent extends Component
{
    public $data=[
        "userName"=>"",
        "password"=>"",
        "remember"=>false
    ];

    public function login(){
        $this->validate([
            'data.userName'=>'required|string|regex:/^[a-zA-Z0-9@$#^%&*!]+$/u',
            'data.password'=>'required|string|regex:/^[a-zA-Z0-9@$#^%&*!]+$/u',
        ]);

        if (Auth::attempt([
            'userName'=>$this->data['userName'],
            'password'=>$this->data['password'],
        ],$this->data['remember'])){
            if (auth()->user()->userGroup=='admin'){
                return redirect()->to('/admin');
            }
            else{
                return back()->with('message','نام کاربری و رمزعبور نادرست است!');
            }
        }
        else{
            return back()->with('message','نام کاربری و رمزعبور نادرست است!');
        }
    }

    public function mount(){
        Auth::logout();
//        return back()->with('message','با موفقیت خارج شدید!');
    }

    public function render()
    {
        return view('livewire.manage-login.do-login-component');
    }
}
