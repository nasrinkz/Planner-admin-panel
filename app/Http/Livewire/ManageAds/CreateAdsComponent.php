<?php

namespace App\Http\Livewire\ManageAds;

use App\Models\Ads;
use Livewire\Component;
use Livewire\WithFileUploads;
use GlobalVariable;

class CreateAdsComponent extends Component
{
    use WithFileUploads;

    protected $rules = [
        'text'=>'required|max:150|min:2',
        'link'=>'required|max:150|min:2',
        'image'=>'required|image|mimes:jpg,jpeg,png|max:512'
    ];

    public $image="";
    public $title = "";
    public $text='';
    public $status=1;
    public $link='';

    public function submit(){
        $this->validate($this->rules);
        $data = new Ads();
        $data->title = $this->title;
        $data->text = $this->text;
        $data->link = $this->link;
        $data->status = $this->status;
        if($this->image != ''){
            $imageName = time().'_'.$this->image->getClientOriginalName();
            $this->image->storeAs('public/images/ads',$imageName);
            $data->image =GlobalVariable::$url."/storage/images/ads/".$imageName ;
        }
        $data->save();
//        $this->dispatchBrowserEvent('ads_created');
        $this->emit('$_ads_refresh');
        $this->emit('showSuccessAlert');
        $this->title = "";
        $this->link ="";
        $this->text = "";
        $this->image = "";
    }

    public function updated($field){
        $this->validateOnly($field);
    }

    public function render()
    {
        return view('livewire.manage-ads.create-ads-component');
    }
}
