<?php

namespace App\Http\Livewire\Adm;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class AdminAddCategory extends Component
{
    public $name;
    public $slug;

    public function render()
    {
        return view('livewire.adm.admin-add-category')->layout('layouts.base');
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

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);

        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('success_msg', 'Categoría creada con éxito.');
    }
}
