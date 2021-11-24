<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class UserShowOrder extends Component
{
    public $orderId;

    public function mount($orderId)
    {
        $this->orderId = $orderId;
    }

    public function render()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('id',$this->orderId)->first();
        return view('livewire.user.user-show-order',['order' => $order])->layout('layouts.base');
    }
}
