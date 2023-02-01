<?php

namespace App\Http\Livewire\ManageCategories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryListComponent extends Component
{
    use WithPagination;

    protected $listeners =[
        'deleteCategory',
        '$_category_refresh'=>'refresh'
    ];

    public $paginate_num=10;

    public function mount(){
        $categories = Category::latest()->paginate($this->paginate_num);
    }

    public function refresh(){
        $categories = Category::latest()->paginate($this->paginate_num);
    }

    public function deleteCategory($id){
        $data = Category::find($id);
        $data->delete();
    }

    public function update($categoryId){
        $this->dispatchBrowserEvent('show-edit-category-modal');
        $this->emit('$_category_editable',$categoryId);
    }

    public function render()
    {
        $categories = Category::latest()->paginate($this->paginate_num);
        return view('livewire.manage-categories.category-list-component',['categories'=>$categories]);
    }
}
