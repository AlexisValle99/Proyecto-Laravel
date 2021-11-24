<?php

namespace App\Http\Livewire\Adm;

use Livewire\Component;
use App\Models\Order;
use DB;

class AdminOrder extends Component
{
    public function render()
    {
        $orders = Order::orderBy('created_at','DESC')->paginate(10);
        return view('livewire.adm.admin-order', ['orders' => $orders])->layout('layouts.base');
    }

    public function update($orderId, $status)
    {
        $order = Order::find($orderId);
        $order->status = $status;
        if($status == "delivered")
        {
            $order->delivered_date = DB::raw('CURRENT_DATE');
        }
        else if($status == "canceled")
        {
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }
        $order->save();
        session()->flash('success_msg','El estado del pedido ha sido actualizado.');
    }
}
