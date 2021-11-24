<?php

namespace App\Http\Livewire\Adm;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminAddProduct extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $desc;
    public $longDesc;
    public $stock;
    public $sku;
    public $price;
    public $salePrice;
    public $featured;
    public $weight;
    public $quantity;
    public $image;
    public $images;
    public $categoryId;

    public function mount(){
        $this->stock = "in";
        $this->featured = 0;
    }


    public function render()
    {
        $categories = Category::all();
        return view('livewire.adm.admin-add-product',['categories' => $categories])->layout('layouts.base');
    }

    public function getSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:products',
            'desc' => 'required',
            'longDesc' => 'required',
            'stock' => 'required',
            'sku' => 'required',
            'price' => 'required|numeric',
            'salePrice' => 'nullable|numeric',
            'weight' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png',
            'categoryId' => 'required'
        ]);
    }


    public function store()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:products',
            'desc' => 'required',
            'longDesc' => 'required',
            'stock' => 'required',
            'sku' => 'required',
            'price' => 'required|numeric',
            'salePrice' => 'nullable|numeric',
            'weight' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png',
            'categoryId' => 'required'
        ]);

        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->desc = $this->desc;
        $product->long_desc = $this->longDesc;
        $product->SKU = $this->sku;
        $product->normal_price = $this->price;
        $product->sale_price = $this->salePrice;
        $product->stock_status = $this->stock;
        $product->quantity = $this->quantity;
        $product->weight = $this->weight;
        $product->featured = $this->featured;
        $imgName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('products',$imgName);
        $product->image = $imgName;

        if($this->images)
        {
            $imagesName = "";
            foreach($this->images as $key => $image)
            {
                $nameImg = Carbon::now()->timestamp. $key . '.' . $image->extension();
                $image->storeAs('products',$nameImg);
                $imagesName = $imagesName . ',' . $nameImg;
            }
            $product->images = $imagesName;
        }


        $product->category_id = $this->categoryId;

        $product->save();
        session()->flash('success_msg', 'Producto creado con éxito.');
    }
}
