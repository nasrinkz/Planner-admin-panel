<?php

namespace App\Http\Livewire\ManageAds;

use App\Models\Ads;
use Livewire\Component;
use Livewire\WithPagination;
use GlobalVariable;

class AdsListComponent extends Component
{
    use WithPagination;

    protected $listeners =[
        'deleteAds',
        '$_ads_refresh'=>'refresh'
    ];

    public $paginate_num=10;

    public function mount(){
        $ads = Ads::latest()->paginate($this->paginate_num);
    }

    public function refresh(){
        $ads = Ads::latest()->paginate($this->paginate_num);
    }

    public function deleteAds($id){
        $ads = Ads::find($id);
        if($ads->image != ""){
            $url = str_replace(GlobalVariable::$url.'/storage' , '',$ads->image);
            unlink('storage'.$url);
        }
        $ads->delete();
    }

    public function changeStatus($adsId){
        $ads=Ads::find($adsId);
        if($ads->status == 0){
            $ads->status = 1;
        }else{
            $ads->status = 0;
        }
        $ads->save();
        $this->emit('$_ads_refresh');
    }

    public function update($adsId){
        $this->dispatchBrowserEvent('show-edit-ads-modal');
        $this->emit('$_ads_editable',$adsId);
    }

    public function render()
    {
        $ads = Ads::latest()->paginate($this->paginate_num);
        return view('livewire.manage-ads.ads-list-component',['ads'=>$ads]);
    }

}
