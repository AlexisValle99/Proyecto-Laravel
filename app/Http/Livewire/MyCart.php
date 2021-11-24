<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class MyCart extends Component
{
    public function render()
    {
        $this->setCheckout();
        return view('livewire.cart')->layout('layouts.base');
    }

    public function update($row, $step)
    {
        $product = Cart::get($row);
        $quantity = $product->qty + $step;
        if(!is_int($quantity) || $quantity < 1)
            $quantity = 0;
        Cart::update($row, $quantity);
        $this->emitTo('cart-counter','refreshComponent');
    }

    public function delete($row)
    {
        Cart::remove($row);
        session()->flash('success_msg','Producto ha sido retirado del carrito.');
        $this->emitTo('cart-counter','refreshComponent');
    }

    public function destroy(){
        Cart::destroy();
        $this->emitTo('cart-counter','refreshComponent');
    }

    public function checkout()
    {
        if(Auth::check())
        {
            return redirect()->route('checkout.now');
        }
        else{
            return redirect()->route('login');
        }
    }

    public function setCheckout()
    {
        if(!Cart::count() > 0)
        {
            session()->forget('checkout');
            return;
        }

        session()->put('checkout',[
            'subtotal' => Cart::subtotal(),
            'taxes' => Cart::tax(),
            'total' => Cart::total(),
            'discount' => 0,

        ]);
    }
}
