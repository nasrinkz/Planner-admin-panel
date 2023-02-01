<?php

namespace App\Http\Livewire\ManageProfile;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditProfileComponent extends Component
{
    protected $listeners =[
        '$_profile_editable'=>'saveData'
    ];

    protected $rules = [
        'name'=>'required|max:150|min:3',
        'family'=>'required|max:150|min:3',
        'userName'=>'required|string|min:4|regex:/^[a-zA-Z0-9]+$/u',
    ];

    public $name;
    public $family;
    public $userName;

    public function mount(){
        $this->name=auth()->user()->name;
        $this->family=auth()->user()->family;
        $this->userName=auth()->user()->userName;
    }

    public function submit(){
        $this->validate([
            'name'=>'required|max:150|min:3',
            'family'=>'required|max:150|min:3',
            'userName'=>'required|string|min:4|regex:/^[a-zA-Z0-9]+$/u|unique:users,userName,'.auth()->user()->id,
        ]);
        $profile =User::find(auth()->user()->id);
        $profile->name = $this->name;
        $profile->family = $this->family;
        $profile->userName=$this->userName;
        $profile->save();
        $this->emit('$_refresh_users_list');
        $this->emit('showSuccessAlert');
    }

    public function updated($field){
        $this->validateOnly($field);
    }

    public function render()
    {
        return view('livewire.manage-profile.edit-profile-component');
    }
}
