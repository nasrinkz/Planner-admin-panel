<?php

namespace App\Http\Livewire\ManageEvents;

use App\Models\Category;
use App\Models\Event;
use Livewire\Component;

class EditEventComponent extends Component
{
    protected $listeners =[
        '$_event_editable'=>'saveData'
    ];

    protected $rules = [
        'title'=>'required|max:150|min:2',
        'date'=>'required',
        'categoryId'=>'required',
    ];

    public $title="";
    public $event = "";
    public $categoryId;
    public $show=1;
    public $typeId=2;
    public $status=1;
    public $date;
    public $eventId;

    public function mount(){
        $this->categories = Category::orderBy('title','desc')->get();
    }

    public function saveData($eventId){
        $this->eventId = $eventId;
        $event = Event::with(['category'])->find($eventId);
        $this->title = $event->title;
        $this->event = $event->event;
        $this->status = $event->status;
        $this->typeId = $event->typeId;
        $this->date = $event->date;
        $this->show = $event->show;
        $this->categoryId = $event->category_id;
        $this->resetValidation();
    }

    public function submit(){
        $this->validate(['title'=>'required|max:150|min:2|unique:events,title,'.$this->eventId,
            'date'=>'required',
            'categoryId'=>'required',
            ]);
        $data = Event::find($this->eventId);
        $data->title = $this->title;
        $data->event = $this->event;
        $data->status = $this->status;
        $data->show = $this->show;
        $data->typeId = $this->typeId;
        $data->category_id = $this->categoryId;
        $data->date = $this->date;
        $data->save();
        $this->emit('$_event_refresh');
        $this->emit('showSuccessEditAlert');
        $this->title = "";
        $this->event = "";
        $this->status =1;
        $this->typeId = 2;
        $this->date = "";
        $this->show = 1;
        $this->categoryId = "";
    }

    public function updated($field){
        $this->validateOnly($field);
    }


    public function render()
    {
        return view('livewire.manage-events.edit-event-component');
    }
}
