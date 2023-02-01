<?php

namespace App\Http\Livewire\ManageAds;

use App\Models\Ads;
use Livewire\Component;
use Livewire\WithFileUploads;
use GlobalVariable;

class EditAdsComponent extends Component
{
    use WithFileUploads;

    protected $listeners =[
        '$_ads_editable'=>'saveData'
    ];

    protected $rules = [
        'text'=>'required|max:150|min:2',
        'link'=>'required|max:150|min:2',
    ];

    public $image;
    public $title = "";
    public $text='';
    public $status=1;
    public $link='';
    public $adsId;
    public $newImage;

    public function saveData($adsId){
        $this->adsId = $adsId;
        $ads = Ads::find($adsId);
        $this->title = $ads->title;
        $this->text = $ads->text;
        $this->status = $ads->status;
        $this->link = $ads->link;
        $this->image = $ads->image;
        $this->resetValidation();
    }

    public function submit(){
        $this->validate($this->rules);
        $data = Ads::find($this->adsId);
        $data->title = $this->title;
        $data->text = $this->text;
        $data->link = $this->link;
        $data->status = $this->status;
        if($this->newImage != ''){
            $imageName = time().'_'.$this->newImage->getClientOriginalName();
            $this->newImage->storeAs('public/images/ads',$imageName);
            $data->image =GlobalVariable::$url."/storage/images/ads/".$imageName ;
        }
        $data->save();
        $this->emit('$_ads_refresh');
        $this->emit('showSuccessEditAlert');
        $this->title = "";
        $this->link ="";
        $this->text = "";
        $this->newImage = "";
    }

    public function updated($field){
        $this->validateOnly($field);
    }

    public function unselectPhoto(){
        $this->newImage = "";
        $this->showModal=1;
    }

    public function render()
    {
        return view('livewire.manage-ads.edit-ads-component');
    }
}
