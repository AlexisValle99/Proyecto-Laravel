<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->words($nb=3,$asText=True);
        $slug = Str::slug($name);
        return [
            'name' => $name,
            'slug' => $slug,
            'desc' => $this->faker->text(250),
            'long_desc' => $this->faker->text(450),
            'normal_price' => $this->faker->numberBetween(75,8000),
            'SKU' => 'PRODUCT' . $this->faker->unique()->numberBetween(100,1000),
            'stock_status' => 'in',
            'quantity' => $this->faker->numberBetween(20,500),
            'weight' => $this->faker->numberBetween(1,40),
            'image' => 'product_' . $this->faker->numberBetween(1,10) . '.jpg',
            'category_id' => $this->faker->numberBetween(1, 7)

        ];
    }
}
