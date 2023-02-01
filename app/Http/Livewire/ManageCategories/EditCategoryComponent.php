<?php

namespace App\Http\Livewire\ManageCategories;

use App\Models\Category;
use Livewire\Component;

class EditCategoryComponent extends Component
{
    protected $listeners =[
        '$_category_editable'=>'saveData'
    ];

    protected $rules = [
        'title'=>'required|max:150|min:2',
    ];

    public $title = "";
    public $categoryId;

    public function saveData($categoryId){
        $this->categoryId = $categoryId;
        $category = Category::find($categoryId);
        $this->title = $category->title;
        $this->resetValidation();
    }

    public function submit(){
        $this->validate([
            'title'=>'required|max:150|min:2|unique:categories,title,'.$this->categoryId,
        ]);
        $data = Category::find($this->categoryId);
        $data->title = $this->title;
        $data->save();
        $this->emit('$_category_refresh');
        $this->emit('showSuccessEditAlert');
        $this->title = "";
    }

    public function updated($field){
        $this->validateOnly($field);
    }

    public function render()
    {
        return view('livewire.manage-categories.edit-category-component');
    }
}
