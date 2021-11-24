<?php

namespace App\Http\Livewire\Adm;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class AdminEditCategory extends Component
{

    public $categorySlug;
    public $categoryId;
    public $name;
    public $slug;

    public function mount($categoryId)
    {
        $this->categoryId = $categoryId;
        $category = Category::where('id', $categoryId)->first();
        $this->categorySlug =  $category->slug;
        $this->name = $category->name;
        $this->slug = $category->slug;
    }

    public function render()
    {
        return view('livewire.adm.admin-edit-category')->layout('layouts.base');
    }

    public function getSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);

        $category = Category::find($this->categoryId);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('success_msg', 'Categoría editada con éxito.');
    }

}
