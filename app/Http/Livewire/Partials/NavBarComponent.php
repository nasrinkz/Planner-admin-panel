<?php

namespace App\Http\Livewire\Partials;

use App\Models\User;
use Livewire\Component;

class NavBarComponent extends Component
{

    protected $listeners = [
        '$_refresh_users_list' => 'refresh'
    ];

    public $fullname;

    public function mount()
    {
        $user=User::find(auth()->user()->id);
        $this->fullname=$user->name." ".$user->family;
    }

    public function refresh()
    {
        $user=User::find(auth()->user()->id);
        $this->fullname=$user->name." ".$user->family;
    }

    public function render()
    {
        return view('livewire.partials.nav-bar-component');
    }
}
