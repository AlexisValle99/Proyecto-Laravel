<?php

namespace App\Http\Livewire\Adm;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class AdminEditProduct extends Component
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

    public $productId;
    public $newImage;
    public $newImages;

    public function mount($productId){

        $product = Product::where('id', $productId)->first();
        
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->desc = $product->desc;
        $this->longDesc = $product->long_desc;
        $this->stock = $product->stock_status;
        $this->sku = $product->SKU;
        $this->price = $product->normal_price;
        $this->salePrice = $product->sale_price;
        $this->featured = $product->featured;
        $this->weight = $product->weight;
        $this->quantity  = $product->quantity;
        $this->image = $product->image;
        $this->images = explode(",", $product->images);
        $this->categoryId = $product->category_id;

        $this->productId = $product->id;
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.adm.admin-edit-product', ['categories' => $categories])->layout('layouts.base');
    }

    public function getSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => ['required', Rule::unique('products')->ignore($this->productId,'id')],
            'desc' => 'required',
            'longDesc' => 'required',
            'stock' => 'required',
            'sku' => 'required',
            'price' => 'required|numeric',
            'salePrice' => 'nullable|numeric',
            'weight' => 'required|numeric',
            'quantity' => 'required|numeric',
            'categoryId' => 'required'
        ]);
        if($this->newImage){
            $this->validateOnly($fields,[
                'newImage' => 'required|mimes:jpeg,png',
            ]);
        }
    }

    public function update(){

        $this->validate([
            'name' => 'required',
            'slug' => ['required', Rule::unique('products')->ignore($this->productId,'id')],
            'desc' => 'required',
            'longDesc' => 'required',
            'stock' => 'required',
            'sku' => 'required',
            'price' => 'required|numeric',
            'salePrice' => 'nullable|numeric',
            'weight' => 'required|numeric',
            'quantity' => 'required|numeric',
            'categoryId' => 'required'
        ]);

        if($this->newImage){
            $this->validate([
                'newImage' => 'required|mimes:jpeg,png',
            ]);
        }

        $product = Product::find($this->productId);

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
        if($this->newImage)
        {
            unlink('img/products/'.$product->image);
            $imgName = Carbon::now()->timestamp. '.' . $this->newImage->extension();
            $this->newImage->storeAs('products',$imgName);
            $product->image = $imgName;
        }

        if($this->newImages)
        {
            if($product->images){
                $images = explode(',',$product->images);
                foreach($images as $image)
                {
                    if($image){
                        unlink('img/products/'.$image);
                    }
                }
            }
            $imagesName = "";
            foreach($this->newImages as $key => $image){
                $imageName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('products', $imageName);
                $imagesName = $imagesName . ',' . $imageName;

            }
            $product->images = $imagesName;
        }


        $product->category_id = $this->categoryId;

        $product->save();
        session()->flash('success_msg', 'Producto editado con éxito.');
    }

}
