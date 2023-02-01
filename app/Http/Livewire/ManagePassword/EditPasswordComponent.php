<?php

namespace App\Http\Livewire\ManagePassword;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EditPasswordComponent extends Component
{
    protected $listeners =[
        '$_password_editable'=>'saveData'
    ];

    protected $rules = [
        'password'=>[
            'required',
            'min:4',             // must be at least 10 characters in length
            'regex:/[a-z]/',      // must contain at least one lowercase letter
            'regex:/[0-9]/',      // must contain at least one digit
        ],
        'password_confirmation'=>
            ['same:password']
    ];

    public $password;
    public $password_confirmation;

    public function mount(){

    }

    public function submit(){
        $this->validate([
            'password'=>[
                'required',
                'min:4',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[0-9]/',      // must contain at least one digit
            ],
            'password_confirmation'=>
                ['same:password']
        ]);
        $profile =User::find(auth()->user()->id);
        $profile->password = Hash::make($this->password);
        $profile->save();
        $this->emit('$_refresh_users_list');
        $this->emit('showSuccessAlert');
        $this->password="";
        $this->password_confirmation="";
    }

    public function updated($field){
        $this->validateOnly($field);
    }

    public function render()
    {
        return view('livewire.manage-password.edit-password-component');
    }
}
