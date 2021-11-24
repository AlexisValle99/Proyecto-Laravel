<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Index extends Component
{
    public function render()
    {
        return view('livewire.index')->layout('layouts.base');
    }
}
