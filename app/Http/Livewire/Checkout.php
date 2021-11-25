<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Shipping;
use App\Models\Transaction;
use Cart;

class Checkout extends Component
{
    public $differentShipping;
    public $firstname;
    public $lastname;
    public $email;
    public $line;
    public $line2;
    public $phone;
    public $city;
    public $country;
    public $state;
    public $zipcode;

    public $afirstname;
    public $alastname;
    public $aemail;
    public $aline;
    public $aline2;
    public $aphone;
    public $acity;
    public $acountry;
    public $astate;
    public $azipcode;

    public $paymentType;
    public $orderFinished;

    public function render()
    {
        $this->verifyCheckout();
        return view('livewire.checkout')->layout('layouts.base');
    }

    public function store()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'line' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'country' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'paymentType' => 'required'
        ]);
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = floatval(preg_replace('/[^\d.]/', '', session()->get('checkout')['subtotal']));
        $order->discount = floatval(preg_replace('/[^\d.]/', '', session()->get('checkout')['discount']));
        $order->taxes = floatval(preg_replace('/[^\d.]/', '', session()->get('checkout')['taxes']));
        $order->total = floatval(preg_replace('/[^\d.]/', '', session()->get('checkout')['total']));
        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->phone = $this->phone;
        $order->email = $this->email;
        $order->line = $this->line;
        $order->line2 = $this->line2;
        $order->city = $this->city;
        $order->country = $this->country;
        $order->state = $this->state;
        $order->zipcode = $this->zipcode;
        $order->status = 'ordered';
        $order->different_shipping = $this->differentShipping ? 1 : 0;
        $order->save();

        foreach(Cart::content() as $product)
        {
            $orderProduct = new OrderProduct();
            $orderProduct->product_id = $product->id;
            $orderProduct->order_id = $order->id;
            $orderProduct->price = $product->price;
            $orderProduct->quantity = $product->qty;
            $orderProduct->save();
        }

        if($this->differentShipping)
        {
            $this->validate([
                'afirstname' => 'required',
                'alastname' => 'required',
                'aemail' => 'required|email',
                'aline' => 'required',
                'aphone' => 'required',
                'acity' => 'required',
                'acountry' => 'required',
                'astate' => 'required',
                'azipcode' => 'required'
            ]);
            
            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->firstname = $this->afirstname;
            $shipping->lastname = $this->alastname;
            $shipping->phone = $this->aphone;
            $shipping->email = $this->aemail;
            $shipping->line = $this->aline;
            $shipping->line2 = $this->aline2;
            $shipping->city = $this->acity;
            $order->country = $this->astate;
            $shipping->country = $this->acountry;
            $shipping->zipcode = $this->azipcode;
            $shipping->save();
        }

        if($this->paymentType == 'deliver')
        {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->type = 'deliver';
            $transaction->status = 'pending';
            $transaction->save();
        }

        Cart::destroy();
        session()->forget('checkout');

        $this->orderFinished = 1;

    }

    public function verifyCheckout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        else if($this->orderFinished)
        {
            return redirect()->route('order.finished');
        }
        else if(!session()->get('checkout'))
        {
            return redirect()->route('my.cart');
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'line' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'country' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'paymentType' => 'required'
        ]);

        if($this->differentShipping)
        {
            $this->validateOnly($fields,[
                'afirstname' => 'required',
                'alastname' => 'required',
                'aemail' => 'required|email',
                'aline' => 'required',
                'aphone' => 'required',
                'acity' => 'required',
                'acountry' => 'required',
                'astate' => 'required',
                'azipcode' => 'required'
            ]);
        }
    }
}
