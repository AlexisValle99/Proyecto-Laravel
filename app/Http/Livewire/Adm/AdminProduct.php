<?php

namespace App\Http\Livewire\Adm;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class AdminProduct extends Component
{
    use WithPagination;
    public function render()
    {
        $products = Product::paginate(6);
        return view('livewire.adm.admin-product',['products' => $products])->layout('layouts.base');
    }

    public function delete($id){
        $product = Product::find($id);

        if($product->image){
            unlink('img/products/'.$product->image);
        }

        if($product->images){
            $images = explode(',', $product->images);
            foreach($images as $image){
                if($image)
                {
                    unlink('img/products/'.$image);
                }
            }
        }


        $product->delete();
        session()->flash('success_msg', 'Producto eliminado con éxito.');
    }
}
