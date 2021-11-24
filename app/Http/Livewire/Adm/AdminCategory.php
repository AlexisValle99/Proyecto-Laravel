<?php

namespace App\Http\Livewire\Adm;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class AdminCategory extends Component
{
    use WithPagination;
    public function render()
    {
        $categories = Category::paginate(6);
        return view('livewire.adm.admin-category',['categories' => $categories])->layout('layouts.base');
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        session()->flash('success_msg', 'Categoría eliminada con éxito.');
    }
}
