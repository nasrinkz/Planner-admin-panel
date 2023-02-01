<?php

namespace App\Http\Livewire\ManageCategories;

use App\Models\Category;
use Livewire\Component;

class CreateCategoryComponent extends Component
{
    protected $rules = [
        'title'=>'required|max:150|min:2|unique:categories,title',
    ];

    public $title = "";

    public function submit(){
        $this->validate($this->rules);
        $category = new Category();
        $category->title = $this->title;
        $category->save();
        $this->emit('$_category_refresh');
        $this->emit('showSuccessAlert');
        $this->title = "";
    }

    public function updated($field){
        $this->validateOnly($field);
    }

    public function render()
    {
        return view('livewire.manage-categories.create-category-component');
    }
}
