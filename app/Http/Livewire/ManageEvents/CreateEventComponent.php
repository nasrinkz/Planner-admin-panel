<?php

namespace App\Http\Livewire\ManageEvents;

use App\Models\Category;
use App\Models\Event;
use Livewire\Component;

class CreateEventComponent extends Component
{
    protected $rules = [
        'title'=>'required|max:150|min:2|unique:events,title',
        'date'=>'required',
        'categoryId'=>'required',
    ];

    public $title="";
    public $event = "";
    public $categoryId;
    public $show='0';
    public $typeId=2;
    public $status='0';
    public $date;

    public function mount(){
        $this->categories = Category::orderBy('title','desc')->get();
    }
    public function submit(){
        $this->validate($this->rules);
        $data = new Event();
        $data->title = $this->title;
        $data->event = $this->event;
        $data->show = $this->show;
        $data->category_id = $this->categoryId;
        $data->typeId = $this->typeId;
        $data->status = $this->status;
        $data->date= $this->date;
        $data->save();
        $this->emit('$_event_refresh');
        $this->emit('showSuccessAlert');
        $this->title = "";
        $this->event ="";
        $this->categoryId = "";
    }

    public function updated($field){
        $this->validateOnly($field);
    }

    public function render()
    {
        return view('livewire.manage-events.create-event-component');
    }
}
