<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use DB;

class UserOrder extends Component
{
    public function render()
    {
        $orders = Order::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(10);
        return view('livewire.user.user-order',['orders' => $orders])->layout('layouts.base');
    }

    public function update($orderId)
    {
        $order = Order::find($orderId);
        $order->status = "canceled";

        $order->canceled_date = DB::raw('CURRENT_DATE');

        $order->save();
        session()->flash('success_msg','Se ha cancelado un pedido.');
    }
}
