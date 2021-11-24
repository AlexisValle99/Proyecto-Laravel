<?php

namespace App\Http\Livewire\Adm;

use Livewire\Component;
use App\Models\Order;

class AdminShowOrder extends Component
{
    public $orderId;

    public function mount($orderId)
    {
        $this->orderId = $orderId;
    }

    public function render()
    {
        $order = Order::find($this->orderId);
        return view('livewire.adm.admin-show-order',['order' => $order])->layout('layouts.base');
    }
}
