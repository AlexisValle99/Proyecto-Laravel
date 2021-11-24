<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OrderFinished extends Component
{
    public function render()
    {
        return view('livewire.order-finished')->layout('layouts.base');
    }
}
