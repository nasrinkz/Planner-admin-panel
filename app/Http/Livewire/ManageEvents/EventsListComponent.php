<?php

namespace App\Http\Livewire\ManageEvents;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class EventsListComponent extends Component
{
    use WithPagination;

    protected $listeners =[
        'deleteEvent1',
        '$_event_refresh'=>'refresh'
    ];

    public $paginate_num=10;

    public function mount(){
        $events = Event::with(['category'])->latest()->paginate($this->paginate_num);
    }

    public function refresh(){
        $events = Event::with(['category'])->latest()->paginate($this->paginate_num);
    }

    public function deleteEvent1($id){
        $event = Event::find($id);
        $event->delete();
        $this->emit('$_event_refresh');
    }

    public function changeStatus($eventId){
        $event=Event::find($eventId);
        if($event->status == 0){
            $event->status = '1';
        }else{
            $event->status = '0';
        }
        $event->save();
        $this->emit('$_event_refresh');
    }

    public function update($eventId){
        $this->dispatchBrowserEvent('show-edit-event-modal');
        $this->emit('$_event_editable',$eventId);
    }

    public function render()
    {
        $events = Event::with(['category'])->latest()->paginate($this->paginate_num);
        return view('livewire.manage-events.events-list-component',['events'=>$events]);
    }
}
