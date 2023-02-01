<?php

namespace App\Http\Livewire;

use App\Models\Ads;
use App\Models\Event;
use App\Models\Sentence;
use App\Models\User;
use Livewire\Component;

class PanelComponent extends Component
{

    public $ads = 0;
    public $events = 0;
    public $download = 0;
    public $sentences = 0;
    public $usersCount = 0;

    public function mount(){
        $this->ads = Ads::all()->count();
        $this->events = Event::all()->count();
        $this->usersCount = User::all()->count();
    }

    public function render()
    {
        return view('livewire.panel-component');
    }
}
