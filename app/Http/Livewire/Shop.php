<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use Cart;

class Shop extends Component
{
    public $sortBy;
    public $categorySlug;
    public $search;

    public function mount($categorySlug = null){
        $this->sortBy = "default";
        $this->paginate = 6;
        $this->categorySlug = $categorySlug;
        $this->fill(request()->only('search'));
    }

    use WithPagination;
    public function render()
    {
        $orderby_filter = "";
        $orderby_filter_side = "";
        $search_query = "%";
        $products = "";

        if($this->sortBy == 'date')
        {
            $orderby_filter = "created_at";
            $orderby_filter_side = "DESC";
        }else if($this->sortBy == 'price')
        {
            $orderby_filter = "normal_price";
            $orderby_filter_side = "ASC";
        }else if($this->sortBy == 'price_high')
        {
            $orderby_filter = "normal_price";
            $orderby_filter_side = "DESC";
        }else{
            $orderby_filter = "name";
            $orderby_filter_side = "DESC";
        }

        if($this->search != null){
            $search_query = "%". $this->search ."%";
        }

        if($this->categorySlug == null)
        {
            $products = Product::where('name','like',$search_query)->orderBy($orderby_filter, $orderby_filter_side)->paginate($this->paginate);
        }
        else
        {
            $category = Category::where('slug', $this->categorySlug)->first();
            $products = Product::where('category_id', $category->id)->orderBy($orderby_filter, $orderby_filter_side)->paginate($this->paginate);
        }
        $categories = Category::all();
        $last_products = Product::orderBy('created_at','DESC')->get()->take(4);
        $sale_products = Product::where('sale_price','>', 0)->inRandomOrder()->get()->take(5);
        return view('livewire.shop',['products' => $products, 'categories' => $categories, 'last_products' => $last_products, 'sale_products' => $sale_products])->layout('layouts.base');

    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_msg', 'Producto agregado al carrito.');
        return redirect()->route('my.cart');
    }
}
